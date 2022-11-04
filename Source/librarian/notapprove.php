<?php 
	include 'inc/connection.php';
	$id= $_GET["id"];
	mysqli_query($link, "update std_registration set status='no' where id=$id");
	mysqli_query($link, "update t_registration set status='no' where id=$id");
 ?>
 <script type="text/javascript">
 	window.location="status.php";
 </script>
 <?php 
     $res = mysqli_query($link, "select * from std_registration where id=$id");
     $res2 = mysqli_query($link, "select * from t_registration where id=$id");
    while($row = mysqli_fetch_array($res)){
        $email      = $row['email']; 
    }
    while($row2 = mysqli_fetch_array($res2)){
        $email      = $row2['email'];
    }
    $to = "$email";
    $subject = "Account Approve problem";
    $message = "We can't approve your account. Might be your information is not correct. Please register with real information <br> Thanks";
    $headers = "From: parttimemail18@gmail.com";
    mail($to,$subject,$message,$headers);
?>