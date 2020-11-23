<?php
function getLang()
{
    if(isset($_COOKIE['lang'])) {
        return $_COOKIE['lang'];
    } else {
        return App::getLocale();
    }
}

function setLang($lang = 'tr')
{
    setcookie("lang", $lang, time() + (60*60*24*7), '/', '', false, true);
}

function getPage()
{
    return Request::path();
}

function getUrl()
{
    return url()->full();
}
?>
