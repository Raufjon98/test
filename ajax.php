<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');}
if (isset($_GET["id_this"])) {
	$nat = $conn->query("SELECT (SELECT get_fio(user_id)) user_name FROM group_members WHERE group_id = '" . $_GET["id_this"] . "'");
	$arr=array();
   while( $row=mysqli_fetch_assoc($nat)){
       array_push($arr,$row);
   }
    echo json_encode($arr);
}
if (isset($_GET["group_id"])) {
    $nat = $conn->query("SELECT (SELECT get_fio(user_id)) user_name FROM group_members WHERE group_id = '" . $_GET["group_id"] . "'");
    $arr=array();
    while( $row=mysqli_fetch_assoc($nat)){
        array_push($arr,$row);
    }
    echo json_encode($arr);
}
if (isset($_GET['g_id'])){
    $query="SELECT get_groupname (".$_GET['g_id'].") g_name";
    $nat1=$conn->query ($query);
    $row1=mysqli_fetch_assoc($nat1);
    echo json_encode($row1);


}
?>





