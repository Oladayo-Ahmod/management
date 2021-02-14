<?php 
     // starting session
     session_start();
     if (strlen($_SESSION['id']) < 1) {
         header('location:../index.php');
     } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Profile</title>
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
                <li class="active text-primary"><i class="fa fa-minus mr-1"></i>/ Profile Account</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Manage profile</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <?php 
                            $modal = new Modal;
                            $id = $_SESSION['id'];
                            $picture = $modal->fetch_picture($id);
                        ?>
                        <img src="<?= $picture['picture']; ?>" id="img-fluid" class="img-fluid card-img-top" alt="profile image">
                        <a href="../views/picture.php"><i class="fas fa-pen text-danger"></i></a>
                    </div>
                </div>
                <?php 
                   
                    if (isset($_POST['update'])) {
                        $modal = new Modal;
                        $modal->profile_update($id);
                        
                    }
                    // fetching admin data from the method
                    $modal = new Modal;
                    // setting id from the session
                    $id = $_SESSION['id'];
                    $row = $modal->profile($id);
                    if (!empty($row)) {
                        foreach ($row as $profile) {?>
                        <form action="#" method="POST" class="form-group" enctype="multipart/form-data">
                            <label for="fullname">Full name</label>
                            <input type="text" class="form-control" required value="<?=$profile['fullname']; ?>" name="fullname"><br>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" required name="email" value="<?=$profile['email']; ?>"><br>
                            <label for="post">Post held</label>
                            <input type="text" class="form-control" required name="role" value="<?=$profile['post']; ?>"><br>
                            <label for="department">Department</label>
                            <input type="text" class="form-control" required name="department" value="<?=$profile['department']; ?>"><br>
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </form>
                        <?php }}?>
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