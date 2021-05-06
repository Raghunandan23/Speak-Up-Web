<?php
	if(!isset($_SESSION)){
        session_start();
    }
    session_unset();
    session_destroy();
    echo "<script>location.replace('signIn.php');</script>";
?>