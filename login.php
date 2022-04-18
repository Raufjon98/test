<?php
session_start();
if (isset($_POST['login']) && ($_POST['password'])) {

    include 'conn.php';
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $str="SELECT * FROM users_tmp WHERE login='$login' and password='$password'";
    $nat = $conn->query($str);
    if ($nat->num_rows > 0) {
        $row = mysqli_fetch_assoc($nat);
        $_SESSION['status'] = $row['status'];
        $_SESSION['fio'] = $row['fio'];
        $_SESSION['user_id']= $row['user_id'];
        $_SESSION['vkhod'] = 1;
        header('location: index.php');
    } 
    else 
    {
        echo "Логин ё рамз хато ворид карда шуд!";
    }
} 
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DPDTT | Mailbox</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Хуш омадед ба системаи иттилоотии ДПДТТ!</h3>
        <p>Логин ва рамзи худро ворид созед!</p>
        <form method="post">
            <div class="form-group">
                <input type="text" name="login" class="form-control" placeholder="Login" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Воридшавӣ</button>
        </form>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>



