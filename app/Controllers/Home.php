<?php

namespace App\Controllers;

class Home extends BaseController
{
    //viser start view-et
    public function index()
    {
        echo view("templates/header");
        echo view('home/index');
        echo view("templates/footer");
    }

    //test
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

    //test
    public function test()
    {
        $activityModel = new \App\Models\activityModel();

        $builder = $activityModel->builder();
        
        $builder->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder->join('members res', 'activities.responsible=res.id');
        $builder->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder->join('members fin', 'activities.finance_responsible=fin.id');
        $query = $builder->get();
        
        $data['activity'] =  $query->getResultArray();
        print_r($data['activity']);
    }

    //test
    public function startview(){
        echo view('welcome_message');
    }

}
