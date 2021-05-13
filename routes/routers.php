<?php
use app\core\Router;
Router::get('/', 'Home@index');
Router::get('/user', 'User@index');
Router::get('/news/{id}', function ($param){ // get list news
    echo 'this is news page<br/>';
    echo $param;
});
Router::post('/news/show', function (){
    echo 'this is news show page';
});
Router::any('*', function () {
    echo '404 not found';
});