            <div class="container-fluid toggle-nav">
                <div class="row justify-content-left align-items-left">
                    <div class="col-md-3 nav-toggle" id="cols">
                        <div class="card shadow bg-primary text-white p-3">
                            <div class="text-center">
                            <?php
                                // including modal class
                                include '../modal/modal.php';
                                // instantiating modal class
                                $modal = new Modal;
                                // setting the id
                                $id = $_SESSION['id'];
                                $picture = $modal->fetch_picture($id);
                       ?>
                                <img src="<?= $picture['picture']; ?>" id="img-fluid" class="img-fluid card-img-top" alt="profile image">
                            </div>
                            <div class="caption">
                                <p class="text-center"><i class="fas text-warning fa-user-circle mr-1 text-warning"></i><?= $_SESSION['username']; ?></p>
                            </div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="../admin/dashboard.php" class="nav-link"><i class="fas text-warning fa-calculator mr-1"></i>Dashboard</a>
                                </li>
                                <li class="nav-item" onclick="transact()"><i class="fas text-warning text-warning fa-exchange-alt mr-1"></i>Cash Transaction
                                    <div class="toggle1 ml-2 shadow">
                                        <a href="../views/receipt.php" class="nav-link"><i class="fa text-warning fa-plus mr-1"></i>Receipt</a>
                                        <a href="../views/payment.php" class="nav-link"><i class="fa text-warning fa-minus mr-1"></i>Payment</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="expenditure()"><i class="fab text-warning fa-amazon-pay mr-1"></i>Expenditures
                                    <div class="toggle2 ml-2">
                                        <a href="../views/addexp.php" class="nav-link"><i class="fa text-warning fa-plus mr-1"></i>Add</a>
                                        <a href="../views/manageexp.php" class="nav-link"><i class="fa fa-tasks text-warning mr-1"></i>Manage</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="income()"><i class="fas text-warning fa-money-bill-alt mr-1" arial-hidden="true"></i>Income
                                    <div class="toggle3 ml-2">
                                        <a href="../views/addinc.php" class="nav-link"><i class="fa fa-plus text-warning mr-1"></i>Add</a>
                                        <a href="../views/manageinc.php" class="nav-link"><i class="fa fa-tasks text-warning mr-1"></i>Manage</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="expReport()"><i class="fa fa-file text-warning mr-1"></i>Expenditure Report
                                    <div class="toggle4 ml-2">
                                        <a href="../views/weeklyexp.php?wkexp=1" class="nav-link"><i class="fas text-warning fa-clock mr-1"></i>Weekly</a>
                                        <a href="../views/monthlyexp.php?mtexp=1" class="nav-link"><i class="fas text-warning fa-calendar mr-1"></i>Monthly</a>
                                        <a href="../views/yearlyexp.php?yrexp=1" class="nav-link"><i class="fas text-warning fa-calendar-alt mr-1"></i>Yearly</a>
                                        <a href="../views/searchexp.php" class="nav-link"><i class="fa text-warning fa-search mr-1"></i>Custom Search</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="incReport()"><i class="fa fa-file mr-1 text-warning"></i>Income Report
                                    <div class="toggle5 ml-2">
                                        <a href="../views/weeklyinc.php?wkinc=1" class="nav-link"><i class="fas text-warning fa-clock mr-1"></i>Weekly</a>
                                        <a href="../views/monthlyinc.php?mtinc=1" class="nav-link"><i class="fas text-warning fa-calendar mr-1"></i>Monthly</a>
                                        <a href="../views/yearlyinc.php?yrinc=1" class="nav-link"><i class="fas text-warning fa-calendar-alt mr-1"></i>Yearly</a>
                                        <a href="../views/searchinc.php" class="nav-link"><i class="fa text-warning fa-search mr-1"></i>Custom Search</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="category()"><i class="fas text-warning fa-list-alt mr-1" arial-hidden="true"></i>Category
                                    <div class="toggle8 ml-2">
                                        <a href="../views/catinc.php" class="nav-link"><i class="fa fa-plus text-warning mr-1"></i>Income</a>
                                        <a href="../views/catexp.php" class="nav-link"><i class="fa fa-minus text-warning mr-1"></i>Expenditure</a>
                                    </div>
                                </li>


                                <li class="nav-item" onclick="budget()"><i class="fa text-warning fa-file mr-1"></i>Budget
                                    <div class="toggle6 ml-2">
                                        <a href="../views/budgetinc.php" class="nav-link"><i class="fa text-warning fa-plus mr-1"></i>Budgetted Income</a>
                                        <a href="../views/budgetexp.php" class="nav-link"><i class="fa fa-minus text-warning mr-1"></i>Budgetted Expenses</a>
                                    </div>
                                </li>

                                <li class="nav-item" onclick="balance()"><i class="fas text-warning text-warning fa-exchange-alt mr-1"></i>Surplus / Deficit
                                    <div class="toggle7 ml-2">
                                        <a href="../views/balance.php" class="nav-link"><i class="fas text-warning fa-clock mr-1"></i>Statement</a>
                                    </div>
                                </li>

                                <li class="nav-item"><a href="../views/calculator.php" class="nav-link"><i class="fas text-warning fa-calculator mr-1"></i>Calculator</a></li>
                                <li class="nav-item mt-0"><a href="../views/profile.php" class="nav-link"><i class="fas text-warning fa-user mr-1"></i>Profile</a></li>
                                <li class="nav-item mt-0"><a href="../views/logout.php" class="nav-link"><i class=" text-warning fas fa-sign-out-alt mr-1"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                                    <!-- breadcrumb -->
                                    <div class="col-md-9 my-3">
										<ol class="breadcrumb">
											<li class="active text-primary"> <i class="fas fa-home text-primary"></i>/ Dashboard</li>
										</ol>
					
                
            
           