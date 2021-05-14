<?php


namespace app\http\controllers;
use app\core\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        echo __METHOD__.'<br>';
//        $this->renderPartial('test');
        $this->render('index');
    }
}
