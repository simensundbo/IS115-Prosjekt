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
        echo $id . " " . $_POST['interest'];

        $model = new \App\Models\memInterestModel();

        $data = [
            'interest_id' => $_POST['interest'],
            'member_id' => $id
        ];

        if($model->save($data)){
            return redirect()->to('/memberProfile/' . $id);
        }else{
            echo "en feil skjedde";
        }
    }
}
