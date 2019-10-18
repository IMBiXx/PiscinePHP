<?php
// session_start();
// if (isset($_POST['login']) && $_POST['login'] != NULL && isset($_POST['passwd']) && $_POST['passwd'] != NULL && isset($_POST['submit']) && $_POST['submit'] == "OK") {
//     $_SESSION['login'] = $_POST['login'];
//     $_SESSION['passwd'] = $_POST['passwd'];
// }
if (isset($_POST['login']) && $_POST['login'] != NULL && isset($_POST['passwd']) && $_POST['passwd'] != NULL && isset($_POST['submit']) && $_POST['submit'] == "OK"){
    $path = "private/";
    $file = "passwd";
    if (!file_exists($path)){
        mkdir($path);
        file_put_contents($path.$file, "");
    }
    if (file_exists($path.$file)){
        $tab = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']));
        print_r($tab);
        file_put_contents($path.$file, serialize($tab)."\n", FILE_APPEND);
    }
    echo "OK\n";
}
else
    echo "ERROR\n";
?>