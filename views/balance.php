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
    <title>Admin | Monthly | Report </title>
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
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ Surplus / Deficit</li>
            </ol>

            <!-- weekly statement -->
            <h6 style="border-radius:5px;" class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Weekly Statement</h6>
            <div class="row" id="dashboard">
                <!-- first column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-primary py-2">
                        <div class="card-title">
                        <?php
                                $modal = new Modal;
                                $total_row = $modal->weekly_inc();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Week Income</h5>
                        </div>
                   </div>
                </div>


                <!-- second column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-warning py-2">
                        <div class="card-title">
                        <?php 
                                $modal = new Modal;
                                $total_row = $modal->weekly_exp();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Week Expenditure</h5>
                        </div>
                   </div>
                </div>

                <!-- third column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-success py-2">
                        <div class="card-title">
                            <?php 
                                // receipt details
                                $modal = new Modal;
                                $total_row = $modal->weekly_rec();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Week Receipt</h5>
                        </div>
                   </div>
                </div>
                <!-- fourth column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-danger py-2">
                        <div class="card-title">
                            <?php 
                                // payment details
                                $modal = new Modal;
                                $total_row = $modal->weekly_pay();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Week Payment</h5>
                        </div>
                   </div>
                </div>

            </div>

            <!-- second row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       // expenditure details
                       $modal = new Modal;
                       $total_exp = $modal->weekly_exp();
                       $total_inc = $modal->weekly_inc();
                       // total monthly expenditure
                       $expenditure = $total_exp['total_report'];
                       $income = $total_inc['total_report'];
                       if ($income > $expenditure) {
                           // making the content surplus
                           $echo = 'Surplus';
                           // the surplus balance
                           $balance = $income - $expenditure;
                           // bootstrap color
                           $color = 'info';
                       }
                       elseif ($income == $expenditure) {
                           // making the content balance
                           $echo = 'Balance';
                           // the deficit balance
                           $balance = $expenditure - $income;
                           // bootstrap color
                           $color = 'danger';
                       }
                       else if ($income < $expenditure) {
                        // making the content surplus
                        $echo = 'Deficit';
                        // the surplus balance
                        $balance = $expenditure - $income;
                        // bootstrap color
                        $color = 'danger';
                    }
                       else {
                           $echo = 'Deficit';
                       }

                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"><?= $echo . ' for the week'. ' : #' . $balance ; ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       $modal = new Modal;
                       // receipt and payment details
                       $total_rec = $modal->weekly_rec();
                       $total_pay = $modal->weekly_pay();
                       // total weekly receipt and payment
                       $receipt = $total_rec['total_report'];
                       $payment = $total_pay['total_report'];
                       if ($receipt > $payment) {
                            // the favorable balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'info';
                        }
                        elseif ($receipt == $payment) {
                            // the balanced balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'danger';
                        }
                        else {
                            // bootstrap color
                            $color = 'danger';
                            $balance = $receipt - $payment;
                        }
                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"> Balance carried down #<?= $balance; ?></p>
                    </div>
                </div>
            </div><br>

            <!-- weekly statement ends -->

            <!-- monthly statement -->
            <h6 style="border-radius:5px;" class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Monthly Statement</h6>
            <div class="row" id="dashboard">
                <!-- first column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-primary py-2">
                        <div class="card-title">
                        <?php
                                $modal = new Modal;
                                $total_row = $modal->monthly_inc();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Month Income</h5>
                        </div>
                   </div>
                </div>


                <!-- second column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-warning py-2">
                        <div class="card-title">
                        <?php 
                                $modal = new Modal;
                                $total_row = $modal->monthly_exp();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Month Expenditure</h5>
                        </div>
                   </div>
                </div>

                <!-- third column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-success py-2">
                        <div class="card-title">
                            <?php 
                                // receipt details
                                $modal = new Modal;
                                $total_row = $modal->monthly_rec();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Month Receipt</h5>
                        </div>
                   </div>
                </div>
                <!-- fourth column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-danger py-2">
                        <div class="card-title">
                            <?php 
                                // payment details
                                $modal = new Modal;
                                $total_row = $modal->monthly_pay();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Month Payment</h5>
                        </div>
                   </div>
                </div>

            </div>

            <!-- second row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       // expenditure details
                       $modal = new Modal;
                       $total_exp = $modal->monthly_exp();
                       $total_inc = $modal->monthly_inc();
                       // total monthly expenditure
                       $expenditure = $total_exp['total_report'];
                       $income = $total_inc['total_report'];
                       if ($income > $expenditure) {
                           // making the content surplus
                           $echo = 'Surplus';
                           // the surplus balance
                           $balance = $income - $expenditure;
                           // bootstrap color
                           $color = 'info';
                       }
                       elseif ($income == $expenditure) {
                           // making the content balance
                           $echo = 'Balance';
                           // the deficit balance
                           $balance = $expenditure - $income;
                           // bootstrap color
                           $color = 'danger';
                       }
                       else {
                           $echo = 'Deficit';
                       }

                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"><?= $echo . ' for the month'. ' : #' . $balance ; ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       $modal = new Modal;
                       // receipt and payment details
                       $total_rec = $modal->monthly_rec();
                       $total_pay = $modal->monthly_pay();
                       // total monthly expenditure
                       $receipt = $total_rec['total_report'];
                       $payment = $total_pay['total_report'];
                       if ($receipt > $payment) {
                            // the favorable balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'info';
                        }
                        elseif ($receipt == $payment) {
                            // the balanced balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'danger';
                        }
                        else if($payment > $receipt){
                                // the favorable balance
                            $balance = $payment - $receipt;
                            // bootstrap color
                            $color = 'danger';
                        }
                        else {
                            // bootstrap color
                            $color = 'danger';
                            $balance = $receipt - $payment;
                        }
                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"> Balance carried down #<?= $balance; ?></p>
                    </div>
                </div>
            </div><br>

                <!-- yearly statement -->
            <h6 style="border-radius:5px;" class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Yearly Statement</h6>
            <div class="row" id="dashboard">
                <!-- first column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-primary py-2">
                        <div class="card-title">
                        <?php
                                $modal = new Modal;
                                $total_row = $modal->yearly_inc();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Year Income</h5>
                        </div>
                   </div>
                </div>


                <!-- second column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-warning py-2">
                        <div class="card-title">
                        <?php 
                                $modal = new Modal;
                                $total_row = $modal->yearly_exp();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                        <?php
                       
                        ?>
                            <h5 class="text-white text-center">Current Year Expenditure</h5>
                        </div>
                   </div>
                </div>

                <!-- third column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-success py-2">
                        <div class="card-title">
                            <?php 
                                // receipt details
                                $modal = new Modal;
                                $total_row = $modal->yearly_rec();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Year Receipt</h5>
                        </div>
                   </div>
                </div>
                <!-- fourth column  -->
                <div class="col-md-3 my-2">
                   <div class="card shadow bg-danger py-2">
                        <div class="card-title">
                            <?php 
                                // payment details
                                $modal = new Modal;
                                $total_row = $modal->yearly_pay();
                            ?>
                            <h3 class="text-white text-center">#<?= $total_row['total_report'];?></h3>
                        </div><hr>
                        <div class="card-body">
                            <h5 class="text-white text-center">Current Year Payment</h5>
                        </div>
                   </div>
                </div>
                   
            </div>
                        <!-- second row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       // expenditure details
                       $modal = new Modal;
                       $total_exp = $modal->yearly_exp();
                       $total_inc = $modal->yearly_inc();
                       // total monthly expenditure
                       $expenditure = $total_exp['total_report'];
                       $income = $total_inc['total_report'];
                       if ($income > $expenditure) {
                           // making the content surplus
                           $echo = 'Surplus';
                           // the surplus balance
                           $balance = $income - $expenditure;
                           // bootstrap color
                           $color = 'info';
                       }
                       elseif ($income == $expenditure) {
                           // making the content balance
                           $echo = 'Balance';
                           // the deficit balance
                           $balance = $expenditure - $income;
                           // bootstrap color
                           $color = 'danger';
                       }
                       else if ($income < $expenditure) {
                        // making the content surplus
                        $echo = 'Deficit';
                        // the surplus balance
                        $balance = $expenditure - $income;
                        // bootstrap color
                        $color = 'danger';
                    }
                       else {
                           $echo = 'Deficit';
                       }

                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"><?= $echo . ' for the year'. ' : #' . $balance ; ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       $modal = new Modal;
                       // receipt and payment details
                       $total_rec = $modal->yearly_rec();
                       $total_pay = $modal->yearly_pay();
                       // total monthly expenditure
                       $receipt = $total_rec['total_report'];
                       $payment = $total_pay['total_report'];
                       if ($receipt > $payment) {
                            // the favorable balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'info';
                        }
                        elseif ($receipt == $payment) {
                            // the balanced balance
                            $balance = $receipt - $payment;
                            // bootstrap color
                            $color = 'danger';
                        }
                        else {
                            // bootstrap color
                            $color = 'danger';
                            $balance = $receipt - $payment;
                        }
                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"> Balance carried down #<?= $balance; ?></p>
                    </div>
                </div>
            </div><br>

            


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

