<?php
    include 'inc/connection.php';
    $errors =[];


    if (isset($_POST["reset-password"])) {
        $email = $_POST['email'];
        $sql = mysqli_query($link,"SELECT * FROM std_registration WHERE email='$email'");
        while($row = mysqli_fetch_array($sql)) {
            $password = $row['password'];
        }
        if (empty($email)) {
            array_push($errors, "Your email is required");
            echo implode(" ",$errors);
        }else if(mysqli_num_rows($sql) <= 0) {
            array_push($errors, "Sorry, no user exists on our system with that email");
            echo implode(" ",$errors);
        }
        if (count($errors) == 0) {
            $to = "$email";
            $subject = "Forgot password";
            $message = "Your password is $password";
            $headers = "From: parttimemail18@gmail.com \r\n";
            $headers.= "MIME-Version: 1.0". "\r\n";
            $headers.= "Content-type: text/html; charset-UTF-8". "\r\n";
            mail($to, $subject, $message,$headers);
            header('location: login.php');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <style>
        body{
            background: lightblue;
            padding: 100px;
        }
        .thankyou-content{
            width: 850px;
            margin: 0 auto;
        }
        img{
            margin-top: 15px;
        }

    </style>
</head>
<body>
<form class="login-form" action="lost-password.php" method="post">
    <h2 class="form-title">Reset password</h2>
    <!-- form validation messages -->

    <div class="form-group">
        <label>Your email address</label> <br>
        <input type="email" name="email">
    </div>
    <div class="form-group">
        <button type="submit" name="reset-password" class="login-btn">Submit</button>
    </div>
</form>
</body>
</html>
