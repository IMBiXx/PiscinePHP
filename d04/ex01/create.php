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
if ($_POST['login'] != NULL && $_POST['passwd'] != NULL && $_POST['submit'] == "OK"){
    $tab["login"] = $_POST["login"];
    $tab["passwd"] = hash(whirlpool, $_POST["passwd"]);
    $tab2[] = $tab;
    if (!file_exists($path))
        mkpath($path);
    if (!file_exists($file))
        file_put_contents($file, serialize($tab2)."\n");
    else
    {
        $unserialized = unserialize(file_get_contents($file));
        $i = 0;
        foreach ($unserialized as $elem)
        {
            foreach($elem as $login=>$value)
                if ($value == $tab["login"])
                    return (validate(0));
            $i++;
        }
        $unserialized[$i] = $tab;
        file_put_contents($file, serialize($unserialized)."\n");
    }
    return (validate(1));
}
else
    return (validate(0));
?>