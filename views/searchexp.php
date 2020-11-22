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
    <title>Admin | Search | Expenditure</title>
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
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ Expenditure Report</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Search Expenditure</h6>
            </div>
            <div class="card-body">
               
                <form action="searchinfo.php" method="POST" class="form-group">
                    <label for="from">From</label>
                    <input type="date" class="form-control" name="from" required><br>
                    <label for="to">To</label>
                    <input type="date" class="form-control" name="to" required><br>
                    <button type="submit" class="btn btn-primary" name="searchexp">Search</button>
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