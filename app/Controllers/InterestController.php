<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use function PHPUnit\Framework\isEmpty;

class InterestController extends BaseController
{
    //viser frem view-et som legger til en interesse
    public function addInterestView($id)
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

    //legger til en interesse
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

    //viser frem view-et som man kan filtrere etter interesse
    public function filterInterestsView()
    {
        $model = new \App\Models\interestModel();

        $data['interests'] = $model->findAll();

        echo view("templates/header");
        echo view('interest/filterInterestView', $data);
        echo view("templates/footer");
        
    }

    ////viser frem filtere uten ajax
    public function filterInterests(){

        $memberId = $_POST['medlem']; 

        $model = new \App\Models\interestModel();

        $memInterestModel= new \App\Models\memInterestModel();

        $data['interests'] = $model->findAll();

        $builder = $memInterestModel->builder();

        $builder->select('interests.name, members.*');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->where('interests.id', $memberId);
        $query = $builder->get();

        $data['medlem_int'] =  $query->getResultArray();

        echo view("templates/header");
        echo view('interest/filterInterestView', $data);
        echo view("templates/footer");
    }

    //viser frem filtere asynkront ved ajax
    public function filterInterestsAsync($id){

        $model = new \App\Models\interestModel();

        $memInterestModel= new \App\Models\memInterestModel();

        $data['interests'] = $model->findAll();

        $builder = $memInterestModel->builder();

        $builder->select('interests.name, members.*');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->where('interests.id', $id);
        $query = $builder->get();

        print_r(json_encode( $query->getResultArray()));
    }

    //sletter en som er koblet til ett medlem
    public function deleteInterests($memberId, $interestId){

        $model= new \App\Models\memInterestModel();

        $model->where('member_id', $memberId)->where('interest_id', $interestId)->delete();
        
        return redirect()->to('/updateView/' . $memberId);
    
    }

    
}
