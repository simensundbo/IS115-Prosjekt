<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InterestController extends BaseController
{
    //add Interest view
    public function index($id)
    {
        $model = new \App\Models\interestModel();

        $data = [
            'interest' => $model->findAll(),
            'title' => 'Interesser',
            'id' => $id
        ];

        echo view('templates/header', $data);
        echo view('interest/addInterestView', $data);
        echo view('templates/footer');

    }

    public function addInterest($id){
        $model = new \App\Models\memInterestModel();

        $data = [
            'interest_id' => $_POST['interest'],
            'member_id' => $id
        ];

        if($model->save($data)){
            return redirect()->to('/memberProfile/' . $id);
        }else{
            $model = new \App\Models\interestModel();
            
            $data = [
                'interest' => $model->findAll(),
                'title' => 'Interesser',
                'id' => $id,
                'errormsg' =>  'En feil skjedde. Prøv på nytt.'
            ];

            echo view('templates/header');
            echo view('interest/addInterestView', $data);
            echo view('templates/footer');
        }
    }

    public function filterInterestsView()
    {
        $model = new \App\Models\interestModel();

        $data['interests'] = $model->findAll();

        echo view("templates/header");
        echo view('interest/filterInterestView', $data);
        echo view("templates/footer");
        
    }

    public function filterInterests(){

        $id = $_POST['medlem']; 

        $model = new \App\Models\interestModel();

        $memInterestModel= new \App\Models\memInterestModel();

        $data['interests'] = $model->findAll();

        $builder = $memInterestModel->builder();

        $builder->select('interests.name, members.*');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->where('interests.id', $id);
        $query = $builder->get();

        $data['medlem_int'] =  $query->getResultArray();

        echo view("templates/header");
        echo view('interest/filterInterestView', $data);
        echo view("templates/footer");
    }

    
}
