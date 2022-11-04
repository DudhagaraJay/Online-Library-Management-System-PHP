<?php 
    session_start();
    if (!isset($_SESSION["username"])) {
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
							<p><span>dashboard</span>Control panel</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right text-right">
							<a href="dashboard.php"><i class="fas fa-home"></i>home</a>
							<span class="disabled">send message to teacher</span>
						</div>
					</div>
				</div>
				<div class="sendMessage">
					<form action="" method="post" name="form1" class="col-lg-6" enctype="multipart/form-data">
					 
                        <table class="table table-bordered table-striped">
						<?php
							date_default_timezone_set("Asia/Dhaka");
							$time= date("Y-m-d h:i:sa");
							if (isset($_POST["submit"])) {
								$title  = $_POST["title"];
								$msg    = $_POST["msg"]; 
								if ($title == "" | $msg =="" ) {
									echo "<span style='color: red;'><b>Error !</b> Feild mustn't be empty</span>";
								}else{
									$sql = mysqli_query($link, "insert into message values('','$_SESSION[username]','$_POST[rusername]','$_POST[title]','$_POST[msg]','n','$time') ");
									echo "<span style='color: green; margin-bottom: 10px;'><b>Success !</b>Message send successfully</span>";
									if(!$sql){
										echo "<span style='color: red; margin-bottom: 10px;'><b>Warning !</b>Message can't be sent</span>";	
									}
								}	
							}
						?>
                            <tr>
                                <td>
                                   <select name="rusername" class="form-control">
	                                     <?php 
                                             $res= mysqli_query($link, "select * from t_registration");
                                                
                                                while($row=mysqli_fetch_array($res)){
                                                    ?><option value="<?php echo $row["username"]?>">
                                                    <?php  echo $row["username"]. " (".$row["idno"].")"; ?>
                                                    </option><?php
                                                } 
                                           ?>
                                  </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter title" name="title">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="msg" class="form-control" placeholder="Message here...."></textarea>
                                </td>
                            </tr>
                            <tr>
                        </table>
                        <input type="submit" name="submit" value="Send Message" class="btn btn-info">
                    </form>
				</div>
			</div>					
		</div>
	</div>
	
	<?php 
		include 'inc/footer.php';
	 ?>