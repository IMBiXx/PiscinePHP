<?php
include 'auth.php';
session_start();
function not_loggued() {
    $_SESSION['loggued_on_user'] = "";
    return ("ERROR\n");
}

function loggued() {
    echo '<center><iframe name="chat" src="chat.php" width="550px" style="display:block; border:2px solid lightblue;"></iframe><iframe name="speak" src="speak.php" width="550px" height="50px" style="border:2px solid lightblue"></iframe></center>';
}
if (isset($_POST['login']) && $_POST['login'] != NULL && isset($_POST['passwd']) && $_POST['passwd'] != NULL) {
    if (auth($_POST['login'], $_POST['passwd'])){
        $_SESSION['loggued_on_user'] = $_POST['login'];
            loggued();
    }
    else {
        echo not_loggued();
    }
}
else
    echo not_loggued();

?>