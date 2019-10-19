<?php
include 'auth.php';
session_start();
function not_loggued() {
    $_SESSION['loggued_on_user'] = "";
    return ("ERROR\n");
}
if ($_GET['login'] != NULL && $_GET['passwd'] != NULL) {
    if (auth($_GET['login'], $_GET['passwd'])){
        $_SESSION['loggued_on_user'] = $_GET['login'];
        echo "OK\n";
    }
    else {
        echo not_loggued();
    }
}
else
    echo not_loggued();

?>