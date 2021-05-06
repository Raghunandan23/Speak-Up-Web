<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<html>

<head>
    <title>Forget Password Verification</title>
    <link rel="stylesheet" href="css/passwordVerification.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body style="background:#24252a;">
    <?php include ("includes/homeNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="app">
        <div class="bg">
            <form name="myform" method="post">
                <header>
                    <h1>Verification</h1>
                </header>
                <label for="user_email">Email-ID :</label>
                <input type="test" name="user_email" id="user_email" class="form-control"><br><br><br><br>
                <button type="submit" class="btn btn-primary" name="otp">Generate OTP</button><br><br>
                <label for="user_otp">Enter OTP :</label>
                <input type="text" class="form-control" id="user_otp" name="user_otp"><br><br><br><br>
                <button type="submit" class="btn btn-primary" name="verify">Verify</button>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST["otp"]))
    {
        $user_otp_mail=rand(1000,9999);
        $user_email=$_POST["user_email"];
        $sqlCheck="SELECT * FROM user_registration WHERE user_email='{$user_email}'";
        $result=$conn->query($sqlCheck);
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc())
            {
                $user_name=$row["user_name"];
            }
            $to       = $user_email;
            $subject  = 'Speak Up Forget Password Regarding...!!';
            $message = '<html><body>';
            $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
<div style="margin:50px auto;width:70%;padding:20px 0">';
            $message .='<div style="border-bottom:1px solid #eee">';
            $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
            $message .='</div>';
            $message .='<p>Hi '.$user_name.', <br> Use the following OTP for changing the Password.</p>';
            $message .='<h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$user_otp_mail. '</h2>';
            $message .='<p style="font-size:0.9em;">Regards,<br />Speak Up, <br />Our team</p>';
            $message .='<hr style="border:none;border-top:1px solid #eee" />';
            $message .='<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">';
            $message .='<p>Speak Up</p>';
            $message .='<p>SKCET</p>';
            $message .='<p>Coimbatore</p>';
            $message .='</div>';
            $message .='</div>';
            $message .='</div>';
            $message .= '</body></html>';
            // $message  = 'Hi, this is Your One Time Password  for Forget Password';
            $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n" .
                        'Content-type: text/html; charset=utf-8';
            if(mail($to, $subject, $message, $headers)){
                echo "<script>alert('OTP for Change Password has been sent to your Email-ID');</script>";
                $sqlUpdate="UPDATE user_registration SET user_otp='{$user_otp_mail}' WHERE user_email='{$user_email}'";
                $conn->query($sqlUpdate);
            }
            else
                echo "<script>alert('Email Sent Failed');</script>";
        }
        else{
            echo "<script>alert('Sorry, Invalid Email-ID');</script>";
        }
    }
    if(isset($_POST["verify"]))
    {
        $user_email=$_POST["user_email"];
        $sqlCheck="SELECT * FROM user_registration WHERE user_email='{$user_email}'";
        $result=$conn->query($sqlCheck);
        $user_otp=$_POST["user_otp"];
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc()){
                $user_otp_db=$row["user_otp"];
            }
            if($user_otp==$user_otp_db){
                $_SESSION["user_email"]=$user_email;
                echo "<script>location.replace('forgetPassword.php');</script>";
            }
            else{
                echo "<script>alert('OTP Does not Match Please Enter the Valid OTP');</script>";
            }

        }
        else{
            echo "<script>alert('Sorry, Invalid Email-ID');</script>";
        }
    }
    ?>
</body>

</html>