<?php

//echo dirname(__DIR__);
//echo "<br/>";
//echo $_SERVER['DOCUMENT_ROOT'] . "<br/>";
//$folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__);
//
//echo $folder;
function webRoot()
{
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $webRoot = 'https://' . $_SERVER['HTTP_HOST'];
    } else {
        $webRoot = 'http://' . $_SERVER['HTTP_HOST'];
    }
    $folder = str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR_PUBLIC__);
    return $webRoot . $folder;
}

return [
    '__BASE_PATH__' => str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR_PUBLIC__),
    "__DIR_ROOT__" => dirname(__DIR__),
    '__WEB_ROOT__' => webRoot(),
    '__NSP_CTRL__'=>'app\http\controllers',
    '__NSP_ADMIN_CTRL__'=>'app\http\controllers\admin',
    'layouts' => 'layouts/main',
    "fileDefault" => [
        'routes/routers.php'
    ]
];