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
    <title>Admin | Category</title>
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
                    <li class="active text-danger"><i class="fa fa-minus mr-1"></i>/ Manage Category</li>
                </ol>

                <div class="card shadow">
                <div>
                    <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ income Category</h6>
                </div>
                <div class="card-body">
                    <div class="responsive">
                       
                        <table class="table table-responsive table-bordered table-hover">
                            <div class="text-left">
                                <button class="btn btn-primary my-2" type="button" data-toggle="modal" data-target="#addcategory">Add category</button>
                            </div>
                            <thead>
                            <?php 
                           
                            $modal = new Modal;
                            $modal->category();
                           
                            ?>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $modal = new Modal;
                                    $type = 'income';
                                    $row = $modal->fetch_cat($type);
                                    $count = 1;
                                    foreach($row as $rows){?>
                                <tr>
                                    <td><?= $count++;?></td>
                                    <td><?= $rows['category_name'];?></td>
                                    <td><?= $rows['category_type'];?></td>
                                    <td style="display:flex;">
                                        <a href="catedit.php?icid=<?=$rows['id'];?>"><i class="fas fa-pen mr-2 text-primary"></i></a>
                                        <a href="delete.php?icid=<?=$rows['id'];?>"><i class="fas fa-trash mr-2 text-danger"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                                    <?php } ?>
                        </table>
                    </div>
                    <!-- bootstrap modal -->
                    <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Add category</h4>
									<button type="submit" class="close" data-dismiss="modal" arial-label="Close" ><span arial-hidden="true">&times;</span></button>
									
								</div>
								<div class="modal-body">
                                     <form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Category Name</label>
											<input type="text" name="cat-name" placeholder="category name" required class="form-control"><br>
                                                <button type="submit" name="catinc" class="btn btn-primary">Add</button>
                                    </form>
                                    </div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-default" data-dismiss="modal">Close
									</button>
									
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
<!-- javascript script -->
<script src="../js/script.js"></script>
</body>
</html>