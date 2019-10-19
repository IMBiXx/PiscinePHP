<?php
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
if ($_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL && $_POST['submit'] == "OK" && file_exists($file))
{
    $tab["login"] = $_POST["login"];
    $tab["passwd"] = hash(whirlpool, $_POST["newpw"]);
    $oldpw = hash(whirlpool, $_POST["oldpw"]);
    $tab2[] = $tab;
    $unserialized = unserialize(file_get_contents($file));
    $i = 0;
    foreach ($unserialized as $elem)
    {
        if ($elem["login"] == $tab["login"] && $elem["passwd"] == $oldpw)
        {
            $unserialized[$i] = $tab;
            file_put_contents($file, serialize($unserialized)."\n");
            return (validate(1));
        }
        $i++;
    }
}
return (validate(0));
?>