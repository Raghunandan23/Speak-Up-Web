<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<html>

<head>
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/passwordVerification.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body style="background:#24252a;">
    <?php include ("includes/homeNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="app">
        <div class="bg">
            <form name="myform" method="post" onsubmit="return validateform()">
                <header>
                    <h1>Reset Password</h1>
                </header>
                <label for="newpassword">New Password :</label>
                <input type="password" class="form-control" name="user_newpassword" id="user_newpassword">
                <div id="user_password_error"></div><br><br><br>
                <label for="re_password">Re-type Password :</label>
                <input type="password" class="form-control" name="user_repassword" id="user_repassword">
                <div id="user_re_password_error"></div><br><br><br><br>
                <button type="submit" name="change" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>

    <script>
    function validatePassword() {
        // validating password
        var user_password_error = "";
        var user_newpassword = document.getElementById('user_newpassword');
        if (user_newpassword.value == "") {
            document.getElementById('user_password_error').innerHTML = "*Password is Required!";
            return false;
        }
        var user_password_pattern = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if ((!user_newpassword.value.match(user_password_pattern))) {
            document.getElementById('user_password_error').innerHTML =
                "*Password must contain atleast one number and one special character";
            return false;
        }
        document.getElementById('user_password_error').innerHTML = "";

        // validating re-type password
        var user_re_password_error = "";
        var user_repassword = document.getElementById('user_repassword');
        if (user_repassword.value == "") {
            document.getElementById('user_re_password_error').innerHTML = "*Re-type Password is Required!";
            return false;
        }
        document.getElementById('user_re_password_error').innerHTML = "";
    }
    </script>

    <?php
        if(isset($_POST["change"]))
        {
            $user_repassword=$_POST["user_repassword"];
            $user_newpassword=$_POST["user_newpassword"];
            if($user_repassword==$user_newpassword)
            {
                $user_email=$_SESSION["user_email"];
                $user_password=$user_newpassword;
                $sqlUpdate="UPDATE user_registration SET user_password='{$user_password}' WHERE user_email='{$user_email}'";
                if($conn->query($sqlUpdate))
                {
                    echo "<script>location.replace('success/passwordSuccess.php');</script>";
                }
                else {
                echo $conn->error;
                }
            }
            else {
                echo "<script>alert('Sorry,New Password does not match with Re-type password');</script>";
            }
        }
    ?>

</body>

</html>