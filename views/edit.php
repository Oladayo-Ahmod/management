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
    <title>Admin | Expenditure</title>
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

            <!-- including sidebar file -->
            <?php include '../includes/sidebar.php';?>
            <?php
                // if the expenditure id is set 
                if (isset($_GET['expid'])) {
                    // set the html content of the header
                    $table_name = 'Expenditure';
                    $account_type = 'Expense';
                    // set the bootstrap color
                    $color = 'danger';
                    //set the form name
                    $form_name = 'updateexp';
                    
                }
                 // if the income id is set 
                elseif (isset($_GET['incid'])) {
                    // set the html content of the header
                    $table_name = 'Income';
                    $account_type = 'Income';
                    // set the bootstrap color
                    $color = 'success';
                    // set the form name
                    $form_name = 'updateinc';
                } 
            ?>
            <ol class="breadcrumb">
                <li class="active text-<?=$color;?>"><i class="fa fa-minus mr-1"></i>/ <?=$table_name;?> Account</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Edit <?=$account_type;?></h6>
            </div>
            <div class="card-body">
                    <?php 
                        
                      

                         //updating method section
                            //check if the income  update is set
                         if (isset($_POST['updateinc'])) {
                             //getting the id of the income
                            $id = $_GET['incid'];
                            $name = strip_tags($_POST['name']);
                            $amount = strip_tags($_POST['amount']);
                            $date = $_POST['date'];
                            $description = strip_tags($_POST['description']);
                            $category = strip_tags($_POST['category']);
                            $place = strip_tags($_POST['place']);
                            $modal = new Modal;
                            $modal->update($id,$name,$amount,$date,$description,$place,$category);
                        }
                            
                        // check if the expenditure update is set
                        elseif (isset($_POST['updateexp'])) {
                            $id = $_GET['expid'];
                            //getting the id of the expense
                            $name = strip_tags($_POST['name']);
                            $amount = strip_tags($_POST['amount']);
                            $date = $_POST['date'];
                            $description = strip_tags($_POST['description']);
                            $category = strip_tags($_POST['category']);
                            $place = strip_tags($_POST['place']);
                            $modal = new Modal;
                            $modal->update($id,$name,$amount,$date,$description,$place,$category);
                        }

                        //updating method section ends

                        // fetching data section for the edit method

                            // check if the expenditure id is set
                        if (isset($_GET['expid'])) {
                            //setting the id
                            $id = $_GET['expid'];
                            $modal = new Modal;
                            $edit = $modal->edit($id);
                        }
                            // check if the income id is set
                        elseif (isset($_GET['incid'])) {
                            $id = $_GET['incid'];
                            $modal = new Modal;
                            $edit = $modal->edit($id);
                        }
                        
                            foreach ($edit as $editing) {?>
                <form action="#" method="POST" class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" value="<?= $editing['item'];?>" name="name" required>
                    <label for="item-cost">Item Cost</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                        </div>
                        <input type="number" class="form-control" value="<?=$editing['cost'];?>" name="amount" required>
                    </div>
                    <label for="item">Item Date</label>
                    <input type="date" class="form-control" name="date" value="<?= $editing['itemdate'];?>" required>
                    <label for="post-category">Item category</label>
                    <select class="form-control" name="category" id="" required>
                        <option value="" disabled selected>choose category</option>
                        <?php 
                            $modal = new Modal;
                            $fetch = $modal->all_cat();
                            foreach($fetch as $fetches){?>
                        <option value=<?= $fetches['category_name'];?> ><?= $fetches['category_name'];?></option>
                        <?php }?>   
                    </select>       				
                    <label for="item">Item Place</label>
                    <input type="text" class="form-control" name="place" value="<?= $editing['place'];?>" required>
                    <label for="item">Item Description</label>
                    <textarea name="description" class="form-control" id="" cols="15" value=""><?= $editing['itemdesc'];?></textarea><br>
                    <button type="submit" class="btn btn-danger" name="<?=$form_name;?>">Update <?=$account_type;?></button>
                </form>
                            <?php } ?>

                               
            </div>
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