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
        mysqli_query($link,"update message set read1='y' where rusername='$_SESSION[student]'");

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
							<span class="disabled">notifications</span>
						</div>
					</div>
                    <div class="col-md-12">
                        <table class="table table-bordered text-center table-striped">
                            <tr>
                                <th>Librarian name</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                            <?php 
                                 $res=mysqli_query($link,"select * from message where rusername='$_SESSION[student]' order by id desc");

                                  while ($row = mysqli_fetch_array($res)){
                                       $res1=mysqli_query($link,"select * from lib_registration where username='$row[susername]'");
                                       while ($row1 = mysqli_fetch_array($res1)){
                                           $name = $row1["name"];
                                       }

                                        echo "<tr>";
                                        echo "<td>"; echo $name; echo "</td>";
                                        echo "<td>"; echo $row["title"]; echo "</td>";
                                        echo "<td>"; echo $row["msg"]; echo "</td>";
                                        echo "<td>"; echo $row["time"]; echo "</td>";
                                        echo "</tr>";
                                  }
                             ?>
                        </table>
                    </div>
				</div>
			</div>					
		</div>
	</div>

      <?php 
           include 'inc/footer.php';
       ?>