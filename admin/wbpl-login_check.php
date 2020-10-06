<?php

//file konfigurasi
include '../wbpl-function.php';

/*
* Validasi khusus untuk halaman login.
*/
if (isset($_POST['Submit_Login'])) {
    session_start();
    $session = ['username'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "select * from wbpl_member
        where
        username='$username' and password='$password' ";

    $userquery = $mysqli->query($sql);

    if (mysqli_num_rows($userquery) == 1) {
        header('location:index.php');
        $valid = true;
        $_SESSION['username'] = $username;
    }

    if ($valid == false) {
        header('Location:login.php?status=1');
    }
}

/*
* Validasi khusus untuk halaman home.
*/
if (isset($_POST['Home_Submit_Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($username) == 0) {
        header('location:../index.php?&err=1');
    } elseif (strlen($password) == 0) {
        header('location:../index.php?&err=2');
    } else {
        session_start();
        $session = ['username'];

        $password = md5($password);

        $sql = "select * from wbpl_member
            where
            username='$username' and password='$password' ";

        $userquery = $mysqli->query($sql);

        if ($userquery->num_rows == 1) {
            header('location:../index.php');
            $valid = true;
            $_SESSION['username'] = $username;
        }

        if ($valid == false) {
            header('Location:../index.php?err=3');
        }
    }
} elseif (isset($_POST['Home_Submit_Regiter'])) {
    header('Location:../index.php?page=registration');
}
