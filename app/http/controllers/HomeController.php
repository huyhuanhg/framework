<?php


namespace app\http\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        echo "home controller<br>";
    }
    public function index(){
        echo __METHOD__;
    }
}