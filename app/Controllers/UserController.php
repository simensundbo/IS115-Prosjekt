<?php

namespace App\Controllers;


class UserController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';
        echo view("templates/header", $data);
        echo view("user/loginView");
        echo view("templates/footer");
    }

    public function login()
    {
        
        $username = $_POST["uname"];
        $pwd = $_POST["pwd"];
        $model = new \App\Models\UserModel();
        $result = $model->login($username, $pwd);

        $data['user'] = $result;
        echo view("templates/header");
        echo view("home/index", $data);
        echo view("templates/footer");
    }

    public function registerView()
    {
        echo view("templates/header");
        echo view("user/registerView");
        echo view("templates/footer");
    }

    public function register()
    {
        $username = $_POST["uname"];
        $pwd = $_POST["pwd"];
        $pwdRepeat =$_POST["pwdRepeat"];

        $model = new \App\Models\UserModel();

        $result = $model->register($username, $pwd , $pwdRepeat);

        if($result == true){
            echo view("templates/header");
            echo view("user/loginView");
            echo view("templates/footer");
        }else{
            $data['error'] = $result;
            echo view("templates/header");
            echo view("user/registerView", $data);
            echo view("templates/footer");
        }
    }

    
}