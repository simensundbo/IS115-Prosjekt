<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function users()
    {
    
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * from brukere");
        $result = $query->getResult('array');
        $db->close();
        $data['users'] = $result;


        echo view("templates/header", $data);
        echo view('user/usersListView', $data);
        echo view("templates/footer");

    }

    public function test()
    {
        $model = new \App\Models\testUserModel();

        $result = $model->findAll();

        $data['users'] = $result;


        echo view("templates/header", $data);
        echo view('user/usersListView', $data);
        echo view("templates/footer");

        //return view('welcome_message');
    }
}
