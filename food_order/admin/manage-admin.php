<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">  

                <h1>Manage Admin</h1>
                <br/><br/>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; 
                        unset($_SESSION['delete']); 
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; 
                        unset($_SESSION['update']); 
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; 
                        unset($_SESSION['user-not-found']); 
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match']; 
                        unset($_SESSION['pwd-not-match']); 
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd']; 
                        unset($_SESSION['change-pwd']); 
                    }

                ?>

                <br/><br/><br/>

                 <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br/><br/><br/>
                <table class="tbl-full">
                    <tr>
                        <th>I.D.</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>

                    <?php 

                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);
                        
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);
                            
                            $sn=1;

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
  
                                    $id=$rows['Admin_ID'];
                                    $full_name=$rows['full_name'];
                                    $email=$rows['email'];
                                    $phone=$rows['phone'];

                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td>
                                            <?php if($full_name != "Shahriar Sajib") { ?>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <?php } ?>
                                            <?php if($full_name != "Shahriar Sajib") { ?>
                                                <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            <?php } ?>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Update Password</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {
                            }
                        }
                        
                    ?>

                    
                </table>
                        
                

            </div>
        </div>

<?php include('partials/footer.php'); ?>