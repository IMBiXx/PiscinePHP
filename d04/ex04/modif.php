<?php
header("Location: index.html");
function validate($rep) {
    $SUCCESS = "OK\n";
    $ERROR = "ERROR\n";
    if ($rep === 1)
        echo $SUCCESS;
    else
        echo $ERROR;
}
$path = "../private/";
$file = $path."passwd";
if ($_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL && $_POST['submit'] == "OK"){
    $passwd = unserialize(file_get_contents($file));
    if ($passwd)
        foreach ($passwd as &$elem){
            if ($elem['login'] == $_POST['login']){
                if ($elem['passwd'] != hash('whirlpool', $_POST['oldpw']))
                    return (validate(0));
                else
                    $elem['passwd'] = hash('whirlpool', $_POST['newpw']);
                }
            }
    file_put_contents($file, serialize($passwd));
    return (validate(1));
}
else
    return (validate(0));
?>