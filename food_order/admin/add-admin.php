<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add']; 
                unset($_SESSION['add']); 
            }?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" placeholder="Enter Your Email"></td>
                </tr>

                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone" placeholder="Enter Your Phone Number"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br/><br/><br/><br/><br/><br/><br/><br/>

    </div>
</div>    


<?php include('partials/footer.php');?>

<?php  

    if(isset($_POST['submit']))
    {

        $full_name = $_POST['full_name'];
        $password = md5($_POST['password']);
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            password = '$password',
            phone = '$phone',
            email = '$email'
        ";

        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {

            $_SESSION['add'] ="<div class='success'>Admin Added Successfully.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }


    }

?>