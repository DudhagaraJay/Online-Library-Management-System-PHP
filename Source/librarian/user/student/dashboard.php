<?php 
     session_start();
    if(!isset($_SESSION["student"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page ='home';
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
							<span class="disabled">Dashboard</span>
						</div>
					</div>
				</div>
			</div>	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="st-issuedBook">
							<table id="dtBasicExample" class="table table-dark table-striped text-center">
								<thead>
                                    <tr>
                                        <th>Reg No</th>
                                        <th>Username</th>
                                        <th>Books Name</th>
                                        <th>Books Issue Date</th>
                                        <th>Books Return Date</th>
								   </tr>
								</thead>
								<tbody>
								<?php 
									$res= mysqli_query($link, "select * from issue_book where username='".$_SESSION['student']."' ORDER BY id DESC");
									while ($row=mysqli_fetch_array($res)) {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["regno"]; echo "</td>";
                                        echo "<td>"; echo $row["username"]; echo "</td>";
                                        echo "<td>"; echo $row["booksname"]; echo "</td>";
                                        echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                        echo "<td>"; echo $row["booksreturndate"]; echo "</td>";
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
	<?php 
		include 'inc/footer.php';
	 ?>
 <script>
    $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>