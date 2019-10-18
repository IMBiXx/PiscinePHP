<?php 
function auth($login, $passwd) {
$path = "../private/";
$file = $path."passwd";
if (isset($login) && $login != NULL && isset($passwd) && $passwd != NULL){
    $op = unserialize(file_get_contents($file));
    if ($op)
        foreach ($op as &$elem){
            if ($elem['login'] == $login){
                if ($elem['passwd'] == hash('whirlpool', $passwd))
                    return (TRUE);
                else
                    return (FALSE);
            }
        }
    }
return (FALSE);
}
?>