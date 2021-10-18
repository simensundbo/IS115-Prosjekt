<?php

namespace App\Controllers;

class AuthController extends BaseController
{

    public function index()
    {
        echo view("templates/header");
        echo view('auth/index');
        echo view("templates/footer");
    }

    public function viewAllMembers(){
        



        // echo view("templates/header");
        // echo view('auth/index');
        // echo view("templates/footer");
    }


}
