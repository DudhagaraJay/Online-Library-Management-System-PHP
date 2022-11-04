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
    $rdate = date("d/m/Y", strtotime("+30 days"));
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
							<span class="disabled">teacher issue book</span>
						</div>
					</div>
				</div>
				<div class="issueBook">
					<div class="row">
						<div class="col-md-6">
							<div class="issue-wrapper">
								<form action="" class="form-control" method="post" name="idn">
									<table class="table">
										<tr>
											<td class="">
												<select name="idn" id="" class="form-control">
													 <?php 
                                                        $res= mysqli_query($link, "select idno from t_registration");
                                                        while($row=mysqli_fetch_array($res)){
                                                            echo "<option>";
                                                            echo $row["idno"];
                                                            echo "</option>";
                                                        }
                                                    ?>
												</select>
											</td>
											<td>
												<input type="submit" class="btn btn-info" value="select" name="submit1">
											</td>
										</tr>
									</table>
                                    <?php 
                                    if (isset($_POST["submit1"])) {
                                       $res5 = mysqli_query($link, "select * from t_registration where idno='$_POST[idn]' ");
                                       while($row5 = mysqli_fetch_array($res5)){
                                           $name      = $row5['name'];
										   $username  = $row5['username'];
                                           $lecturer      = $row5['lecturer'];
                                           $email     = $row5['email'];
                                           $phone     = $row5['phone'];
                                           $utype     = $row5['utype'];
                                           $idno     = $row5['idno'];
                                           $_SESSION["utype"]     = $utype;
                                           $_SESSION["idno"]     = $idno;
                                           $_SESSION["tusername"] = $username;
                                       }
                                    
                                    ?>
									<table class="table table-bordered">
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="utype" value="<?php echo $utype; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="idno" value="<?php echo $idno; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"> 
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                               <input type="text" class="form-control" name="teaches"  value="<?php echo $lecturer; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="phone"  value="<?php echo $phone; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="email"  value="<?php echo $email; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="booksname" class="form-control">
                                                    <?php 
                                                            $res= mysqli_query($link, "select books_name from add_book");
                                                            while($row=mysqli_fetch_array($res)){
                                                                echo "<option>";
                                                                echo $row["books_name"];
                                                                echo "</option>";
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="booksissuedate" placeholder="Books issue date" value="<?php echo date("d/m/Y"); ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="booksreturndate"  value="<?php echo $rdate; ?>"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" name="username"  value="<?php echo $username; ?>" disabled> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="submit" name="submit2" class="btn btn-info" value="Issue Book"> 
                                            </td>
                                        </tr>
                                    </table>
                                  <?php
                                }
                            ?>
                                </form>
                                <?php
                                    if (isset($_POST["submit2"])) {
                                      $qty=0;
                                      $res= mysqli_query($link, "select * from add_book where books_name='$_POST[booksname]' ");
                                       while($row = mysqli_fetch_array($res)){
                                          $qty= $row["books_availability"];
                                       }
                                       if ($qty==0) {
                                          ?>
                                            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                            <strong style="">This book is not available.</strong>
                                            </div>
                                          <?php
                                       }
                                       else{
                                          mysqli_query($link, "insert into t_issuebook values('','$_SESSION[utype]','$_SESSION[idno]','$_POST[name]','$_POST[teaches]','$_POST[phone]','$_POST[email]','$_POST[booksname]','$_POST[booksissuedate]','$_POST[booksreturndate]','$_SESSION[tusername]') ");
                                          mysqli_query($link, "update add_book set books_availability=books_availability-1 where books_name='$_POST[booksname]'");

                                          ?>
                                              <script type="text/javascript">
                                                  alert("books issued successfully");
                                                  window.location.href=window.location.href;
                                              </script>
                                        <?php
                                        }
                                    }
                                    ?>
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