<?php include('partials-front/menu.php'); ?>

<section class="contact">
    <div class="container">
        <h2 class="text-center">Contact Us</h2>

        <div class="contact-details">
            <div class="contact-item">
                <h3>Our Phone Number</h3>
                <p><i class="fa fa-phone"></i> +880 1776331086</p>
            </div>

            <div class="contact-item">
                <h3>Our Email</h3>
                <p><i class="fa fa-envelope"></i> mostofa.sajib332@gmail.com</p>
            </div>

            <div class="contact-item">
                <h3>Our Location</h3>
                <p><i class="fa fa-map-marker"></i> 442/A, Tilpapara, Khilgaon, Dhaka-1219, Bangladesh</p>
            </div>
        </div>
        <br><br><br>

        <div class="contact-form">
            <h3 class="text-center">Send Us a Message</h3>
            <br><br>
            <form action="" method="POST" class="order">
                <div class="order-label">Your Name</div>
                <input type="text" name="name" placeholder="Enter Your Name" class="input-responsive" required>

                <div class="order-label">Your Email</div>
                <input type="email" name="email" placeholder="Enter Your Email" class="input-responsive" required>

                <div class="order-label">Your Message</div>
                <textarea name="message" rows="10" placeholder="Enter Your Message" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Send Message" class="btn btn-primary">
            </form>

            <?php 
                if(isset($_POST['submit']))
                {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $message = mysqli_real_escape_string($conn, $_POST['message']);

                    $sql = "INSERT INTO tbl_messages SET 
                        name = '$name',
                        email = '$email',
                        message = '$message'";

                    $res = mysqli_query($conn, $sql);

                    if($res == TRUE) 
                    {
                        echo "<div class='success text-center'>Your message has been sent successfully. Thank you!</div>";
                        header('location:'.SITEURL);
                    } 
                    else 
                    {
                        echo "<div class='error text-center'>Failed to send your message. Please try again later.</div>";
                        header('location:'.SITEURL);
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
