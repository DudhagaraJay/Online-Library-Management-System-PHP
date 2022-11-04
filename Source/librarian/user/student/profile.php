<?php 
     session_start();
    if (!isset($_SESSION["student"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
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
							<p><span>dashboard</span>User panel</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<span class="disabled">profile</span>
						</div>
					</div>
				</div>
				<div class="profile-content">
					<div class="row">
						<div class="col-md-3">
							<div class="photo">
								<?php
                                    $res = mysqli_query($link, "select * from std_registration where username='".$_SESSION['student']."'");
                                    while ($row = mysqli_fetch_array($res)){
                                        ?><img src="<?php echo $row["photo"]; ?> " height="" width="" alt="something wrong"></a> <?php
                                    }                                                            

                                ?>
							</div>
							<div class="uploadPhoto">
								<div class="gap-30"></div>
								<form action="" method="post" enctype="multipart/form-data">
									<input type="file" name="image" class="modal-mt" id="image">
									<div class="gap-30"></div>
									<input type="submit" class="modal-mt btn btn-info" value="Upload Image" name="submit">
								</form>
							</div>
                            <?php 
                                if (isset($_POST["submit"])) {
                                    $image_name=$_FILES['image']['name'];
                                    $temp = explode(".", $image_name);
                                    $newfilename = round(microtime(true)) . '.' . end($temp);
                                    $imagepath="upload/".$newfilename;
                                    move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                                    mysqli_query($link, "update std_registration set photo='".$imagepath."' where username='".$_SESSION['student']."'");
                                    ?>
                                        <script type="text/javascript">
                                            window.location="profile.php";
                                        </script>
                                    <?php
                                }
                            ?>
						</div>
						<div class="col-md-9">
							<div class="details">
                                <?php
                                       $res5 = mysqli_query($link, "select * from std_registration where username='$_SESSION[student]' ");
                                       while($row5 = mysqli_fetch_array($res5)){
                                           $regno      = $row5['regno'];
										   $username  = $row5['username'];
                                           $name      = $row5['name'];
                                           $sem      = $row5['sem'];
                                           $session      = $row5['session'];
                                           $dept      = $row5['dept'];
                                           $email     = $row5['email'];
                                           $phone     = $row5['phone']; 
                                           $address     = $row5['address'];
                                           $utype     = $row5['utype'];
                                       }
                                    ?>
                                <form method="post">
                                    <div class="form-group details-control">
                                        <label for="regno" class="text-right">Reg No:</label>
                                        <input type="text" class="form-control custom"  name="regno" value="<?php echo $regno; ?>" disabled />
                                    </div>
                                    <div class="form-group details-control">
                                         <label for="username">Username:</label>
                                        <input type="text" class="form-control custom"  name="username" value="<?php echo $username; ?>" disabled />
                                    </div>
                                    <div class="form-group details-control">
                                        <label for="name" class="text-right">Name:</label>
                                        <input type="text" class="form-control custom"  name="name" value="<?php echo $name; ?>" />
                                    </div>

                                    <div class="form-group details-control">
                                        <label for="sem" class="text-right">Semester:</label>
                                        <input type="text" class="form-control custom"  name="sem" value="<?php echo $sem; ?>" />
                                    </div>
                                    <div class="form-group details-control">
                                        <label for="session" class="text-right">Session:</label>
                                        <input type="text" class="form-control custom"  name="session" value="<?php echo $session; ?>" />
                                    </div>
                                    <div class="form-group details-control">
                                        <label for="dept" class="text-right">Departemt:</label>
                                        <input type="text" class="form-control custom"  name="dept" value="<?php echo $dept; ?>" />
                                    </div>

                                    <div class="form-group details-control">
                                         <label for="email">Email:</label>
                                        <input type="text" class="form-control custom"  name="email" value="<?php echo $email; ?>" disabled/>
                                    </div>
                                    <div class="form-group details-control">
                                         <label for="phone">Phone No:</label>
                                        <input type="text" class="form-control custom"  name="phone" value="<?php echo $phone; ?>" />
                                    </div>			                    
                                    <div class="form-group details-control">
                                        <label for="address">Address:</label>
                                         <input type="text" class="form-control custom"  name="address" value="<?php echo $address; ?>" />
                                    </div>
                                    <div class="form-group details-control">
                                        <label for="utype">User Type:</label>
                                         <input type="text" class="form-control custom"  name="utype" value="<?php echo $utype; ?>"  disabled="" />
                                    </div>
                                    <div class="text-right mt-20">
                                        <input type="submit" value="Save" class="btn btn-info" name="update">
                                    </div>
                                <?php
                                ?>
                                </form>
			                </div> 
                            <?php
                               if (isset($_POST["update"])){
                                   mysqli_query($link, "update std_registration set 
                                   name='$_POST[name]',
                                   phone='$_POST[phone]',
                                   address='$_POST[address]'
                                   where username='$_SESSION[student]'");
                                    ?>
                                        <script type="text/javascript">
                                            window.location="profile.php";
                                        </script>
                                    <?php
                               }
                            ?>
		                </div>    
					</div>
				</div>
			</div>					
		</div>
	</div>
	<?php 
		include 'inc/footer.php';
	 ?>