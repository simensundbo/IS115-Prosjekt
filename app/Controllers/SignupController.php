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


        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmpassword'   => 'matches[password]'
        ];


        if($this->validate($rules)){
            $model = new \App\Models\testUserModel();

            $data = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) 
            ];

            $model->save($data);

            return redirect()->to('/users');
        }else{
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('user/registerView', $data);
            echo view("templates/footer");
        }
    }
}