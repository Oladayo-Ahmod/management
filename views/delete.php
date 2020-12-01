       
        <?php
         include '../modal/modal.php';
        // starting session
        session_start();
        if (strlen($_SESSION['id']) == 0) {
            header('location:../index.php');
        }  
       
        //deleting income and  expenditures
            //check if expenditure id is set
            if (isset($_GET['expid'])) {
                //setting the id
                $id = $_GET['expid'];
                $modal = new Modal;
                $delete = $modal->delete($id);

            }
            //check if income id is set
            elseif (isset($_GET['incid'])) {
                //setting the id
                $id = $_GET['incid'];
                $modal = new Modal;
                $delete = $modal->delete($id);

            }

    //deleting categories
        //check if expenditure category is set
        if (isset($_GET['ecid'])) {
            //setting the id
            $id = $_GET['ecid'];
            //setting the type
            $type = 'expenditure';
            $modal = new Modal;
            $delete = $modal->delete($id,$type);
        }
            // check if the income category id is set
        elseif (isset($_GET['icid'])) {
            $id = $_GET['icid'];
            //setting the type
            $type = 'income';
            $modal = new Modal;
            $delete = $modal->delete($id,$type);
        }
    //deleting categories ends
        
    //deleting budgets
        //check if expenditure budget id is set
        if (isset($_GET['ebid'])) {
            //setting the id
            $id = $_GET['ebid'];
            //setting the type
            $type = 'expenditure';
            $modal = new Modal;
            $delete = $modal->delete($id,$type);
        }
            // check if the income budget id is set
        elseif (isset($_GET['ibid'])) {
            $id = $_GET['ibid'];
            //setting the type
            $type = 'income';
            $modal = new Modal;
            $delete = $modal->delete($id,$type);
        }
?>