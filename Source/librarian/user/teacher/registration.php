<?php 
    include 'inc/connection.php';
    include 'inc/function.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Management System</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="inc/css/pro1.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <style>
        .registration{
            background-image: url(inc/img/3.jpg);
            margin-bottom: 30px;
            padding: 50px;
            padding-bottom: 70px;
        }
        .reg-header h2{
            color: #DDDDDD;
            z-index: 999999;
        }
        .login-body h4{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="registration">
        <div class="reg-wrapper">
            <div class="reg-header text-center">
                <h2>Library management system</h2>
            </div>
            <div class="gap-40"></div>
            <div class="reg-body">
                 
                <h4 style="text-align: center; margin-bottom: 25px;">Teacher registration form</h4>
                <form action="" class="form-inline" method="post">
					<?php if(isset($s_msg)):?>
						<span class="success"> <?php echo $s_msg; ?></span>
					<?php endif ?>
					<?php if(isset($error_m)):?> 
						<span class="errort"> <?php echo $error_m; ?></span>
					<?php endif ?>
                    <div class="form-group">
                        <label for="name" class="text-right">Name <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Full Name" name="name"/>
                    </div>
                    <div class="form-group">
                         <label for="username">Username <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Username" name="username"/>
                    </div>
                    <?php if(isset($error_ua)):?> 
                     <span class="error"> <?php echo $error_ua; ?></span>
                      <?php endif ?>
                      <?php if(isset($error_uname)):?> 
                     <span class="error"> <?php echo $error_uname; ?></span>
                      <?php endif ?>
                    <div class="form-group">
                         <label for="password">Password <span>*</span></label>
                        <input type="password" class="form-control custom" placeholder="Password" name="password"/>
                    </div>
					<?php if(isset($error_pw)):?> 
                     <span class="error"> <?php echo $error_pw; ?></span>
                      <?php endif ?>
                    <div class="form-group">
                         <label for="lecturer">Lecturer <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="lecturer / dept" name="lecturer"/>
                    </div>
                    <div class="form-group">
                         <label for="email">Email <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Gmail" name="email"/>
                    </div>
                     <?php if(isset($e_msg)):?> 
                    <span class="error"><?php echo $e_msg; ?> </span>
                    <?php endif ?>
                    <?php if(isset($error_email)):?> 
                    <span class="error"><?php echo $error_email; ?> </span>
                    <?php endif ?>
                    <div class="form-group">
                         <label for="phone">Phone No <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Phone No" name="phone"/>
                    </div>
                     <?php if(isset($error_phone)):?> 
                    <span class="error"><?php echo $error_phone; ?></span>
                      <?php endif ?>
                    <div class="form-group">
                         <label for="session">Id No <span>*</span></label>
                        <input type="text" class="form-control custom" placeholder="Id No" name="idno"/>
                    </div>
                     <?php if(isset($error_id)):?> 
                    <span class="error"><?php echo $error_id; ?></span>
                      <?php endif ?>
                    <div class="form-group">
                         <label for="address">Address <span>*</span></label>
                        <textarea name="address" id="address"  class="form-control custom" placeholder="Your address"></textarea>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Register" class="btn change" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer text-center">
        <p>&copy; All rights reserved utter pompously</p>
    </div>

    <script src="inc/js/jquery-2.2.4.min.js"></script>
    <script src="inc/js/bootstrap.min.js"></script>
    <script src="inc/js/custom.js"></script>
</body>
</html>