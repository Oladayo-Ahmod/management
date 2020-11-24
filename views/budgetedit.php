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
    <title>Admin | Budget | Edit</title>
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
                // if the expenditure budget id is set 
                if (isset($_GET['ebid'])) {
                    // set the html content of the header
                    $table_name = 'Expenditure';
                    //set the form name
                    $form_name = 'ebUpdate';
                    
                }
                 // if the income budget id is set 
                elseif (isset($_GET['ibid'])) {
                    // set the html content of the header
                    $table_name = 'Income';
                    // set the form name
                    $form_name = 'ibUpdate';
                } 
            ?>
            


            <!-- including sidebar file -->
            <?php include '../includes/sidebar.php';?>

            <ol class="breadcrumb">
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ <?=$table_name;?> budget</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Manage budget</h6>
            </div>
            <div class="card-body">
                <?php 
                    //updating the categories
                        // expenditure budget update
                        if (isset($_POST['ebUpdate'])) {
                            //get the budget id
                            $id = $_GET['ebid'];
                            $modal = new Modal;
                            $update = $modal->bud_update($id);
                        }
                        //income budget update
                        elseif (isset($_POST['ibUpdate'])) {
                            //get the budget id
                            $id = $_GET['ibid'];
                            $modal = new Modal;
                            $update = $modal->bud_update($id);
                        }

                    // fetching data section for the edit method
                            // check if the expenditure budget id is set
                            if (isset($_GET['ebid'])) {
                                //setting the id
                                $id = $_GET['ebid'];
                                $type = "expenditure";
                                $modal = new Modal;
                                $edit = $modal->edit_bud($id);
                            }
                                // check if the income budget id is set
                            elseif (isset($_GET['ibid'])) {
                                //setting the id
                                $id = $_GET['ibid'];
                                $type = "income";
                                $modal = new Modal;
                                $edit = $modal->edit_bud($id);
                            }
                            if (!empty($edit)) {
                                foreach ($edit as $editing) {?>
                                    <form class="form-group" enctype="multipart/form-data" method="POST" action="">
                                        <label for="page">Item</label>
                                        <input type="text" name="name" value="<?= $editing['item'] ;?>" required class="form-control"><br>
                                        <label for="cost">Cost</label>
                                        <input type="number" name="cost" value="<?= $editing['item_cost'] ;?>" required class="form-control"><br>
                                        <label for="description">Description</label>
                                        <input type="text" name="description" value="<?= $editing['item_desc'] ;?>" required class="form-control"><br>
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="" required>
                                        <option value="" disabled selected><?= $editing['category'] ;?></option>
                                        <?php 
                                            // fetching expenditure category
                                            $modal = new Modal;
                                            //category type
                                            $fetch = $modal->fetch_cat($type);
                                            foreach($fetch as $fetches){?>
                                        <option value=<?= $fetches['category_name'];?> ><?= $fetches['category_name'];?></option>
                                        <?php }?>	
                                    </select><br>
                                    <label for="date">Note Date</label>
                                    <input type="text" name="notedate" value="<?= $editing['notedate'] ;?>" readonly class="form-control"><br>
                                    <button type="submit" class="btn btn-danger" name="<?=$form_name;?>">Update</button>
                                </form>
                                <?php }}?>
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