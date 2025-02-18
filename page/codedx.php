<?php
    session_start();
    if(isset($_POST["logout"])) {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_role']);
        unset($_SESSION['tenkh']);
        unset($_SESSION['giohang']);

        header("Location: trangchu.php");
        exit(0);
    }
?>