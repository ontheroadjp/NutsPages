<?php 
    if(LaravelGettext::getLocale() === null)
    {
        $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $languages = array_reverse($languages);

        foreach ($languages as $language) {
            if (preg_match('/^ja/i', $language)) 
            {
                LaravelGettext::setLocale('ja_JP'); 
            }
            //elseif (preg_match('/^zh/i', $language)) 
            //{
            //    LaravelGettext::setLocale('en_US'); 
            //}
            //else (preg_match('/^en/i', $language)) 
            else
            {
                LaravelGettext::setLocale('en_US'); 
            }
        }
    }
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
@include('LaravelAppBase::partials.htmlheader')
@yield('body','<body><h1>Hello, Laravel AppBase</h1></body>')
</html>
