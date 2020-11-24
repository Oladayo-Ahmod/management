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
    <title>Admin | Yearly | Report </title>
     <!-- css file -->
     <link rel="stylesheet" href="../css/style.css">
    <!-- css libraries -->
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <style>
        span{
            color:red;
            font-weight:bolder;
        }
    </style>
</head>
<body>

                <!-- including top bar file -->
            <?php include '../includes/topbar.php';?>
           
            <!-- including sidebar file -->
            <?php include '../includes/sidebar.php';?>

            <ol class="breadcrumb">
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ Yearly Expenditure Report</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Expenditure</h6>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Items</th>
                            <th>Cost</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                       
                        if (isset($_GET['yrexp'])) {
                            $count = 1;
                            $modal = new Modal;
                            $row = $modal->report();
                        }
                        // check if the row is not empty
                        if(!empty($row)) {
                            foreach($row as $result){?>
                                <tr>
                                    <td><?= $count++; ?></td>
                                    <td><?= $result['item']; ?></td>
                                    <td><?= $result['cost']; ?></td>
                                    <td><?= $result['itemdate']; ?></td>
                                    <td><?= $result['itemdesc']; ?></td>
                                    <td><?= $result['category']; ?></td>
                                    <td><?= $result['place']; ?></td>
                                </tr>
                                    <?php  }}?>
                        
                    </tbody>
                    </table><br>
                    <table class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Yearly Report</th>
                            <th>Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $modal = new Modal;
                            $total_row = $modal->total_report();
                        ?>
                        <tr>
                            <td><?= 'Total expenditure for the year'; ?></td>
                            <td><?= '<span> #'. $total_row['total_report'] .'</span>'; ?></td>
                        </tr>
                    </tbody>
                </table>
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
