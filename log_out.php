<?php
session_start();
    if ($_SESSION['vkhod'] == 1) {
        session_destroy(); 
        header('location: login.php');
    }
?>