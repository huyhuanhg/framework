<?php

namespace app\http\controllers\admin;
use app\core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
//        echo "user controller<br/>";
    }
    public function index(){
        echo __METHOD__.'<br>';
        $this->render('index', null, 'admin/main');
    }
}