<?php 		
    session_start();
    if (!isset($_SESSION["username"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'tinfo';
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
							<span class="disabled">all teacher info</span>
						</div>
					</div>
				</div>
				<div class="student-wrapper">
					<div class="row">
						<div class="col-md-12">
							<div class="std-info">
                                <table id="dtBasicExample" class="table table-striped table-dark text-center">
                                    <thead>
                                         <tr>
                                             <th>Id No</th>
                                             <th>Name</th>
                                             <th>Username</th>
                                             <th>Lecturer</th>
                                             <th>Email</th>
                                             <th>Phone</th>
                                             <th>Address</th>
                                         </tr>
                                    </thead>
                                    <tbody>       
                                        <?php   
                                             $res= mysqli_query($link, "select * from t_registration");
                                             while ($row=mysqli_fetch_array($res)) {
                                                echo "<tr>";
                                                echo "<td>"; echo $row["idno"]; echo "</td>";
                                                echo "<td>"; echo $row["name"]; echo "</td>";
                                                echo "<td>"; echo $row["username"]; echo "</td>";
                                                echo "<td>"; echo $row["lecturer"]; echo "</td>";
                                                echo "<td>"; echo $row["email"]; echo "</td>";
                                                echo "<td>"; echo $row["phone"]; echo "</td>";
                                                echo "<td>"; echo $row["address"]; echo "</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
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

     <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>