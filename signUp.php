<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
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
    <br><br>
    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Sign Up</h1>
            <form name="myform" method="post" onsubmit="return validateform()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_name">Name :</label>
                        <input type="text" class="form-control" name="user_name" id="user_name">
                        <div id="user_name_error"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_email">Email-ID :</label>
                        <input type="text" class="form-control" name="user_email" id="user_email">
                        <div id="user_email_error"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_gender">Gender :</label><br>
                    <input type="radio" name="user_gender" value="male"> Male<br>
                    <input type="radio" name="user_gender" value="female"> Female<br>
                    <input type="radio" name="user_gender" value="other"> Other
                    <div id="user_gender_error"></div>
                </div>
                <div class="form-group">
                    <label for="user_address">Address :</label>
                    <input type="text" class="form-control" name="user_address" id="user_address">
                    <div id="user_address_error"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="user_street">Street :</label>
                        <input type="text" class="form-control" name="user_street" id="user_street">
                        <div id="user_street_error"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_city">City :</label>
                        <input type="text" class="form-control" name="user_city" id="user_city">
                        <div id="user_city_error"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_pincode">Pincode :</label>
                        <input type="text" class="form-control" name="user_pincode" id="user_pincode">
                        <div id="user_pincode_error"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_phonenumber">Phone Number :</label>
                    <input type="text" class="form-control" name="user_phonenumber" id="user_phonenumber">
                    <div id="user_phonenumber_error"></div>
                </div>
                <div class="form-group">
                    <label for="registeras">Register as :</label>
                    <select class="form-control" name="registeras" id="registeras">
                        <option value="Choose">Choose</option>
                        <option value="public">Public</option>
                        <option value="govt_servant">Government Servant</option>
                        <option value="errand">Errand Runner</option>
                    </select>
                    <div id="user_registeras_error"></div>
                </div>
                <div class="public box">
                    <label for="user_aadharnumber">Aadhar Number :</label>
                    <input type="text" class="form-control" name="user_aadharnumber" id="user_aadharnumber">
                    <div id="user_aadharnumber_error" style=" color: white;"></div>
                </div>
                <div class="govt_servant box">
                    <label for="user_governmentid">Government ID :</label>
                    <input type="text" class="form-control" name="user_governmentid" id="user_governmentid">
                    <div id="user_governmentid_error"></div>
                </div>
                <div class="errand box">
                    <label for="user_errandproof">Aadhar Number :</label>
                    <input type="text" class="form-control" name="user_errandproof" id="user_errandproof">
                    <div id="user_errandproof_error"></div>
                </div>
                <div class="form-group">
                    <label for="user_password">Password :</label>
                    <input type="password" class="form-control" name="user_password" id="user_password">
                    <div id="user_password_error"></div>
                </div>
                <div class="form-group">
                    <label for="user_re_password">Re-type Password :</label>
                    <input type="password" class="form-control" name="user_re_password" id="user_re_password">
                    <div id="user_re_password_error"></div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
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

        // validating email-id
        var user_email_error = "";
        var user_email = document.getElementById('user_email');
        if (user_email.value == "") {
            document.getElementById('user_email_error').innerHTML = "*Email is Required!";
            return false;
        }
        var user_email_pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if ((!user_email.value.match(user_email_pattern))) {
            document.getElementById('user_email_error').innerHTML =
                "*Invalid E-mail ID";
            return false;
        }
        document.getElementById('user_email_error').innerHTML = "";

        // validating gender
        var user_gender_error = "";
        var user_gender = document.querySelectorAll('input[name="user_gender"]:checked');
        if (!user_gender.length) {
            document.getElementById('user_gender_error').innerHTML = "*Please select your gender";
            return false;
        }
        document.getElementById('user_gender_error').innerHTML = "";

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

        // validating select register as
        var user_registeras_error = "";
        if (document.getElementById('registeras').value == "Choose") {
            document.getElementById('user_registeras_error').innerHTML = "*Please Select user type";
            return false;
        }
        document.getElementById('user_registeras_error').innerHTML = "";


        // validating public-aadhar number
        if ($('#registeras').val() == "public") {
            var user_aadharnumber_error = "";
            if ($('input[name=user_aadharnumber]').val() == "") {
                document.getElementById('user_aadharnumber_error').innerHTML = "*Aadharnumber is Required!";
                return false;
            }
            var user_aadharnumber_pattern = /^\d{4}\s\d{4}\s\d{4}$/;
            if ((!($('input[name=user_aadharnumber]')).val().match(user_aadharnumber_pattern))) {
                document.getElementById('user_aadharnumber_error').innerHTML =
                    "*Invalid Aadharnumber Please enter in format xxxx xxxx xxxx";
                return false;
            }
            document.getElementById('user_aadharnumber_error').innerHTML = "";
        }

        // validating government id
        if ($('#registeras').val() == "govt_servant") {
            var user_governmentid_error = "";
            if ($('input[name=user_governmentid]').val() == "") {
                document.getElementById('user_governmentid_error').innerHTML = "*Government ID is Required!";
                return false;
            }
            var user_governmentid_pattern = /^[1-9]{1}[0-9]{2}\s{0,1}[0-9]{3}$/;
            if ((!($('input[name=user_governmentid]')).val().match(user_governmentid_pattern))) {
                document.getElementById('user_governmentid_error').innerHTML =
                    "*Invalid Government ID Please enter in format xxx xxx";
                return false;
            }
            document.getElementById('user_governmentid_error').innerHTML = "";
        }

        // validating errand-aadhar number
        if ($('#registeras').val() == "errand") {
            var user_aadharnumber_error = "";
            if ($('input[name=user_errandproof]').val() == "") {
                document.getElementById('user_errandproof_error').innerHTML = "*Aadharnumber is Required!";
                return false;
            }
            var user_aadharnumber_pattern = /^\d{4}\s\d{4}\s\d{4}$/;
            if ((!($('input[name=user_errandproof]')).val().match(user_aadharnumber_pattern))) {
                document.getElementById('user_errandproof_error').innerHTML =
                    "*Invalid Aadharnumber Please enter in format xxxx xxxx xxxx";
                return false;
            }
            document.getElementById('user_errandproof_error').innerHTML = "";
        }

        // validating password
        var user_password_error = "";
        var user_password = document.getElementById('user_password');
        if (user_password.value == "") {
            document.getElementById('user_password_error').innerHTML = "*Password is Required!";
            return false;
        }
        var user_password_pattern = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if ((!user_password.value.match(user_password_pattern))) {
            document.getElementById('user_password_error').innerHTML =
                "*Password must contain atleast one number and one special character";
            return false;
        }
        document.getElementById('user_password_error').innerHTML = "";

        // validating re-type password
        var user_re_password_error = "";
        var user_re_password = document.getElementById('user_re_password');
        if (user_re_password.value == "") {
            document.getElementById('user_re_password_error').innerHTML = "*Re-type Password is Required!";
            return false;
        }
        document.getElementById('user_re_password_error').innerHTML = "";
    }

    // register as select
    $(document).ready(function() {
        $("select").change(function() {
            $(this).find("option:selected").each(function() {
                if ($(this).attr("value") == "public") {
                    $(".box").not(".public").hide();
                    $(".public").show();
                    $(".box").not(".public").val("");
                } else if ($(this).attr("value") == "govt_servant") {
                    $(".box").not(".govt_servant").hide();
                    $(".govt_servant").show();
                    $(".box").not(".govt_servant").val("");
                } else if ($(this).attr("value") == "errand") {
                    $(".box").not(".errand").hide();
                    $(".errand").show();
                    $(".box").not(".errand").val("");
                } else {
                    $(".box").hide();
                }
            });
        }).change();
    });
    </script>

    <?php
        if(isset($_POST["submit"]))
        {
            $user_name=$_POST["user_name"];
            $user_email=$_POST["user_email"];
            $user_gender=$_POST["user_gender"];
            $user_address=$_POST["user_address"];
            $user_street=$_POST["user_street"];
            $user_city=$_POST["user_city"];
            $user_pincode=$_POST["user_pincode"];
            $user_phonenumber=$_POST["user_phonenumber"];
            $user_type=$_POST["registeras"];
            $user_aadharnumber=$_POST["user_aadharnumber"];
            $user_governmentid=$_POST["user_governmentid"];
            $user_proof=$user_governmentid.$user_aadharnumber;
            $user_password=$_POST["user_password"];
            $user_re_password=$_POST["user_re_password"];
            if(empty($user_name))
            {
                echo "username cannot be empty";
            }
            if($user_password==$user_re_password)
            {
                $sqlCheck="SELECT * FROM user_registration WHERE user_email='{$user_email}'";
                $result=$conn->query($sqlCheck);
                if($result->num_rows >0)
                {
                    echo "<script>alert('User Email Id Already Exists');</script>";
                    echo "<script>location.replace('signUp.php');</script>";
                }
                else
                {
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
                    $user_otp=rand(1000,9999);
                    $_SESSION["user_otp"]=$user_otp;
                    $to       = $user_email;
                    $subject  = 'Speak Up Registration Regarding...!!';
                    $message = '<html><body>';
                    $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">';
                    $message .='<div style="border-bottom:1px solid #eee">';
                    $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
                    $message .='</div>';
                    $message .='<p style="font-size:1.1em">Hi,</p>';
                    $message .='<p>Thank you! '.$user_name.' for registering on our website. Use the following OTP to complete your Sign Up procedures.</p>';
                    $message .='<h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">'.$user_otp.'</h2>';
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
                    $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
                    if(mail($to, $subject, $message, $headers))
                    {
                        echo "<script>alert('Otp sent to registered mail id');</script>";
                        echo "<script>location.replace('registerVerification.php');</script>";
                    }
                    else
                        echo "<script>alert('Email Sent Failed');</script>";
                }
            }
            else {
                echo "<script>alert('Sorry, Password does not match with Confirm password');</script>";
            }
        }
    ?>

</body>

</html>