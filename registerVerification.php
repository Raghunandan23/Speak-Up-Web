<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<html>

<head>
    <title>Registration Verification</title>
    <link rel="stylesheet" href="css/signIn.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");

body {
    font-family: "Montserrat", sans-serif;
}

body::-webkit-scrollbar {
    width: 1em;
}

body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px #24252a;
}

body::-webkit-scrollbar-thumb {
    background-color: #24252a;
    outline: 1px solid #24252a;
}

h1,
label,
input[type='radio'] {
    color: white;
}

.form-group {
    color: white;
}

a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}
</style>

<body style="background: #24252a;">
    <?php include ("includes/homeNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="app">
        <div class="bg"></div>
        <form name="myform" method="post">
            <header>
                <img
                    src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
                <h1>Verification</h1>
            </header><br><br>
            <div class="inputs">
                <h3>Please Enter your OTP</h3>
                <input type="text" class="form-control" name="user_otp" id="user_otp" placeholder="Enter OTP"
                    autocomplete="off">
            </div><br><br><br><br>
            <button type="submit" name="verify" class="btn btn-primary">Verify</button></button>
        </form>
        <footer>
        </footer>
    </div>
    </div>
</body>

<?php

    $user_name=$_SESSION["user_name"];
    $user_email=$_SESSION["user_email"];
    $user_gender=$_SESSION["user_gender"];
    $user_address=$_SESSION["user_address"];
    $user_street=$_SESSION["user_street"];
    $user_city=$_SESSION["user_city"];
    $user_pincode=$_SESSION["user_pincode"];
    $user_phonenumber=$_SESSION["user_phonenumber"];
    $user_proof=$_SESSION["user_proof"];
    $user_type=$_SESSION["user_type"];
    $user_password=$_SESSION["user_password"];
    $user_otp_mail=$_SESSION["user_otp"];

    $_SESSION["user_name"]=$user_name;
    $_SESSION["user_email"]=$user_email;
    $_SESSION["user_gender"]=$user_gender;
    $_SESSION["user_address"]=$user_address;
    $_SESSION["user_street"]=$user_street;
    $_SESSION["user_city"]=$user_city;
    $_SESSION["user_pincode"]=$user_pincode;
    $_SESSION["user_phonenumber"]=$user_phonenumber;
    $_SESSION["user_proof"]=$user_proof;
    $_SESSION["user_type"]=$user_type;
    $_SESSION["user_password"]=$user_password;

    if(isset($_POST["verify"]))
    {
        $user_otp=$_POST["user_otp"];
        if($user_otp==$user_otp_mail)
        {
            $sqlInsert="INSERT INTO user_registration(user_name,user_email,user_gender,user_address,user_street,user_city,user_pincode,user_phonenumber,user_type,user_proof,user_password,user_otp) VALUES ('{$user_name}','{$user_email}','{$user_gender}','{$user_address}','{$user_street}','{$user_city}','{$user_pincode}','{$user_phonenumber}','{$user_type}','{$user_proof}','{$user_password}',{$user_otp})";

            if($conn->query($sqlInsert))
            {

                $to       = $user_email;
                $subject  = 'Speak Up Registration Regarding...!!';
                $message = '<html><body>';
                $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">';
                $message .='<div style="border-bottom:1px solid #eee">';
                $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
                $message .='</div>';
                $message .='<p style="font-size:1.1em">Hi,</p>';
                $message .='<p>Thank you! '.$user_name.' for registering on our website. Your account has been created successfully!</p>';
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
                $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n" .
                            'Content-type: text/html; charset=utf-8';
            
                if(mail($to, $subject, $message, $headers))
                    echo "<script>location.replace('success/signUpSuccess.php');</script>";
                else
                    echo "<script>alert('Email Sent Failed');</script>";
            }
            else {
            echo $conn->error;
            }
        }
        else
        {
            echo "<script>alert('OTP Does not Match Please Enter the Valid OTP');</script>";
        }
    }
?>

</html>