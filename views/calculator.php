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
    <title>Admin | Calculator</title>
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
                <li class="active text-danger"><i class="fa fa-minus mr-1"></i>/ Calculator</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Calculator</h6>
            </div>
            <div class="card-body p-1">
            <div id="calculator" class="bg-primary">
   	<div class="output">
     <div class="previous">calculator</div>
     <div id="current"></div>
     </div>
        <button onclick="ac()" class ="symbols shadow text-warning">AC</button>
     	<button onclick="del()" class="symbols shadow text-warning">DEL</button>
        <button onclick="pow()" class ="symbols shadow text-warning">POW</button>
        <button onclick="divide()" class ="symbols shadow text-warning"><i class="fas text-warning fa-divide mr-1"></i></button>
     	<button onclick="one()" class="figures">1</button>
     	<button onclick="two()" class="figures" >2</button>
     	<button onclick="three()" class="figures">3</button>
     	<button onclick="multiply()" class="symbols shadow text-warning"><i class="fas text-warning fa-times mr-1"></i></button>
     	<button onclick="four()" class="figures">4</button>
     	<button onclick="five()" class="figures">5</button>
     	<button onclick="six()" class="figures">6</button>
     	<button onclick="plus()"class="symbols shadow text-warning"><i class="fas text-warning fa-plus mr-1"></i></button>
     	<button onclick="seven()" class="figures">7</button>
     	<button onclick="eight()" class="figures">8</button>
     	<button onclick="nine()" class="figures">9</button>
     	<button onclick="minus()" class="symbols shadow text-warning"><i class="fas text-warning fa-minus mr-1"></i></button>
     	<button onclick="point()" class="symbols shadow text-warning">.</button>
     	<button onclick="zero()" class="figures">0</button>
        <button onclick="equal()" class="symbols shadow text-warning"><i class="fas text-warning fa-equals mr-1"></i></button>
        <button onclick="sqrt()" class="symbols shadow text-warning"><i class="fas text-warning fa-square-root-alt mr-1"></i></button>
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
            <!-- javascript script -->
            <script src="../js/script.js"></script>
</body>
</html>