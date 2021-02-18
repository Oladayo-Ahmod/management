<?php
    class Modal{
        private $localhost = 'localhost';
        private $dbname = 'management';
        private $username = 'root';
        private $password = '';
        public $conn;
        public function __construct(){
           try {
               $this->conn = new mysqli($this->localhost,$this->username,$this->password,$this->dbname);
           } catch (Exception $e) {
               echo 'connection failed'.$e->getMessage();
           }
        }

       // creating login method

		public function login(){
			$error = "";
			error_reporting(0);
			if (isset($_POST['login'])) {
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$query = "SELECT * FROM `admin_details` WHERE email = ? LIMIT 1";
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
							// setting session username
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
				$data['error'] = $error;
				return $data;
			}
		}

		//creating total monthly expenditure method
        public function weekly_exp(){
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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

		// creating dashboard chart for months of the year method
		public function month_chart(){
			$data = null;
			$query = "SELECT date_format(itemdate,'%M') AS month FROM income
			WHERE YEAR(itemdate) = YEAR(CURRENT_DATE()) GROUP BY
			YEAR(itemdate), MONTH(itemdate)
			ORDER BY YEAR(itemdate),MONTH(itemdate)";
			 $stmt = $this->conn->prepare($query);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 while($fetch = $result->fetch_assoc()){
					 $data[] = $fetch; 		 
			 }
			 return $data;
		}

		// creating dashboard chart for expenditure of the year method
		public function expenditure_chart(){
			$data = null;
			$query = "SELECT SUM(cost) AS costs FROM expenditure GROUP BY
			YEAR(itemdate), MONTH(itemdate) ORDER BY YEAR(itemdate),MONTH(itemdate)";
			 $stmt = $this->conn->prepare($query);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 while($fetch = $result->fetch_assoc()){
				 	$data[] = $fetch;		 		 
			 }
			//  print_r($data);
			 return $data;
		}

		// creating dashboard chart for income of the year method
		public function income_chart(){
			$data = null;
			$query = "SELECT SUM(cost) AS costs FROM income
			 WHERE YEAR(itemdate) = YEAR(CURRENT_dATE())
			 GROUP BY YEAR(itemdate), MONTH(itemdate)
			 ORDER BY YEAR(itemdate),MONTH(itemdate)";
			 $stmt = $this->conn->prepare($query);
			 $stmt->execute();
			 $result = $stmt->get_result();
			 while($fetch = $result->fetch_assoc()){
				 	$data[] = $fetch;		 		 
			 }
			//  print_r($data);
			 return $data;
		}

		//creating dashboard total weekly income method
        public function weekly_inc(){
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			#error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);		
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
			$error = '';
			$data = null;
			if (!isset($_POST['searchExp'])) {
				//count the total number of id in the database
				$count = "SELECT COUNT(id) AS id FROM expenditure";
				$query_count = $this->conn->query($count);
				$result_count = mysqli_fetch_array($query_count);
				//getting the number of pages
				$total_pages  = intval($result_count['id']) / $rpp;
				$data['total'] = $total_pages;
				$query = "SELECT * FROM expenditure WHERE item IS NOT NULL ORDER BY itemdate DESC LIMIT $start,$rpp";
				$stmt = $this->conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				if(mysqli_num_rows($result) > 0){
					while($fetch = $result->fetch_assoc()){
						$data[] = $fetch;
					} 
					
				}
				else {
					$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
				}
			}
			// if search button is set
			if (isset($_POST['searchExp'])) {
				$search = strip_tags($_POST['search']);
				//count the total number of id in the database
				$count = "SELECT COUNT(id) AS id FROM expenditure";
				$query_count = $this->conn->query($count);
				$result_count = mysqli_fetch_array($query_count);
				//getting the number of pages
				$total_pages  = intval($result_count['id']) / $rpp;
				$data['total'] = $total_pages;
				$query = "SELECT * FROM expenditure WHERE
				 category REGEXP '^[$search]'
				 OR item REGEXP '^[$search]'
				 OR place REGEXP '^[$search]'
				 ORDER BY item
				  LIMIT $start,$rpp";
				$stmt = $this->conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				if(mysqli_num_rows($result) > 0){
					while($fetch = $result->fetch_assoc()){
						$data[] = $fetch;
					
					} 
					
				}
				else {
					$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
				}
						
			}
			return $data;
			echo $error;
		}

		//creating edit method
		public function edit($id){
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
			$error = '';
			$data = null;
			if (!isset($_POST['searchInc'])) {
				//count the total number of id in the database
				$count = "SELECT COUNT(id) AS id FROM expenditure";
				$query_count = $this->conn->query($count);
				$result_count = mysqli_fetch_array($query_count);
				//getting the number of pages
				$total_pages  = intval($result_count['id']) / $rpp;
				$data['total'] = $total_pages;
				$query = "SELECT * FROM income ORDER BY itemdate DESC LIMIT $start,$rpp";
				$stmt = $this->conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				if(mysqli_num_rows($result) > 0){
					while($fetch = $result->fetch_assoc()){
						$data[] = $fetch;
					}
					
				}
				else {
					$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
				}
			}

			// if search button is set
			if (isset($_POST['searchInc'])) {
				$search = strip_tags($_POST['search']);
				//count the total number of id in the database
				$count = "SELECT COUNT(id) AS id FROM income";
				$query_count = $this->conn->query($count);
				$result_count = mysqli_fetch_array($query_count);
				//getting the number of pages
				$total_pages  = intval($result_count['id']) / $rpp;
				$data['total'] = $total_pages;
				$query = "SELECT * FROM income WHERE
				 category REGEXP '^[$search]'
				 OR item REGEXP '^[$search]'
				 ORDER BY item
				  LIMIT $start,$rpp";
				$stmt = $this->conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				if(mysqli_num_rows($result) > 0){
					while($fetch = $result->fetch_assoc()){
						$data[] = $fetch;
					
					} 
					
				}
				else {
					$error = '<div class="alert alert-danger">Error fetching data try later!</div>';
				}
						
			}
			return $data;
			echo $error;
		} 

		// creating category method
		public function category(){
			// disabling error report
			error_reporting(0);
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
			//disabling error report
			error_reporting(0);
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

		// creating fetch method for all categories for the edit file
		public function all_cat(){
			//disabling error report
			error_reporting(0);
			// fetching all the categories in the table
			$data = null;
			$query = "SELECT * FROM category ";
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			//disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
			// disabling error report
			error_reporting(0);
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
					$error = '<div class="alert alert-danger">Error updating budget!</div>';
				}
			}
			echo $error;
		}

		// admin_details profile method
		public function profile($id){
			$data = null;
			// fetching data from the database
			$query = "SELECT * FROM `admin_details` WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('i',$id);
			if($stmt->execute()){
				$result = $stmt->get_result();
				while($fetch = $result->fetch_assoc()){
					$data[] = $fetch;
				}
			}
			return $data;
			
		}
		// admin_details update method
		public function profile_update($id){
			// setting error message
			$error = '';
			if (isset($_POST['update'])) {
				$full_name = strip_tags($_POST['fullname']);
				$email = strip_tags($_POST['email']);
				$role = strip_tags($_POST['role']);
				$department = strip_tags($_POST['department']);
				//updating the data
				$query = "UPDATE `admin_details` SET fullname = ?, email = ?, `post` = ?, department = ? WHERE id = ? LIMIT 1";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('ssssi',$full_name,$email,$role,$department,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Profile updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating profile!</div>';
				}
			}
			echo $error;
		}

		// uploading admin picture
		public function profile_picture($id,$image_path){
			//setting error message
			$error = '';
			// check if the profile picture is set
			if (isset($_POST['picture'])) {
				$query_two = "UPDATE admin_details SET picture =? WHERE id = ? LIMIT 1";
				$stmt = $this->conn->prepare($query_two);
				$stmt->bind_param('si',$image_path,$id);
				if($stmt->execute()){
					$error = '<div class="alert alert-success">Profile picture updated successfully!</div>';
				}
				else {
					$error = '<div class="alert alert-danger">Error updating profile picture!</div>';
				}
			
			}
			echo $error;
		}

		// fetch profile picture path from the database
		public function fetch_picture($id){
			$data = null;
			$query = "SELECT picture FROM admin_details WHERE id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param('i',$id);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_assoc();
				$data = $fetch;
			}
			return $data;
			
		}

		// password token method
		public function password_token(){
			// error message
			$error = '';
			$data = null;
			if (isset($_GET['token'])) {
				//token id
				$token = $_GET['token'];
				$query = "SELECT * FROM password_reset WHERE token = ?";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('s',$token);
				if($stmt->execute()){
					$result = $stmt->get_result();
					if (mysqli_num_rows($result) > 0) {
						$fetch = $result->fetch_assoc();
						$admin_id = $fetch['admin_id'];
						$data[] = $fetch; 
					}
					else{
						header('location:../index.php');
					}
				}
			}
			
			// if password update is set
			if (isset($_POST['reset_password'])) {
				$password = strip_tags($_POST['password']);// password
				$c_password = strip_tags($_POST['c_password']);// confirm password
				// check if both passwords match
				if ($password !== $c_password) {
					$error = '<div class="alert alert-danger">Passwords do not match!</div>';	
				}
				else {
					// update the pasword
					$new_password = md5(md5($admin_id).$password);
					$query = "UPDATE admin_details SET `password` = ? WHERE id = ? LIMIT 1";
					$stmt = $this->conn->prepare($query);
					$stmt->bind_param('si',$new_password,$admin_id);
					if($stmt->execute()){
						$error = '<div class="alert alert-success">Password changed successfully!</div>';
					}
					else {
						$error = '<div class="alert alert-danger">Error updating Password!</div>';
					}
				}
			}
			echo $error;
			return $data;
		}
		

    }
?>