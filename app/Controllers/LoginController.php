<?php

namespace App\Controllers;
use CodeIgniter\Contoller;
use App\Models\testUserModel;

class LoginController extends BaseController{

    public function index(){
        echo view("templates/header");
        echo view("user/loginView");
        echo view("templates/footer");
    }

    public function login(){
        helper(['form']);


        $validation = $this->validate([
            'username'          => 'required',
            'password'          => 'required'
        ],
        [ //error messages
            "username" => [
                "required" => "Brukernavn må oppgis"
            ],
            "password" => [
                "required" => "Passord må oppgis"
            ]
        ]
        ); 

        $model = new \App\Models\testUserModel();

        if($validation){
            $model = new \App\Models\testUserModel();

            $username = $_POST["username"];
            $password = $_POST["password"];

            $data = $model->where('username', $username)->first();
            echo "her";

            if($data){
                $hashPwd = $data["password"];
                echo "her1";

                if(password_verify($password, $hashPwd)){
                    session_start();
                    echo "her2";
                    $_SESSION["loggedon"] = true;
                    $_SESSION["id"] = $data["id"];
                    $_SESSION["user"] = $data["username"];
                    
                    //echo $data["username"];
                    return redirect()->to('/home/loggedin');

                }else{
                    $data['validation'] = $this->validator;
                    echo view("templates/header");
                    echo view("user/loginView", $data);
                    echo view("templates/footer");
                }

            }


        }else{
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view("user/loginView", $data);
            echo view("templates/footer");
        }
    }

}