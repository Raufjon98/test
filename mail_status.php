<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}

if (isset($_POST['id_delete'])) {
    $mails=$_POST['id_delete'];
    foreach ($mails as $mail) {
        $nat = $conn->query("Update letter set document_status=0 WHERE unical='" . $mail . "'");
    }
}
if (isset($_POST['id_important'])) {
    $mails=$_POST['id_important'];
    foreach ($mails as $mail){
        $nat = $conn->query("Update letter set document_status=2 WHERE unical='" .$mail . "'");
    }
}
if (isset($_POST['id_not_important'])) {
    $mails=$_POST['id_not_important'];
    foreach ($mails as $mail){
        $nat = $conn->query("Update letter set document_status=1 WHERE unical='" . $mail . "'");
    }
}
?>

