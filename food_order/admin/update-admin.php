<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php

            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_admin WHERE Admin_ID=$id";

            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            if(isset($_SESSION['update'])) 
            {
                echo $_SESSION['update']; 
                unset($_SESSION['update']); 
            }
        ?>

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
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <br/><br/><br/><br/><br/><br/><br/><br/>

    </div>
    
</div>

<?php 

    if(isset($_POST['submit']))
    {
        
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        email = '$email',
        phone = '$phone'
        WHERE Admin_ID=$id
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>
