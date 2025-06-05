<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Messages</h1>
        <br/><br/>

        <?php 
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
        ?>

        <br/><br/>

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>

            <?php 

                $sql = "SELECT * FROM tbl_messages ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE) {
                    $count = mysqli_num_rows($res);
                    $sn = 1;

                    if($count > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $created_at = $row['created_at'];
                            $message = $row['message'];
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $created_at; ?></td>
                                <td><?php echo $message; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/delete-message.php?id=<?php echo $id; ?>" class="btn-danger">Delete Message</a>
                                </td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' class='error'>No Messages Found.</td></tr>";
                    }
                }
            ?>
        </table>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('partials/footer.php'); ?>
