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
    <title>Admin | Receipt</title>
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
                <li class="active text-success"><i class="fa fa-minus mr-1"></i>/ Receipt Account</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Add Receipt</h6>
            </div>
            <div class="card-body">
                    <?php 
                      
                        $modal = new Modal;
                        $modal->receipt();
                    ?>
                <form action="#" method="POST" class="form-group">
                    <label for="item">Item</label>
                    <input type="text" class="form-control" name="name" required><br>
                    <label for="item-cost">Amount</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                        </div>
                        <input type="number" class="form-control" name="amount" required><br>
                    </div>
                    <label for="item">Date</label>
                    <input type="date" class="form-control" name="date" required><br>
                    <label for="post-category">Category</label><br>
                    <select class="form-control" name="category" id="" required>
                        <option value="" disabled selected>choose category</option>
                        <?php 
                            $modal = new Modal;
                            //category type
                            $type = 'income';
                            $fetch = $modal->fetch_cat($type);
                            foreach($fetch as $fetches){?>
                        <option value=<?= $fetches['category_name'];?> ><?= $fetches['category_name'];?></option>
                        <?php }?>	
                    </select>
                    <label for="item">Item Place</label>
                    <input type="text" class="form-control" name="place" required>							
                    <label for="item">Item Description</label>
                    <textarea name="description" class="form-control" id="" cols="15"></textarea><br>
                    <button type="submit" class="btn btn-primary" name="receipt">Add Receipt</button>
                </form>
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