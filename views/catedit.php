<?php 
     // starting session
     session_start();
     if (strlen($_SESSION['id']) == 0) {
         header('location:../index.php');
     } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Category | Edit</title>
     <!-- css file -->
     <link rel="stylesheet" href="../css/style.css">
    <!-- css libraries -->
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
</head>
<body>

                <!-- including top bar file -->
            <?php include '../includes/topbar.php';?>
            <?php
                // if the expenditure category id is set 
                if (isset($_GET['ecid'])) {
                    // set the html content of the header
                    $table_name = 'Expenditure';
                    //set the form name
                    $form_name = 'ecUpdate';
                    
                }
                 // if the income category id is set 
                elseif (isset($_GET['icid'])) {
                    // set the html content of the header
                    $table_name = 'Income';
                    // set the form name
                    $form_name = 'icUpdate';
                } 
            ?>
            


            <!-- including sidebar file -->
            <?php include '../includes/sidebar.php';?>

            <ol class="breadcrumb">
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ <?=$table_name;?> Category</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Manage Category</h6>
            </div>
            <div class="card-body">
                <?php 
                    //updating the categories
                        // expenditure category update
                        if (isset($_POST['ecUpdate'])) {
                            //set the category name
                            $name = strip_tags($_POST['name']);
                            //set the category type
                            $type = 'expenditure';
                            //get the category id
                            $id = $_GET['ecid'];
                            $modal = new Modal;
                            $update = $modal->cat_update($id,$name,$type);
                        }
                        //income category update
                        elseif (isset($_POST['icUpdate'])) {
                            //set the category name
                            $name = strip_tags($_POST['name']);
                            //set the category type
                            $type = 'income';
                            //get the category id
                            $id = $_GET['icid'];
                            $modal = new Modal;
                            $update = $modal->cat_update($id,$name,$type);
                        }

                    // fetching data section for the edit method
                            // check if the expenditure category id is set
                            if (isset($_GET['ecid'])) {
                                //setting the id
                                $id = $_GET['ecid'];
                                $modal = new Modal;
                                $edit = $modal->edit_cat($id);
                            }
                                // check if the income category id is set
                            elseif (isset($_GET['icid'])) {
                                $id = $_GET['icid'];
                                $modal = new Modal;
                                $edit = $modal->edit_cat($id);
                            }
                            
                                foreach ($edit as $editing) {?>
                <form action="#" method="POST" class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" value="<?= $editing['category_name'];?>" name="name" required><br>
                    <button type="submit" class="btn btn-danger" name="<?=$form_name;?>">Update</button>
                </form>
                                <?php }?>
            </div>


            </div>
    </div>
</div>
            <!-- including footer file -->
            <?php include '../includes/footer.php';?>

            <!-- javascript libraries -->
            <script src="../js/jquery-3.2.1.min.js"></script>
            <script src="../js/popper.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- javascript script -->
            <script src="../js/script.js"></script>
</body>
</html>