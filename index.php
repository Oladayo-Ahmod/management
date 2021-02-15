<?php
// starting session
session_start();
// check if the user is already logged in
if ($_SESSION) {
    if(strlen($_SESSION['id']) > 0){
        // redirect to the dashboard 
        header('location:admin/dashboard.php');
    }    
}
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include 'modal/modal.php';
$modal = new Modal;
$error = $modal->login();
$modal->login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSSN | Management</title>
    <!-- css file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- css libraries -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
    <div class="container-fluid" id="container">
       
        <div class="row  justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-title">
                        <h5 class="list-group-item active text-center">Admin | Login</h5>
                    </div>
                        <!-- error or success message -->
                           <?php
                           if (isset($_POST['login'])) {
                                if ($error) {
                                    echo $error['error'];
                                }
                            }
                            
                           ?>
                        <!-- error or success message ends -->
                        <form action="#" class="form-group p-2" method="POST">
                            <label for="email">Email</label>
                            <input type="email" required name="email" class="form-control">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"><br>
                            <button style="width:100%;" type="submit" name="login" class="btn btn-primary">Login</button>
                            <div class="ml-auto">
                                <a href="recovery/forgotpassword.php" class="text-danger">forgot password?</a>
                            </div>
                        </form>
                 </div>
            </div>
        </div>
    </div>

        <!-- including footer file -->
            
    <footer class="shadow" style="position:absolute;">
    <p>Copyright &copy; 2020 | University of Ilorin MSSN | Management Sciences | Developed By 
    <a href="https://unitechdev.com" class="text-danger">Unitech</a> 
    </p>
    </footer>

        <!-- javascript libraries -->
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        <!-- javascript script -->
            <script src="js/script.js"></script>
</body>
</html>