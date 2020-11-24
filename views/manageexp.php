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
    <title>Admin | Expenditure Management</title>
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
                <li class="active text-danger"><i class="fa fa-minus mr-1"></i>/ Expenditure Management</li>
            </ol>

        <div class="card shadow">
            <div>
                <h6 class="list-group-item active"><i class="fa fa-minus mr-1"></i>/ Manage Expenses</h6>
            </div>
            <div class="card-body">
                                                <!--pagination for the table-->
												<nav arial-black="Page navigation example text-center">
													<ul class="pagination justify-content-center">
                                                        <?php
                                                       
                                                        // setting result per page
                                                        $rpp = 10;
                                                        //check if the page is set
                                                        if (isset($_GET['page'])) {
                                                            $page = $_GET['page'];
                                                        }
                                                        else{
                                                            $page = 1;
                                                        }
                                                        // check if the page value is greater than 1
                                                        if ($page > 1) {
                                                            $start = ($page * $rpp) - $rpp;
                                                        }
                                                        else {
                                                            $start = 1;
                                                        }
                                                        //previous button for the pagination
                                                        $previous = $page - 1;
                                                        //next button for the pagination
                                                        $next = $page + 1; 
                                                        $modal = new Modal;
                                                        $row =  $modal->manageExp($start,$rpp,$page,$previous,$next);
                                                        $total_pages = $row['total'];

                                                        ?>
														<li class="page-item"><a href="manageexp.php?page=<?= $previous;?>" class="page-link">previous</a></li>
														<?php 
														for ($i=1; $i<= $total_pages; $i++):?>
															<li class="page-item"><a href="manageexp.php?page=<?= $i;?>" class="page-link"><?= $i; ?></a></li>
														<?php endfor; ?>
														
														<li class="page-item"><a href="manageexp.php?page=<?= $next;?>" class="page-link">Next</a></li>
													</ul>
												</nav>
                    <div class="table-responsive">
                        <table class="table  table-responsive table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Place</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $modal = new Modal;
                                $row =  $modal->manageExp($start,$rpp,$page,$previous,$next);
                                   $count = 1;
                                    if (!empty($row)) {
                                        foreach($row as $rows){?>
                                            <tr>
                                                <td><?= $count++ ; ?></td>
                                                <td><?= $rows['item']; ?></td>
                                                <td><?= $rows['cost']; ?></td>
                                                <td><?= $rows['itemdate']; ?></td>
                                                <td><?= $rows['itemdesc']; ?></td>
                                                <td><?= $rows['category']; ?></td>
                                                <td><?= $rows['place']; ?></td>
                                                <td style="display:flex;">
                                                    <a href="edit.php?expid=<?=$rows['id'];?>"><i class="fas fa-pen mr-2 text-primary"></i></a>
                                                    <a href="delete.php?expid=<?=$rows['id'];?>"><i class="fas fa-trash text-danger"></i></a>
                                                </td>
                                            </tr>
                                                <?php }} ?>
                                   
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