<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contactUs.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body style="background: #24252a;">
    <?php include ("includes/homeNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="container">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    Bring us your problems!
                    We solve it!
                </p>

                <div class="info">
                    <div class="information">
                        <img src="img/location.png" class="icon" alt="" />
                        <p>Speak Up</p>
                    </div>
                    <div class="information">
                        <img src="img/email.png" class="icon" alt="" />
                        <p>speakupquries24.7@gmail.com</p>
                    </div>
                    <div class="information">
                        <img src="img/phone.png" class="icon" alt="" />
                        <p>+91 8248591622</p>
                    </div>
                    <br><br><br><br>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form method="post" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" name="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <script>
    const inputs = document.querySelectorAll(".input");

    function focusFunc() {
        let parent = this.parentNode;
        parent.classList.add("focus");
    }

    function blurFunc() {
        let parent = this.parentNode;
        if (this.value == "") {
            parent.classList.remove("focus");
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("focus", focusFunc);
        input.addEventListener("blur", blurFunc);
    });
    </script>
    <?php
        if(isset($_POST["submit"]))
        {
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $contact_message=$_POST["message"];

            $sqlInsert="INSERT INTO user_contact(user_contact_name,
            user_contact_email,
            user_contact_phone,
            user_contact_message) VALUES 
            ('{$name}','{$email}','{$phone}','{$contact_message}')";

            if($conn->query($sqlInsert))
            {
                $to       = "speakupquries24.7@gmail.com";
                $subject  = 'Speak Up Queries Regarding...!!';
                $message = '<html><body>';
                $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
<div style="margin:50px auto;width:70%;padding:20px 0">';
                $message .='<div style="border-bottom:1px solid #eee">';
                $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
                $message .='</div>';
                $message .='<p style="font-size:1.1em">Hi,</p>';
                $message .='<p>Thank you! '.$name.' for your response. Our team will contact you shortly!</p>';
                $message .='<p>Your Response</p>';
                $message .='<p>Name: '.$name.'</p>';
                $message .='<p>Email ID: '.$email.'</p>';
                $message .='<p>Phone No: '.$phone.'</p>';
                $message .='<p>Message: '.$contact_message.'</p>';
                $message .='<p style="font-size:0.9em;">Regards,<br />Speak Up</p>';
                $message .='<hr style="border:none;border-top:1px solid #eee" />';
                $message .='<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">';
                $message .='<p>Speak Up</p>';
                $message .='<p>SKCET</p>';
                $message .='<p>Coimbatore</p>';
                $message .='</div>';
                $message .='</div>';
                $message .='</div>';
                $message .= '</body></html>';
                // $message  = 'Name: '.$name.'<br> Email ID: '.$email.'<br> Phone No: '.$phone.'<br> Message: '.$message;
                $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n" .
                            'Content-type: text/html; charset=utf-8';
                if(mail($to, $subject, $message, $headers))
                {
                    echo "<script>alert('Your queries sent Successfully');</script>";
                    echo "<script>location.replace('signIn.php');</script>";
                }
                else
                    echo "<script>alert('Email Sent Failed');</script>";
            }
            else {
            echo $conn->error;
            }

        }
    ?>
</body>

</html>