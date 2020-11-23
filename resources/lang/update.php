<?php
if(isset($_GET['filename']) AND isset($_GET['key']) AND isset($_GET['value']) AND isset($_GET['lang'])) {
    $fName = $_GET['filename'];
    $key = $_GET['key'];
    $value = $_GET['value'];
    $lang = $_GET['lang'];

    $include = $lang.'/'.$fName;
    $gelenler = include $include;

    foreach ($gelenler as $item=>$value1) {
        if($item==$key) {
            $bulunan = $value1;
        }
    }
    if(!isset($bulunan)) {
        echo 2;
        die();
    }



    if(file_put_contents($include,str_replace($bulunan,$value,file_get_contents($include)))) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
