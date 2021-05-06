<?php
    // For Development Part
    // $servername="localhost";
    // $username="root";
    // $password="";
    // $dbname="speakup";

    // Remote SQL Database
    $servername="remotemysql.com";
    $username="qxfSMOEOar";
    $password="HtH2Wyctyn";
    $dbname="qxfSMOEOar";

    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    	die("Connection Failed: ".$conn->connect_error);
?>