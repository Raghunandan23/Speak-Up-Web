<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>

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

    echo $user_name."<br>";
    echo $user_email."<br>";
    echo $user_gender."<br>";
    echo $user_address."<br>";
    echo $user_street."<br>";
    echo $user_city."<br>";
    echo $user_pincode."<br>";
    echo $user_phonenumber."<br>";
    echo $user_proof."<br>";
    echo $user_password."<br>";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="logout.php">Logout</a>
</body>
</html>