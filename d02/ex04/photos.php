#!/usr/bin/php
<?php
if ($argc > 1)
    if ($content = @file_get_contents($argv[1]))
    {
        $src = parse_url($argv[1]);
        if (!file_exists($src['host']))
            mkdir($src['host']);
        $result = array();
        preg_match_all("/(<img src=\")(.*?)(\")/", $content, $result);
        foreach ($result[2] as $link)
            if ($link)
            {
                $img = parse_url($link);
                if (isset($img["scheme"]) && isset($img["host"]))
                    $srcfile= $link;
                else
                    $srcfile = $src['scheme']."://".$src['host'].$link;
                $path = pathinfo($link);
                $destfile  = $src['host']."/".$path['filename'];
                if (isset($path['extension']))
                    $destfile = $destfile.".".$path['extension'];
                if (preg_match("/.jpg$|.jpeg$|.diff$|.gif$|.tiff$|.png$/i", $srcfile))
                    copy($srcfile, $destfile);
            }
    }
?>