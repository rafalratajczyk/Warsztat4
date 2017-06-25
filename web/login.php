<?php

    session_start();

    //include('../datas/users_array.php');
    require_once ('../src/User.php');
    require_once ('../web/config.php');

    $login = $_POST['login'];
    $passwd = $_POST['password'];
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($login) && trim($login) != '' && isset($passwd) && trim($passwd) != '') {
            $user = new User();
            $_SESSION['msg'] = $user->login($conn, $login, $passwd);
            header("Location:index.php");
        } else {
            $_SESSION['msg'] = 'Wszystkie pola muszą być wypełnione';
            header("Location:index.php");
        }
    }

?>


