<?php

namespace App\Controllers;

class DashboardController extends BaseController
{

    public function index()
    {
        echo view("templates/header");
        echo view('dashboard/index');
        echo view("templates/footer");
    }

    public function logout(){
        

    }

}
