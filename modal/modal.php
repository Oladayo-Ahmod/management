<?php
    class Modal{
        private $localhost = 'localhost';
        private $dbname = 'management';
        private $username = 'root';
        private $password = '';
        private $conn;
        public function __construct(){
           try {
               $this->conn = new mysqli($this->localhost,$this->username,$this->password,$this->dbname);
           } catch (Exception $e) {
               echo 'connection failed'.$e->getMessage();
           }
        }

       // creating login method

		public function login(){
			// //caches control
			// header('Cache-Control:no cache');// no cache
			// session_cache_limiter('private_no_expire');
			//starting the session variable
			
			if (isset($_POST['login'])) {
				$error = "";
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$query = "SELECT * FROM `admin` WHERE email = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('s',$email);
				if($stmt->execute()){
					$result = $stmt->get_result();
					if (mysqli_num_rows($result) > 0) {
						$fetch = $result->fetch_assoc();
						//check if the passwords match
						if ($fetch['password'] == md5(md5($fetch['id']).$password)) {
							//setting the session id
							$_SESSION['id'] = $fetch['id'];
							$_SESSION['username'] = $fetch['fullname'];
							//redirect to the dashboard if the passwords match
							header('location:admin/dashboard.php');
						}
						else{
							$error = '<div class="alert alert-danger">Incorrect Email or Password</div>';
						}
					}
					else{
						$error = '<div class="alert alert-danger">Incorrect Email or Password </div>';
					}
				}
				
				echo $error;
			}
		}

		//creating total monthly expenditure method
        public function weekly_exp(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

        //creating dashboard total monthly expenditure method
        public function monthly_exp(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating total monthly expenditure method
        public function yearly_exp(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total weekly income method
        public function weekly_inc(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM income WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total monthly income method
        public function monthly_inc(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM income WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total YEARly income method
        public function yearly_inc(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM income WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		// creating total weekly receipt method
        public function weekly_rec(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM receipt WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total monthly receipt method
        public function monthly_rec(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM receipt WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total yearly receipt method
        public function yearly_rec(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM receipt WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating total weekly payment method
        public function weekly_pay(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM payment WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total monthly payment method
        public function monthly_pay(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM payment WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		//creating dashboard total yearly payment method
        public function yearly_pay(){
			$data = null;
			$query = "SELECT SUM(cost) AS total_report FROM payment WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
				 return $data;
            
		}

		// creating dashboard last 7 days details
		public function sevenDays_exp(){// last seven days expenditure
			$data = null;
			$query = "SELECT * FROM expenditure WHERE itemdate > now() - INTERVAL 7 day";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					 if (mysqli_num_rows($result) > 0) {
						while ($fetch = $result->fetch_assoc() ) {
							$data[] = $fetch;
						 }
					 }
				 }
				 return $data;

		}

		public function sevenDays_inc(){// last seven days income
			$data = null;
			$query = "SELECT * FROM income WHERE itemdate > now() - INTERVAL 7 day";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					 if (mysqli_num_rows($result) > 0) {
						while ($fetch = $result->fetch_assoc() ) {
							$data[] = $fetch;
						 }
					 }
				 }
				 return $data;

		}
		//creating payment method
		public function payment(){		
			if (isset($_POST['payment'])) {
				$error = '';
				$name = strip_tags($_POST['name']);
				$amount = strip_tags($_POST['amount']);
				$date = strip_tags($_POST['date']);
				$description = strip_tags($_POST['description']);
				$category = strip_tags($_POST['category']);
				$place = strip_tags($_POST['place']);
				// inserting into the payment using prepared statement
				$query = "INSERT INTO payment(item,cost,itemdate,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sissss',$name,$amount,$date,$description,$category,$place);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Payment added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding payment!</div>';
				}
				// inserting into the expenditure
				$query_two = "INSERT INTO expenditure(item,cost,itemdate,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query_two);
				$stmt->bind_param('sissss',$name,$amount,$date,$description,$category,$place);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Payment added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error appending to expenditure!</div>';
				}
				echo $error;
			}
		}

		//creating receipt method
		public function receipt(){
			if (isset($_POST['receipt'])) {
				$error = '';
				$name = strip_tags($_POST['name']);
				$amount = strip_tags($_POST['amount']);
				$date = strip_tags($_POST['date']);
				$place = strip_tags($_POST['place']);
				$description = strip_tags($_POST['description']);
				$category = strip_tags($_POST['category']);
				// inserting into the receipt using prepared statement
				$query = "INSERT INTO receipt(item,itemdate,cost,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ssisss',$name,$date,$amount,$description,$category,$place);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Receipt added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding receipt!</div>';
				}
				// inserting into the income using prepared statement
				$query_two = "INSERT INTO income(item,itemdate,cost,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query_two);
				$stmt->bind_param('ssisss',$name,$date,$amount,$description,$category,$place);
				if($stmt->execute()){
					$stmt->close();
					$error = '<div class="alert alert-success">Receipt added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error appending to income!</div>';
				}
				echo $error;
			}
		}

		//creating expenditure method
		public function expenditure(){
			if (isset($_POST['expenditure'])) {
				$error = '';
				$name = strip_tags($_POST['name']);
				$amount = strip_tags($_POST['amount']);
				$date = $_POST['date'];
				$description = strip_tags($_POST['description']);
				$category = strip_tags($_POST['category']);
				$place = strip_tags($_POST['place']);
				// inserting into the database using prepared statement
				$query = "INSERT INTO expenditure(item,itemdate,cost,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ssisss',$name,$date,$amount,$description,$category,$place);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Expense added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding expense!</div>';
				}
				echo $error;
			}
		}

		// creating expenditure management method
		public function manageExp($start,$rpp,$page,$previous,$next){
			$error = '';
			$data = null;
			
			//count the total number of id in the database
			$count = "SELECT COUNT(id) AS id FROM expenditure";
			$query_count = $this->conn->query($count);
			$result_count = mysqli_fetch_array($query_count);
			//getting the number of pages
			$total_pages  = intval($result_count['id']) / $rpp;
			$data['total'] = $total_pages;
			$query = "SELECT * FROM expenditure WHERE item IS NOT NULL ORDER BY itemdate LIMIT $start,$rpp";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			if(mysqli_num_rows($result) > 0){
				while($fetch = $result->fetch_assoc()){
					$data[] = $fetch;
				} 
				return $data;
			}
			else {
				$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
			}
			echo $error;
		}

		//creating edit method
		public function edit($id){
			$data = null;
			//check if the get variable is expenditure
			if (isset($_GET['expid'])) {
				$query = "SELECT * FROM expenditure WHERE id= ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}

			//check if the get variable is income
			if (isset($_GET['incid'])) {
				$query = "SELECT * FROM income WHERE id= ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}
			return $data;
		}

		//creating update method
		public function update($id,$name,$amount,$date,$description,$place,$category){
			$error = '';
			//check if the post variable is expenditure
			if (isset($_POST['updateexp'])) {
				$query = "UPDATE expenditure SET item = ?, cost = ?, itemdate = ?, itemdesc = ?, place = ?, category = ? WHERE id = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sissssi',$name,$amount,$date,$description,$place,$category,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Data updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating data try later!</div>';
				}
			}
			
			//check if the post variable is income
			if (isset($_POST['updateinc'])) {
				$query = "UPDATE income SET item = ?, cost = ?, itemdate = ?, itemdesc = ?, place = ?, category = ? WHERE id = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sissssi',$name,$amount,$date,$description,$place,$category,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Data updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating data try later!</div>';
				}
			}
			echo $error;
		}

		//creating income method
		public function income(){
			if (isset($_POST['income'])) {
				$error = '';
				$name = strip_tags($_POST['name']);
				$amount = strip_tags($_POST['amount']);
				$date = strip_tags($_POST['date']);
				$description = strip_tags($_POST['description']);
				$category = strip_tags($_POST['category']);
				$place = strip_tags($_POST['place']);
				// inserting into the database using prepared statement
				$query = "INSERT INTO income(item,itemdate,cost,itemdesc,category,place) VALUES(?,?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ssisss',$name,$date,$amount,$description,$category,$place);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Income added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding receipt!</div>';
				}
				echo $error;
			}
		}

		//creating the income management method
		public function manageInc($start,$rpp,$page,$previous,$next){
			$error = '';
			$data = null;
			//count the total number of id in the database
			$count = "SELECT COUNT(id) AS id FROM expenditure";
			$query_count = $this->conn->query($count);
			$result_count = mysqli_fetch_array($query_count);
			//getting the number of pages
			$total_pages  = intval($result_count['id']) / $rpp;
			$data['total'] = $total_pages;
			$query = "SELECT * FROM income ORDER BY itemdate LIMIT $start,$rpp";
			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			if(mysqli_num_rows($result) > 0){
				while($fetch = $result->fetch_assoc()){
					$data[] = $fetch;
				} 
				return $data;
				
			}
			else {
				$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
			}
			echo $error;
		} 

		// creating category method
		public function category(){
			$error = '';
			//check if the expenditure category is set
			if (isset($_POST['catexp'])) {
				$name = strip_tags($_POST['cat-name']);
				$type = "expenditure";
				//inserting into the category
				$query = "INSERT INTO category(category_name,category_type) VALUES(?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ss',$name,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">New category added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding category try later!</div>';
				}
			}

			//check if the income category is set
			if (isset($_POST['catinc'])) {
				$name = strip_tags($_POST['cat-name']);
				$type = "income";
				//inserting into the category
				$query = "INSERT INTO category(category_name,category_type) VALUES(?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ss',$name,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">New category added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding category try later!</div>';
				}
			}
			echo $error;
		}

		// creating fetch method for category
		public function fetch_cat($type){
			//disabling error reporting
			//error_reporting(0);
			// fetching all the categories in the table
			$data = null;
			$query = "SELECT * FROM category WHERE category_type='$type' ";
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()){
				$result = $stmt->get_result();
				if (mysqli_num_rows($result) > 0) {
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}	
				}
				
			}
			return $data;
		}

		// creating edit method for category
		public function edit_cat($id){
			$data = null;
			//check if the get variable is expenditure category
			if (isset($_GET['ecid'])) {
				$query = "SELECT * FROM category WHERE id= ? AND category_type = 'expenditure' LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}

			//check if the get variable is income category
			if (isset($_GET['icid'])) {
				$query = "SELECT * FROM category WHERE id= ? AND category_type = 'income' LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}
			return $data;
		}

		//creating category update method
		public function cat_update($id,$name,$type){
			$error = '';
			//check if the expenditure category update is set
			if (isset($_POST['ecUpdate'])) {
				$query = "UPDATE category SET category_name = ? WHERE id = ? AND category_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sis',$name,$id,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Category updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating category!</div>';
				}
			}

			//check if the income category update is set
			if (isset($_POST['icUpdate'])) {
				$query = "UPDATE category SET category_name = ? WHERE id = ? AND category_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sis',$name,$id,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Category updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating category!</div>';
				}
			}
			echo $error;
		}

		//creating delete  method
		public function delete($id,$type){
			$error = '';
			//deleting income and  expenditures
        	    //check if expenditure id is set
            if (isset($_GET['expid'])) {
				$query = "DELETE FROM expenditure WHERE id = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					header('location:manageexp.php');
				}
				else {
					$error = '<div class="alert alert-danger">Error deleting expenditure!</div>';
				}
			}
				//check if income id is set
				elseif (isset($_GET['incid'])) {
					$query = "DELETE FROM income WHERE id = ? LIMIT 1";
					$stmt = $this->conn->prepare($query);
					$stmt->bind_param('i',$id);
					if($stmt->execute()){
						header('location:manageinc.php');
					}
					else {
						$error = '<div class="alert alert-danger">Error deleting income!</div>';
					}
				}
			
        
			//deleting categories
			 //check if expenditure category is set
			 if (isset($_GET['ecid'])) {
				$query = "DELETE FROM category WHERE id = ? AND category_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('is',$id,$type);
				if($stmt->execute()){
					header('location:catexp.php');
				}
				else {
					$error = '<div class="alert alert-danger">Error deleting category!</div>';
				}
			 }

			 //check if income category is set
			 if (isset($_GET['icid'])) {
				$query = "DELETE FROM category WHERE id = ? AND category_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('is',$id,$type);
				if($stmt->execute()){
					header('location:catinc.php');
				}
				else {
					$error = '<div class="alert alert-danger">Error deleting category!</div>';
				}
			 }

			//deleting categories ends 

			//deleting budgets
			 //check if expenditure budget is set
			 if (isset($_GET['ebid'])) {
				$query = "DELETE FROM budgets WHERE id = ? AND budget_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('is',$id,$type);
				if($stmt->execute()){
					header('location:budgetexp.php');
				}
				else {
					$error = '<div class="alert alert-danger">Error deleting budget!</div>';
				}
			 }

			 //check if income budget is set
			 if (isset($_GET['ibid'])) {
				$query = "DELETE FROM budgets WHERE id = ? AND budget_type = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('is',$id,$type);
				if($stmt->execute()){
					header('location:budgetinc.php');
				}
				else {
					$error = '<div class="alert alert-danger">Error deleting budget!</div>';
				}
			 }
       
		}
		//creating reports of expenditure and income method
		public function report(){
			#error_reporting(0);
			$data = null;
			//weekly report of expenditure
			if (isset($_GET['wkexp'])) {
				$query = "SELECT * FROM expenditure WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					 if (mysqli_num_rows($result) > 0) {
						while ($fetch = $result->fetch_assoc() ) {
							$data[] = $fetch;
						 }
					 }
					  
				 }
			}

			//weekly report of income
			if (isset($_GET['wkinc'])) {
				$query = "SELECT * FROM income WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					 if(mysqli_num_rows($result) > 0){
						while ($fetch = $result->fetch_assoc() ) {
							$data[] = $fetch;
						 }
					 }
					  
				 }
			}

			//monthly report of expenditure
			if (isset($_GET['mtexp'])) {
				$query = "SELECT * FROM expenditure WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					  while ($fetch = $result->fetch_assoc() ) {
						$data[] = $fetch;
					 }
				 }
			}

			//monthly report of income
			if (isset($_GET['mtinc'])) {
				$query = "SELECT * FROM income WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					  while ($fetch = $result->fetch_assoc() ) {
						$data[] = $fetch;
					 }
				 }
			}

			//yearly report of expenditure
			if (isset($_GET['yrexp'])) {
				$query = "SELECT * FROM expenditure WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					  while ($fetch = $result->fetch_assoc() ) {
						$data[] = $fetch;
					 }
					
				 }
			}

			//yearly report of income
			if (isset($_GET['yrinc'])) {
				$query = "SELECT * FROM income WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					 $result = $stmt->get_result();
					  while ($fetch = $result->fetch_assoc() ) {
						$data[] = $fetch;
					 }
				 }
			}

			return $data;
		}

		// creating total of the weekly,monthly and yearly reports of expenditure and income method
		public function total_report(){
			error_reporting(0);
			$data = null;
			//total weekly report of expenditure
			if (isset($_GET['wkexp'])) {
				$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}

			//total weekly report of income
			if (isset($_GET['wkinc'])) {
				$query = "SELECT SUM(cost) AS total_report FROM income WHERE WEEK(itemdate) = WEEK(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}

			//total monthly report of expenditure
			if (isset($_GET['mtexp'])) {
				$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}

			//total monthly report of income
			if (isset($_GET['mtinc'])) {
				$query = "SELECT SUM(cost) AS total_report FROM income WHERE MONTH(itemdate) = MONTH(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}

			//total yearly report of expenditure
			if (isset($_GET['yrexp'])) {
				$query = "SELECT SUM(cost) AS total_report FROM expenditure WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}

			//total yearly report of income
			if (isset($_GET['yrinc'])) {
				$query = "SELECT SUM(cost) AS total_report FROM income WHERE YEAR(itemdate) = YEAR(CURRENT_DATE())
				 AND YEAR(itemdate) = YEAR(CURRENT_DATE())";
				 $stmt = $this->conn->prepare($query);
				 if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
				 }
			}



			return $data;
		}

		// creating custom search of expenditure and income method
		public function custom_search($from,$to){
			$data = null;
			//searching expenditure
			if (isset($_POST['searchexp'])) {
				$query = "SELECT * FROM expenditure WHERE (itemdate BETWEEN '$from' AND '$to')";
				$stmt = $this->conn->prepare($query);
				if($stmt->execute()){
					$result = $stmt->get_result();
					if (mysqli_num_rows($result) > 0) {
						while ($fetch = $result->fetch_assoc()) {
							$data[] = $fetch;
						}
					}
				}
				$stmt->close();
			}

			//searching income
			if (isset($_POST['searchinc'])) {
				$query = "SELECT * FROM income WHERE (itemdate BETWEEN '$from' AND '$to')";
				$stmt = $this->conn->prepare($query);
				if($stmt->execute()){
					$result = $stmt->get_result();
					if (mysqli_num_rows($result) > 0) {
						while ($fetch = $result->fetch_assoc()) {
							$data[] = $fetch;
						}
					}
				}
				$stmt->close();
			}
			
			return $data;
			
		}
		//creating custom search total of income and expenditure method
		public function total($from,$to){
			$data = null;
			// getting the total of searched expenditure
			if (isset($_POST['searchexp'])) {
				$sum_query = "SELECT SUM(cost) AS total FROM expenditure WHERE (itemdate BETWEEN '$from' AND '$to')";
				$stmt = $this->conn->prepare($sum_query);
				if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch; 
			 	}
			}

			// getting the total of searched income
			if (isset($_POST['searchinc'])) {
				$sum_query = "SELECT SUM(cost) AS total FROM income WHERE (itemdate BETWEEN '$from' AND '$to')";
				$stmt = $this->conn->prepare($sum_query);
				if($stmt->execute()){
					$result = $stmt->get_result();
					$fetch = $result->fetch_assoc();
					$data = $fetch;
			 	}
			}
			return $data;
		}
		//creating budget method
		public function budget(){
			$error = '';
			//inserting expenditure budget
			if (isset($_POST['budgetexp'])) {
				$type = "expenditure";
				$item = strip_tags($_POST['name']);
				$cost = strip_tags($_POST['cost']);
				$category = strip_tags($_POST['category']);
				$description = strip_tags($_POST['description']);
				$query = "INSERT INTO budgets(item,item_cost,category,item_desc,budget_type) 
				VALUES(?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sisss',$item,$cost,$category,$description,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Budget added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding budget!</div>';
				}
			}

			//inserting income budget
			if (isset($_POST['budgetinc'])) {
				$type = "income";
				$item = strip_tags($_POST['name']);
				$cost = strip_tags($_POST['cost']);
				$category = strip_tags($_POST['category']);
				$description = strip_tags($_POST['description']);
				$query = "INSERT INTO budgets(item,item_cost,category,item_desc,budget_type) 
				VALUES(?,?,?,?,?)";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sisss',$item,$cost,$category,$description,$type);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Budget added successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error adding budget!</div>';
				}
			}
			echo $error;
		}
		
		// creating fetch method for budget
		public function fetch_bud($type){
			//disabling error reporting
			//error_reporting(0);
			// fetching all the  budget
			$data = null;
			$query = "SELECT * FROM budgets WHERE budget_type='$type' ";
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()){
				$result = $stmt->get_result();
				if (mysqli_num_rows($result) > 0) {
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}	
				}
				
			}
			return $data;
		}

		// creating edit method for category
		public function edit_bud($id){
			$data = null;
			//check if the get variable is expenditure category
			if (isset($_GET['ebid'])) {
				$query = "SELECT * FROM budgets WHERE id= ? AND budget_type = 'expenditure' LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}

			//check if the get variable is income category
			if (isset($_GET['ibid'])) {
				$query = "SELECT * FROM budgets WHERE id= ? AND budget_type = 'income' LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('i',$id);
				if($stmt->execute()){
					$result = $stmt->get_result();
					while ($fetch = $result->fetch_assoc()) {
						$data[] = $fetch;
					}
				}
			}
			return $data;
		}

		//creating budget update method
		public function bud_update($id){
			$error = '';
			//check if the expenditure budget update is set
			if (isset($_POST['ebUpdate'])) {
				$type = "expenditure";
				$item = strip_tags($_POST['name']);
				$cost = strip_tags($_POST['cost']);
				$category = strip_tags($_POST['category']);
				$description = strip_tags($_POST['description']);
				$query = "UPDATE budgets SET item = ?,item_cost = ?,category = ?,item_desc = ?,budget_type = ? 
				WHERE id = ?";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sisssi',$item,$cost,$category,$description,$type,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Budget updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updatng budget!</div>';
				}
			}

			//check if the expenditure budget update is set
			if (isset($_POST['ibUpdate'])) {
				$type = "income";
				$item = strip_tags($_POST['name']);
				$cost = strip_tags($_POST['cost']);
				$category = strip_tags($_POST['category']);
				$description = strip_tags($_POST['description']);
				$query = "UPDATE budgets SET item = ?,item_cost = ?,category = ?,item_desc = ?,budget_type = ? 
				WHERE id = ?";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('sisssi',$item,$cost,$category,$description,$type,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Budget updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updatng budget!</div>';
				}
			}
			echo $error;
		}


    }
?>