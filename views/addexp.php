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

            <ol class="breadcrumb">
                <li class="active text-danger"><i class="fa fa-minus mr-1"></i>/ Expenditure Account</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Add Expense</h6>
            </div>
            <div class="card-body">
                    <?php 
                        $modal = new Modal;
                        $modal->expenditure();
                    ?>
                <form action="#" method="POST" class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" name="name" required>
                    <label for="item-cost">Item Cost</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                        </div>
                        <input type="number" class="form-control" name="amount" required>
                    </div>
                    <label for="item">Item Date</label>
                    <input type="date" class="form-control" name="date" required>
                    <label for="post-category">Item category</label>
                    <select class="form-control" name="category" id="" required>
                        <option value="" disabled selected>choose category</option>
                        <?php 
                            $modal = new Modal;
                            //category type
                            $type = 'expenditure';
                            $fetch = $modal->fetch_cat($type);
                            foreach($fetch as $fetches){?>
                        <option value=<?= $fetches['category_name'];?> ><?= $fetches['category_name'];?></option>
                        <?php }?>	
                    </select>				
                    <label for="item">Item Place</label>
                    <input type="text" class="form-control" name="place" required>
                    <label for="item">Item Description</label>
                    <textarea name="description" class="form-control" id="" cols="15"></textarea><br>
                    <button type="submit" class="btn btn-danger" name="expenditure">Add Expense</button>
                </form>
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