<?php 

    include('../config/constants.php');?>


<html> 
    <head>
        <title>Food Order Website - Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <div class="login-form">
                <h1 class="text-center">Login</h1>
                <br><br>

                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                ?>

                <br><br>

                <form action="" method="POST" class="text-center">
                    Email: <br>
                    <input type="email" name="email" placeholder="Enter Email"><br><br>

                    Password: <br>
                    <input type="password" name="password" placeholder="Enter Password"><br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                    <br><br>
                </form>

                <p class="text-center">Created By - <a href="www.shahriarsajib.com">Shahriar Sajib</a></p>
            </div>
        </div>

<?php

    if(isset($_POST['submit']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $email;

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }


?>