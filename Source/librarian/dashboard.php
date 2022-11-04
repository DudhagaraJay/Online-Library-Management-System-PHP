<?php 
     session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'home';
    include 'inc/header.php';
    include 'inc/connection.php';
 ?>
	<!--dashboard area-->
	<div class="dashboard-content">
		<div class="dashboard-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="left">
							<p><span>dashboard</span>Control panel</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<span class="disabled">dashboard</span>
						</div>
					</div>
				</div>
				<div class="row counterup">
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fa fa-users"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from std_registration");
                                         $res2 = mysqli_query($link, "select * from t_registration");
                                         $count2 = mysqli_num_rows($res2);
                                         $count = mysqli_num_rows($res);
                                         $result = $count + $count2;
                                         echo $result;
                                    ?>
                                    </span></h3>
								<h4><a href="#">Members</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fa fa-rocket"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from issue_book");
                                         $res2 = mysqli_query($link, "select * from t_issuebook");
                                         $count2 = mysqli_num_rows($res2);
                                         $count = mysqli_num_rows($res);
                                         $result = $count + $count2;
                                        echo $result;
                                    ?>
                                    </span></h3>
								<h4><a href="issued-books.php">Issued books</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box3">
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                    <?php
                                         $res = mysqli_query($link, "select * from add_book");
                                         $count = mysqli_num_rows($res);
                                        echo $count;
                                    ?>
                                    </span></h3>
								<h4><a href="display-books.php">books</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="text">
								<h3><span class="counter">
                                     <?php
                                         $res = mysqli_query($link, "select fine from finezone");
                                         $count = mysqli_num_rows($res);
                                        echo $count * 50;
                                    ?>
                                    </span></h3>
								<h4><a href="fine.php">fine</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box3">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="display-books.php">Manage Book</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box4">
							<div class="icon">
								<i class="fas fa-user"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="add-student.php">Manage User</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box">
							<div class="icon">
								<i class="fab fa-staylinked"></i>
							</div>
							<div class="text">
								<h4 class="mt-20"><a href="status.php">Status</a></h4>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 control">
						<div class="box box2">
							<div class="icon">
								<i class="fas fa-book"></i>
							</div>
							<div class="text">
								<h4 class="mt-10"><a href="requested-books.php">Requested Books</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>