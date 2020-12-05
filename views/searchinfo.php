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
    <title>Admin | Search | Result </title>
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
            <?php include '../includes/sidebar.php';

            if(isset($_POST['searchexp'])){
                // table name
                $table_name = 'Expenditure';
            }
            if(isset($_POST['searchinc'])){
                // table name
                $table_name = 'Income';
            }
            ?>

            <ol class="breadcrumb">
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ <?= $table_name;?> Report</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ <?= $table_name;?></h6>
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
                           
                            $count = 1;
                            // expenditure search
                             if (isset($_POST['searchexp'])) {
                                $modal = new Modal;
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $row = $modal->custom_search($from,$to);   
                            }
                            //income search
                            elseif (isset($_POST['searchinc'])) {
                                $modal = new Modal;
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $row = $modal->custom_search($from,$to); 
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
                            <th>Date Searched</th>
                            <th>Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
                            if (isset($_POST['searchexp'])) {
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $str_from = strtotime($from);
                                $new_from = date('D, F Y ',$str_from);
                                $str_to = strtotime($to);
                                $new_to = date('D, F Y', $str_to);
                                $modal = new Modal;
                                $row = $modal->total($from,$to); 
                            }
                            elseif (isset($_POST['searchinc'])) {
                                $modal = new Modal;
                                $from = $_POST['from'];
                                $to = $_POST['to'];
                                $str_from = strtotime($from);
                                $new_from = date('D, F Y ',$str_from);
                                $str_to = strtotime($to);
                                $new_to = date('D, F Y', $str_to);
                                $row = $modal->total($from,$to);   
                            }
                            
                        ?>
                        <tr>
                            <td><?= $table_name .' From '.'<span>'. $new_from . '</span>' .'To '. '<span>'. $new_to. '</span>'; ?></td>
                            <td><?= '<span style="color:grey;"> #'. $row['total'] .'</span>'; ?></td>
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