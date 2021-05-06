<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Government Update Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/governmentNavbar.php"); ?>
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

    ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Profile</h1>
            <form name="myform" method="post" onsubmit="return validateform()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_name">Name :</label>
                        <input type="text" class="form-control" name="user_name" value='<?php echo $user_name; ?>'
                            id="user_name" onclick="hide()">
                        <div id="user_name_error"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_email">Email-ID :</label>
                        <input type="text" class="form-control" name="user_email" value='<?php echo $user_email; ?>'
                            id="user_email" readonly="readonly">
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="user_address">Address :</label>
                    <input type="text" class="form-control" name="user_address" value='<?php echo $user_address; ?>'
                        id="user_address">
                    <div id="user_address_error"></div>
                </div><br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_street">Street :</label>
                        <input type="text" class="form-control" name="user_street" value='<?php echo $user_street; ?>'
                            id="user_street">
                        <div id="user_street_error"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_city">City :</label>
                        <input type="text" class="form-control" name="user_city" value='<?php echo $user_city; ?>'
                            id="user_city">
                        <div id="user_city_error"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="user_pincode">Pincode :</label>
                        <input type="text" class="form-control" name="user_pincode" value='<?php echo $user_pincode; ?>'
                            id="user_pincode">
                        <div id="user_pincode_error"></div>
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="user_phonenumber">Phone Number :</label>
                        <input type="number" class="form-control" name="user_phonenumber"
                            value='<?php echo $user_phonenumber; ?>' id="user_phonenumber">
                        <div id="user_phonenumber_error"></div>
                    </div>
                </div><br>
                <button type="submit" name="user_save" id="user_save" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
    <script>
    function validateform() {
        // validating name
        var user_name_error = "";
        var user_name = document.getElementById('user_name');
        if (user_name.value == "") {
            document.getElementById('user_name_error').innerHTML = "*Name is Required!";
            return false;
        }
        var user_name_pattern = /^[A-Za-z ]+$/;
        if ((!user_name.value.match(user_name_pattern))) {
            document.getElementById('user_name_error').innerHTML =
                "*Name must contain only alphabets";
            return false;
        }
        document.getElementById('user_name_error').innerHTML = "";

        // validating address
        var user_address_error = "";
        var user_address = document.getElementById('user_address');
        if (user_address.value == "") {
            document.getElementById('user_address_error').innerHTML = "*Address is Required!";
            return false;
        }
        var user_address_pattern = /^[a-zA-Z0-9\s,'-/]*$/;
        if ((!user_address.value.match(user_address_pattern))) {
            document.getElementById('user_address_error').innerHTML =
                "*Invalid Address";
            return false;
        }
        document.getElementById('user_address_error').innerHTML = "";

        // validating street
        var user_street_error = "";
        var user_street = document.getElementById('user_street');
        if (user_street.value == "") {
            document.getElementById('user_street_error').innerHTML = "*Street is Required!";
            return false;
        }
        var user_street_pattern = /^[A-Za-z ]+$/;
        if ((!user_street.value.match(user_street_pattern))) {
            document.getElementById('user_street_error').innerHTML =
                "*Street name must contain only alphabets";
            return false;
        }
        document.getElementById('user_street_error').innerHTML = "";

        // validating city
        var user_city_error = "";
        var user_city = document.getElementById('user_city');
        if (user_city.value == "") {
            document.getElementById('user_city_error').innerHTML = "*City is Required!";
            return false;
        }
        var user_city_pattern = /^[A-Za-z ]+$/;
        if ((!user_city.value.match(user_city_pattern))) {
            document.getElementById('user_city_error').innerHTML =
                "*City name must contain only alphabets";
            return false;
        }
        document.getElementById('user_city_error').innerHTML = "";

        // validating pincode
        var user_pincode_error = "";
        var user_pincode = document.getElementById('user_pincode');
        if (user_pincode.value == "") {
            document.getElementById('user_pincode_error').innerHTML = "*Pincode is Required!";
            return false;
        }
        var user_pincode_pattern = /^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/;
        if ((!user_pincode.value.match(user_pincode_pattern))) {
            document.getElementById('user_pincode_error').innerHTML =
                "*Invalid Pincode";
            return false;
        }
        document.getElementById('user_pincode_error').innerHTML = "";

        // validating phonenumber
        var user_phonenumber_error = "";
        var user_phonenumber = document.getElementById('user_phonenumber');
        if (user_phonenumber.value == "") {
            document.getElementById('user_phonenumber_error').innerHTML = "*Phonenumber is Required!";
            return false;
        }
        var user_phonenumber_pattern = /^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
        if ((!user_phonenumber.value.match(user_phonenumber_pattern))) {
            document.getElementById('user_phonenumber_error').innerHTML =
                "*Invalid Phonenumber";
            return false;
        }
        document.getElementById('user_phonenumber_error').innerHTML = "";
    }
    </script>
    <?php
        if(isset($_POST["user_save"]))
        {
            $user_name=$_POST["user_name"];
            $user_address=$_POST["user_address"];
            $user_street=$_POST["user_street"];
            $user_city=$_POST["user_city"];
            $user_pincode=$_POST["user_pincode"];
            $user_phonenumber=$_POST["user_phonenumber"];

            $sqlUpdate="UPDATE user_registration SET user_name='{$user_name}',user_address='{$user_address}',user_street='{$user_street}',user_city='{$user_city}',user_pincode='{$user_pincode}',user_phonenumber='{$user_phonenumber}' WHERE user_email='{$user_email}'";

            if($conn->query($sqlUpdate))
            {

                $_SESSION["user_name"]=$user_name;
                $_SESSION["user_address"]=$user_address;
                $_SESSION["user_street"]=$user_street;
                $_SESSION["user_city"]=$user_city;
                $_SESSION["user_pincode"]=$user_pincode;
                $_SESSION["user_phonenumber"]=$user_phonenumber;
    
                echo "<script>location.replace('governmentProfile.php');</script>";
            }
            else {
            echo $conn->error;
            }
        }
    ?>
</body>

</html>