<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="css/signIn.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include ("includes/homeNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="app">
        <div class="bg"></div>
        <form name="myform" method="post">
            <header>
                <img
                    src="https://assets.codepen.io/3931482/internal/avatars/users/default.png?format=auto&height=80&version=1592223909&width=80">
            </header>
            <div class="inputs">
                <input type="text" class="form-control" name="user_email" id="user_email" placeholder="User Email-ID"
                    autocomplete="off">
            </div><br><br><br><br>
            <div class="inputs">
                <input type="password" class="form-control" name="user_password" id="user_password"
                    placeholder="Password" autocomplete="off">
            </div>
            <p class="light"><a href="passwordVerification.php">Forget Password?</a></p><br><br>
            <button type="submit" name="submit" class="btn btn-primary">Sign In</button></button>
        </form>
        <footer>
            <p>Don't have an account?</p><a href="signUp.php">Sign Up</a></p>
        </footer>
    </div>
    </div>

    <?php
        function checkPassword($user_email,$user_password)
        {
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="speakup";
            $conn=new mysqli($servername,$username,$password,$dbname);

            $sqlCheck="SELECT * FROM user_registration WHERE user_email='{$user_email}'";
            $result=$conn->query($sqlCheck);
            if($row = $result->fetch_assoc())
            {
                $user_password_db=$row["user_password"];
                if($user_password==$user_password_db)
                    return true;
            }
            return false;
        }
        if(isset($_POST["submit"]))
        {
            $user_email=$_POST["user_email"];
            $user_password=$_POST["user_password"];
            if(checkPassword($user_email,$user_password))
            {
                $sqlCheck="SELECT * FROM user_registration WHERE user_email='{$user_email}' AND user_password='{$user_password}'";
                $result=$conn->query($sqlCheck);
                if($result->num_rows >0){

                    while($row = $result->fetch_assoc())
                    {
                        $user_name=$row["user_name"];
                        $user_gender=$row["user_gender"];
                        $user_address=$row["user_address"];
                        $user_street=$row["user_street"];
                        $user_city=$row["user_city"];
                        $user_pincode=$row["user_pincode"];
                        $user_phonenumber=$row["user_phonenumber"];
                        $user_type=$row["user_type"];
                        $user_proof=$row["user_proof"];
                        $user_password=$row["user_password"];
                    }

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

                    echo "<script>location.replace('success/signInSuccess.php');</script>";
                    
                }
            }
            else{
                echo "<script>alert('Sorry, Invalid Email or Password');</script>";
            }
        }
    ?>
</body>

</html>