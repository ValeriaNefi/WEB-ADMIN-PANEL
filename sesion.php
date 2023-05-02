<?php
    session_start();
    if($_SESSION['login']==false){ //jika belum login/tdk punya akun langsung diarahkan ke login.php
        header('location:login.php');
    }
?>