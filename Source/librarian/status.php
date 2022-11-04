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
							<span class="disabled">user status</span>
						</div>
					</div>
				</div>
				<div class="issued-content">
					<div class="row">
						<div class="col-md-12">
							<div class="rbook-info status">
                                 <table id="dtBasicExample" class="table table-striped table-dark text-center">
                                       <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>User Type</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                                $res= mysqli_query($link, "select * from std_registration ORDER BY id DESC");
                                                $res2= mysqli_query($link, "select * from t_registration ORDER BY id DESC");
                                                while ($row=mysqli_fetch_array($res)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                                    echo "<td>"; echo $row["status"]; echo "</td>";
                                                    echo "<td>";
                                                    ?>
                                                        <ul>
                                                            <li><a href="approve.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-location-arrow"></i></a></li>
                                                            <li><a href="notapprove.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-allergies"></i></a></li>
                                                        </ul>
                                                    <?php
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                while ($row=mysqli_fetch_array($res2)) {
                                                    echo "<tr>";
                                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                                    echo "<td>"; echo $row["username"]; echo "</td>";
                                                    echo "<td>"; echo $row["utype"]; echo "</td>";
                                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                                    echo "<td>"; echo $row["status"]; echo "</td>";
                                                    echo "<td>";
                                                    ?>
                                                        <ul>
                                                            <li><a href="approve.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-location-arrow"></i></a></li>
                                                            <li><a href="notapprove.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-allergies"></i></a></li>
                                                        </ul>
                                                    <?php
                                                    echo "</td>";
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