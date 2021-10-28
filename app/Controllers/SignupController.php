<?php

namespace App\Controllers;
use CodeIgniter\Contoller;
use App\Models\testUserModel;

class SignupController extends BaseController{

    public function index(){

        echo view("templates/header");
        echo view("user/registerView");
        echo view("templates/footer");
    }

    public function register(){
        helper(['form']);

        $validation = $this->validate([
            'username'          => 'required|min_length[2]|max_length[50]|is_unique[users.username]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmpassword'   => 'matches[password]'
        ],
        [ //error messages
            "username" => [
                "required" => "Brukernavn må oppgis",
                "is_unique" => "Brukernavnet er allerede i bruk. Brukernavnet må være unikt", 
                "min_length" => "Brukernavnet må minst være {param} karakterer langt", 
                "max_length" => "Brukernavnet kan ikke være lengre enn {param} karakterer"
            ],
            "password" => [
                "required" => "Passord må oppgis",
                "min_length" => "Passordet må minst være {param} karakterer langt", 
                "max_length" => "Passordet kan ikke være lengre enn {param} karakterer"
            ],
            "confirmpassword" => [
                "matches" => "Passordene må være like"
            ]
        ]
        ); 
        
        if($validation){
            $model = new \App\Models\UserModel();

            $data = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) 
            ];

            $model->save($data);

        
            return redirect()->to('home/users');
        }else{
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('user/registerView', $data);
            echo view("templates/footer");
        }
    }
}