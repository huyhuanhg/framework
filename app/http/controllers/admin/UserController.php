<?php

namespace app\http\controllers\admin;
use app\core\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        echo "user controller<br/>";
    }
    public function index(){
        echo __METHOD__;
    }
}