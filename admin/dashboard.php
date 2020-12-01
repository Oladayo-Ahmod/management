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
    <title>Admin | Dashboard</title>
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
            <!-- Dashboard item -->
            <div class="row" id="dashboard">
                <div class="col-md-12 my-2">
                <p class="list-group-item bg-info text-white text-center mb-2">Income and Expenditure statistics for the year (,000)</p>
                    <div class="shadow p-2" style="height:350px;">
                        <canvas id="chart_js"></canvas>
                    </div>
                </div>
                
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
                            <h5 class="text-white text-center">Current Month Income </h5>
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
                           $echo = 'Surplus / Deficit';
                           // bootstrap color
                           $color = 'danger';
                       }

                    ?>
                    <p class="list-group-item bg-<?=$color;?> text-white"><?= $echo . ' for the month'. ' : #' . $balance ; ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow">
                    <?php 
                       $modal = new Modal;
                       $id = $_SESSION['id'];
                       $picture = $modal->fetch_picture($id);
                       
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

            <!-- third row -->
            <div class="row my-2">
                <div class="col-md-6">
                   <div class="card shadow">
                       <div class="card-title">
                           <p class="list-group-item bg-warning text-white">Last 7 days Expenditures</p>
                       </div>
                        <div class="responsive">
                            <table class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Cost</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $row = $modal->sevenDays_exp();
                                        if(!empty($row)){
                                          foreach ($row as $rows){?>
                                    <tr>
                                        <td><?= $rows['item']; ?></td>
                                        <td><?= $rows['cost']; ?></td>
                                        <td><?= $rows['itemdate']; ?></td>
                                        <td><?= $rows['place']; ?></td>
                                        <td style="display:flex;" class="my-2">
                                            <a href="../views/edit.php?expid=<?=$rows['id'];?>">
                                                <i class="fas fa-pen mr-2 text-primary"></i>
                                            </a>
                                            <a href="../views/delete.php?expid=<?=$rows['id'];?>">
                                                <i class="fas fa-trash mr-2 text-danger"></i>
                                            </a> 
                                        </td>
                                    </tr>
                                        <?php }}?>
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>

                <div class="col-md-6 my-2">
                   <div class="card shadow">
                       <div class="card-title">
                           <p class="list-group-item bg-primary text-white">Last 7 days Income</p>
                       </div>
                        <div class="responsive">
                        <table class="table table-responsive table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Cost</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $row = $modal->sevenDays_inc();
                                        if(!empty($row)){
                                          foreach ($row as $rows){?>
                                    <tr>
                                        <td><?= $rows['item']; ?></td>
                                        <td><?= $rows['cost']; ?></td>
                                        <td><?= $rows['itemdate']; ?></td>
                                        <td><?= $rows['place']; ?></td>
                                        <td style="display:flex;" class="my-2">
                                            <a href="../views/edit.php?incid=<?=$rows['id'];?>">
                                                <i class="fas fa-pen mr-2 text-primary"></i>
                                            </a>
                                            <a href="../views/delete.php?incid=<?=$rows['id'];?>">
                                                <i class="fas fa-trash mr-2 text-danger"></i>
                                            </a> 
                                        </td>
                                    </tr>
                                        <?php }}?>
                                </tbody>
                            </table>
                        </div>
                   </div>
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
            <script src="../js/Chart.bundle.min.js"></script>
            <!-- javascript script -->
            <script src="../js/script.js"></script>
            <script>
                // chart js section
const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
const bd_brandService3 = 'rgba(0,173,95,0.9)';
const brandProduct3 = 'transparent';
const brandService3 = 'transparent';

var expenditure_chart = [
                <?php 
                      // dynamic fetching of the months' data        
                    $modal = new Modal;
                    $cost = $modal->expenditure_chart();
                    foreach($cost as $costs){?>
                    // dividing the json monthly value by 1000
                    <?= json_encode($costs['costs']/1000) . ','; ?>
                <?php } ?>''
];
var income_chart = [
                <?php 
                      // dynamic fetching of the months' data        
                    $modal = new Modal;
                    $cost = $modal->income_chart();
                    foreach($cost as $costs){?>
                    // dividing the json monthly value by 1000
                    <?= json_encode($costs['costs']/1000) . ','; ?>
                <?php } ?>''];
var chart = document.querySelector('#chart_js');
var myChart = new Chart(chart, {
    type: 'line',
    data: {
      labels: [
                <?php 
                      // dynamic fetching of the months' data        
                    $modal = new Modal;
                    $month = $modal->month_chart();
                    foreach($month as $months){?>
                    <?= json_encode($months['month']) . ','; ?>
                <?php } ?>''
            ],
      datasets: [
        {
          label: 'Expenditure',
          backgroundColor: brandService3,
          borderColor: bd_brandService3,
          pointHoverBackgroundColor: '#fff',
          borderWidth: 0,
          data: expenditure_chart,
          pointBackgroundColor: bd_brandService3
        },
        {
          label: 'Income',
          backgroundColor: brandProduct3,
          borderColor: bd_brandProduct3,
          pointHoverBackgroundColor: '#fff',
          borderWidth: 0,
          data: income_chart,
          pointBackgroundColor: bd_brandProduct3

        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: true
      },
      responsive: true,
      scales: {
        xAxes: [{
          gridLines: {
            drawOnChartArea: true,
            color: '#f2f2f2'
          },
          ticks: {
            fontFamily: "Poppins",
            fontSize: 12
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            stepSize: 50,
            max: 150,
            fontFamily: "Poppins",
            fontSize: 12
          },
          gridLines: {
            display: false,
            color: '#f2f2f2'
          }
        }]
      },
      elements: {
        point: {
          radius: 3,
          hoverRadius: 4,
          hoverBorderWidth: 3,
          backgroundColor: '#333'
        }
      }

    }
  });
            </script>
</body>
</html>