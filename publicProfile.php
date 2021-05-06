<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Public Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/publicNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>

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
    $user_password=$_SESSION["user_password"];
    $user_type="Public";

    ?>
    <div class="container">
        <form name="myform" method="post">
            <div class="sub-container">
                <div class="teams">
                    <h1>Profile</h1>
                    <img src="images/profile-male.svg" alt=""><br><br>
                    <div class="name"><i class='bx bxs-user-check'></i> <?php echo $user_type; ?></div><br>
                    <div class="name"><i class='bx bxs-user'></i> <?php echo $user_name; ?></div><br>
                    <div class="mail"><i class='bx bx-mail-send'></i> <?php echo $user_email; ?></div><br>
                    <div class="address"><i class='bx bx-current-location'></i> <?php echo $user_address; ?></div><br>
                    <div class="street"><i class='bx bx-street-view'></i> <?php echo $user_street; ?></div><br>
                    <div class="city"><i class='bx bxs-city'></i> <?php echo $user_city; ?></div><br>
                    <div class="pincode"><i class='bx bx-map-pin'></i> <?php echo $user_pincode; ?></div><br>
                    <div class="phone"><i class='bx bxs-phone'></i> <?php echo $user_phonenumber; ?></div>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>