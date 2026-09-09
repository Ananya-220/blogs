<?php
session_start();
if (isset($_POST["logout"])) {
    if (isset($_SESSION['email'])){
        unset($_SESSION['email']);
        header("Location: login.php");
    }
}
else{
    header("Location: login.php");
}
?>