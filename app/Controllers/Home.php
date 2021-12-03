<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view("templates/header");
        echo view('home/index');
        echo view("templates/footer");
    }

    public function users()
    {

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * from users");
        $result = $query->getResult('array');
        $db->close();
        $data['users'] = $result;
        $data['title'] = "Brukere";


        echo view("templates/header", $data);
        echo view('user/usersListView', $data);
        echo view("templates/footer");
    }

    public function test()
    {
        $model = new \App\Models\UserModel();

        $result = $model->findAll();
        

        $data['users'] = $result;
        $data['title'] = "Brukere";

        // echo view("templates/header", $data);
        echo view('user/usersListView', $data);
        // echo view("templates/footer");
    }

    public function join2(){

        $model = new \App\Models\memInterestModel();

        $builder = $model->builder();
        $builder->select('*');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->where('member_id', 3);
        $query = $builder->get();

        print_r( $query->getResultArray());
    }

    public function startview(){
        echo view('welcome_message');
    }

}
