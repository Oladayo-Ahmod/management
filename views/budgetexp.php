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
    <title>Admin | Budget | Expenditure</title>
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
                    <li class="active text-danger"><i class="fa fa-minus mr-1"></i>/ Manage Budget</li>
                </ol>

                <div class="card shadow">
                <div>
                    <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Budgeted Expenditure</h6>
                </div>
                <div class="card-body">
                    <div class="responsive">
                       
                        <table class="table table-responsive table-bordered table-hover">
                            <div class="text-left">
                                <button class="btn btn-primary my-2" type="button" data-toggle="modal" data-target="#addbudget">Add Budget</button>
                            </div>
                            <thead>
                            <?php 
                                $modal = new Modal;
                                $modal->budget();
                           
                            ?>
                                <tr>
                                    <th>S/N</th>
                                    <th>Item</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $modal = new Modal;
                                    $type = 'expenditure';
                                    $row = $modal->fetch_bud($type);
                                    $count = 1;
                                    if(!empty($row)){
                                        foreach($row as $rows){?>
                                            <tr>
                                                <td><?= $count++;?></td>
                                                <td><?= $rows['item'];?></td>
                                                <td><?= $rows['category'];?></td>
                                                <td><?= $rows['budget_type'];?></td>
                                                <td><?= $rows['item_cost'];?></td>
                                                <td><?= $rows['notedate'];?></td>
                                                <td style="display:flex;">
                                                    <a href="budgetedit.php?ebid=<?=$rows['id'];?>"><button class="btn btn-primary mr-2">Edit</button></a>
                                                    <a href="delete.php?ebid=<?=$rows['id'];?>"><button class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                                <?php }}?>                               
                            </tbody>
                        </table>
                    </div>
                    <!-- bootstrap modal -->
                    <div class="modal fade" id="addbudget" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">Add budget</h4>
									<button type="submit" class="close" data-dismiss="modal" arial-label="Close" ><span arial-hidden="true">&times;</span></button>
									
								</div>
								<div class="modal-body">
                                     <form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Item</label>
                                        <input type="text" name="name" placeholder="budget name" required class="form-control"><br>
                                        <label for="cost">Cost</label>
                                        <input type="number" name="cost" placeholder="budget cost" required class="form-control"><br>
                                        <label for="description">Description</label>
                                        <input type="text" name="description" placeholder="budget description" required class="form-control"><br>
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="" required>
                                        <option value="" disabled selected>choose category</option>
                                        <?php 
                                            // fetching expenditure category
                                            $modal = new Modal;
                                            //category type
                                            $type = 'expenditure';
                                            $fetch = $modal->fetch_cat($type);
                                            foreach($fetch as $fetches){?>
                                        <option value=<?= $fetches['category_name'];?> ><?= $fetches['category_name'];?></option>
                                        <?php }?>	
                                    </select><br>
                                        <button type="submit" name="budgetexp" class="btn btn-primary">Add</button>
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