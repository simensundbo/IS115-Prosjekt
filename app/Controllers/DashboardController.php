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

    public function addMemberView()
    {
        echo view("templates/header");
        echo view('member/addMemberView');
        echo view("templates/footer");
    }

    public function listMemberView()
    {
        echo view("templates/header");
        echo view('member/listMemberView');
        echo view("templates/footer");
    }

}
