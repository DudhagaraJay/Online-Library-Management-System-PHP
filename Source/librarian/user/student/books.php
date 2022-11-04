<?php 
     session_start();
    if (!isset($_SESSION["student"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    $page = 'books';
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
							<span class="disabled">books</span>
						</div>
					</div>
				</div>
				<div class="books">
					<form action="" method="post" name="form1">
						<table class="table ">
							<tr>
								<td>
									<input type="text" name="search" class="form-control" placeholder="Enter book name">
								</td>
								<td>
									 <input type="submit" name="submit1" class="btn btn-info" value="Search Book">
								</td>
							</tr>
						</table>
                    </form>
                    <?php
                        if (isset($_POST["submit1"])) {
                            $i=0;
                            $res = mysqli_query($link,"select * from add_book where books_name like('$_POST[search]%')");
                            echo "<table class='table control-books'>";
                            echo "<tr>";
                            while ($row = mysqli_fetch_array($res)){
                                 $i=$i+1;
                                 echo "<td>";
                                 ?> <a href="../<?php echo $row["books_file"]; ?>" target="_blank"><img src="../../<?php echo $row["books_image"]; ?> " alt=""></a> <?php 
                                 echo "</br>";
                                 echo "</br>";
                                 echo "<b>".$row["books_name"]; "</b>";
                                 echo "</br>";
                                 echo "<b>". 
                                 "Available: ".$row["books_availability"]; "</b>";
                                 echo "</td>";

                                 if ($i>=4) {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }

                        }
                        echo "</tr>";
                        echo "</table>";
                        }
                        else{
                            $i=0;
                            $res = mysqli_query($link,"select * from add_book where books_availability>0");
                            echo "<table id='dtBasicExample' class='table control-books'>";
                            echo "<tr>";
                            while ($row = mysqli_fetch_array($res)){
                                 $i=$i+1;
                                 echo "<td>";
                                 ?> <a href="../../<?php echo $row["books_file"]; ?>" target="_blank"><img src="../../<?php echo $row["books_image"]; ?> " alt=""></a> <?php
                                 echo "</br>";
                                 echo "</br>";
                                 echo "<b>".$row["books_name"]; "</b>";
                                 echo "</br>";
                                 echo "<b>". 
                                 "Available: ".$row["books_availability"]; "</b>";
                                 echo "</td>";

                                 if ($i>=4) {
                                     echo "</tr>";
                                     echo "<tr>";
                                     $i=0;
                                 }

                            }
                            echo "</tr>";
                            echo "</table>";
                            }
                     ?>
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