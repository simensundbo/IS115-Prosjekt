<?php

namespace App\Controllers;

class UserController extends BaseController
{

    public function loginView()
    {
        echo view("templates/header");
        echo view('user/loginView');
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


        if($validation){
            $model = new \App\Models\UserModel();

            $username = $_POST["username"];
            $password = $_POST["password"];

            $data = $model->where('username', $username)->first();

            if($data){
                $hashPwd = $data["password"];

                if(password_verify($password, $hashPwd)){
                    $session_data = [
                        "loggedon" => true,
                        "id" => $data["id"],
                        "user" => $data["username"]
                    ];
                    $session = session();
                    $session->set($session_data);
                    return redirect()->to('dashboard');

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

    public function registerView(){
        echo view("templates/header");
        echo view('user/registerView');
        echo view("templates/footer");

    }

    public function registrer(){
        helper(['form']);

        $validation = $this->validate([
            'username'          => 'required|min_length[2]|max_length[50]|is_unique[users.username]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmpassword'   => 'matches[password]',
            'EmployeeNumber'    =>  'required'
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

            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('user/registerView', $data);
            echo view("templates/footer");
        }

    }

    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to('/');

    }

}