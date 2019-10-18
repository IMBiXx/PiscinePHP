<?php
session_start();
$path = "../private/";
$filechat = $path."chat";
if ($_SESSION['loggued_on_user']) {
    echo '<form method="post" action="speak.php" style="margin-block-end: 0"><input style="width:100%; height:100%;" type="text" name="msg"></form>';
    if (!file_exists($path))
        mkdir($path);
    if (!file_exists($filechat))
        file_put_contents($filechat, null);
    else
        $chat = unserialize(file_get_contents($filechat));
    if ($_POST['msg']){
    $chat[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "chat" => $_POST['msg']);
    file_put_contents($filechat, serialize($chat));
}
}
?>