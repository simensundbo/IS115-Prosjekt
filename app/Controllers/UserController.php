<?php

namespace App\Controllers;

class UserController extends BaseController
{

    //viser innloggings view et
    public function loginView()
    {
        //printer ut views
        echo view("templates/header");
        echo view('user/loginView');
        echo view("templates/footer");
    }


    //funksjonen som sjekker passord og brukernavn
    public function login()
    {
        helper(['form']);

        //validering at begge feltene er fylt inn
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

        //true, begge felt fylt inn
        if($validation){
            
            //initialiserer modellen
            $model = new \App\Models\UserModel();

            //henter data fylt inn i formet
            $username = $_POST["username"];
            $password = $_POST["password"];

            $data = $model->where('username', $username)->first();

            if($data){
                $hashPwd = $data["password"];

                //verifisering av passord mot hashet passord i db, true
                if(password_verify($password, $hashPwd)){
                    //lager en session
                    $session_data = [
                        "loggedon" => true,
                        "id" => $data["id"],
                        "user" => $data["username"]
                    ];
                    $session = session();
                    $session->set($session_data);
                    //sender bruker videre til dashboard
                    return redirect()->to('dashboard');

                }else{
                    $data['validation'] = $this->validator;
                    //printer ut views
                    echo view("templates/header");
                    echo view("user/loginView", $data);
                    echo view("templates/footer");
                }

            }


        }else{
            $data['validation'] = $this->validator;
            //printer ut views
            echo view("templates/header");
            echo view("user/loginView", $data);
            echo view("templates/footer");
        }

    }

    //viser registrerings view-et
    public function registerView(){
        echo view("templates/header");
        echo view('user/registerView');
        echo view("templates/footer");

    }

    //registrerer en ny bruker
    public function registrer()
    {
        //laster inn helper klasse
        helper(['form']);

        //validering av input felt for registrering av bruker
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

            //initialiserer modellen
            $model = new \App\Models\UserModel();

            //data objekt som blir send til view
            $data = [
                'username' => $_POST['username'],
                //lagrer passord som hashed i databasen
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) 
            ];
            //lagrer data i db
            $model->save($data);

            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            //printer ut views
            echo view("templates/header");
            echo view('user/registerView', $data);
            echo view("templates/footer");
        }

    }

    //logger ut
    public function logout()
    {
        //starter session
        $session = session();
        //sletter sessioen
        $session->destroy();

        //omdirigeres til startsiden
        return redirect()->to('/');

    }

}