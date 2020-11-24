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
    <title>Admin | Profile | Picture</title>
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
            <?php
               
                if (isset($_POST['picture'])) {
                    // setting the id
                    $id = $_SESSION['id'];
                    // image path
                    $image_path = "../images/".$_FILES['image']['name'];
                    // moving uploaded image to the path
                    move_uploaded_file($_FILES['image']['tmp_name'],$image_path);
                    // instantiating modal class
                    $modal = new Modal;
                    $picture = $modal->fetch_picture($id);
                    $modal->profile_picture($id,$image_path);
                }
             ?>
            <ol class="breadcrumb">
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ Profile Account</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Manage profile</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <div class="shadow">
                        <img src="<?= $picture['picture']; ?>" id="img-fluid" class="img-fluid  card-img-top" alt="profile image">
                        <form action="#" method="POST" enctype="multipart/form-data" class="form-control">
                            <input type="file" name="image" id=""><br>
                            <button type="submit" name="picture" class="btn my-2 btn-primary btn-sm">Update</button>
                        </form>
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
