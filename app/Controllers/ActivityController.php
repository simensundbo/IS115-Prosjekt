<?php

namespace App\Controllers;

class ActivityController extends BaseController
{
    function listActivities()
    {
        $model = new \App\Models\activityModel();

        $builder = $model->builder();
        
        $builder->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder->join('members res', 'activities.responsible=res.id');
        $builder->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder->join('members fin', 'activities.finance_responsible=fin.id');
        $query = $builder->get();
        
        $data['activities'] =  $query->getResultArray();


        echo view("templates/header", $data);
        echo view("activity/listActivitiesView", $data);
        echo view("templates/footer");
    }

    function addActivity()
    {

        helper(['form']);

        $validation = $this->validate(
            [
                'activity'          => 'required',
                'location'          => 'required',
                'stdate'          => 'required',
                'enddate'          => 'required',
                'ansvarlig'        => 'required',
                'nestleder' => 'required',
                'okonomiansvarlig' => 'required'

            ],
            [ //error messages
                "activity" => [
                    "required" => "Aktivitet må oppgis",
                ],
                "stdate" => [
                    "required" => "Startdato må oppgis"
                ],
                "enddate" => [
                    "required" => "Sluttdato må oppgis"
                ],
                "ansvarlig" => [
                    "required" => "Ansvarlig medlem må oppgis"
                ],
            ]
        );

        if ($validation) {
            //true. Hente ur data fra fromet
            $model = new \App\Models\activityModel();

            $data = [
                'name' => $_POST['activity'],
                'location' => $_POST['location'],
                'start_date' => $_POST['stdate'],
                'end_date' => $_POST['enddate'],
                'responsible' => $_POST['ansvarlig'],
                'deputy_responsible' => $_POST['nestleder'],
                'finance_responsible' => $_POST['okonomiansvarlig']
            ];

            $model->save($data);

            return redirect()->to('listActivities');
        } else {
            $data['validation'] = $this->validator;

            echo view("templates/header");
            echo view('activity/addActivityView', $data);
            echo view("templates/footer");
        }
    }

    public function addActivityView()
    {
        $model = new \App\Models\memberModel();

        $data['members'] = $model->findAll();

        echo view("templates/header");
        echo view('activity/addActivityView', $data);
        echo view("templates/footer");
    }

    public function comingActivities()
    {

        $model = new \App\Models\activityModel();

        $builder = $model->builder();
        
        $builder->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder->join('members res', 'activities.responsible=res.id');
        $builder->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder->join('members fin', 'activities.finance_responsible=fin.id');
        $builder->where('end_date >=', date('Y-m-d'));
        $query = $builder->get();
        
        $data['activities'] =  $query->getResultArray();


        echo view("templates/header", $data);
        echo view("activity/comingActivityView", $data);
        echo view("templates/footer");
    }

    public function activityInfo($id){
        
        $activityModel = new \App\Models\activityModel();

        $memActivityModel = new \App\Models\memActivityModel();

        $builder1 = $activityModel->builder();
        
        $builder1->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder1->join('members res', 'activities.responsible=res.id');
        $builder1->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder1->join('members fin', 'activities.finance_responsible=fin.id');
        $builder1->where('activities.id', $id);
        $query1 = $builder1->get();

        $data['activity'] =  $query1->getResultArray();

        $builder2 = $memActivityModel->builder();

        $builder2->select('members.fname, members.lname');
        $builder2->join('members', 'mem_activity.member_id=members.id');
        $builder2->where('activity_id', $id);
        $query2 = $builder2->get();

        $data['registered'] =  $query2->getResultArray();
        
        echo view("templates/header");
        echo view("activity/activityInfoView", $data);
        echo view("templates/footer");
    }

    public function updateView($id){
        $activityModel = new \App\Models\activityModel();

        $memberModel = new \App\Models\memberModel();

        $builder1 = $activityModel->builder();
        
        $builder1->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder1->join('members res', 'activities.responsible=res.id');
        $builder1->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder1->join('members fin', 'activities.finance_responsible=fin.id');
        $builder1->where('activities.id', $id);
        $query1 = $builder1->get();
        
        $data['activity'] =  $query1->getResultArray();

        $data['members'] = $memberModel->findAll();
        
        echo view("templates/header");
        echo view("activity/activityInfoUpdateView", $data);
        echo view("templates/footer");

    }

    public function update($id){
        
        helper(['form']);

        $validation = $this->validate(
            [
                'activity'          => 'required',
                'location'          => 'required',
                'stdate'          => 'required',
                'enddate'          => 'required',
                'responsible'        => 'required',
                'deputy_responsible' => 'required',
                'finance_responsible' => 'required'

            ],
            [ //error messages
                "activity" => [
                    "required" => "Aktivitet må oppgis",
                ],
                "stdate" => [
                    "required" => "Startdato må oppgis"
                ],
                "enddate" => [
                    "required" => "Sluttdato må oppgis"
                ],
                "responsible" => [
                    "required" => "Ansvarlig medlem må oppgis"
                ],
                "deputy_responsible"  => [
                    "required" => "Nestleder medlem må oppgis"
                ],
                "finance_responsible"  => [
                    "required" => "Økonomiansvarlig medlem må oppgis"
                ],
            ]
        );


        if ($validation) {
            //true. Hente ur data fra fromet
            $model = new \App\Models\activityModel();

            $data = [
                'name' => $_POST['activity'],
                'location' => $_POST['location'],
                'start_date' => $_POST['stdate'],
                'end_date' => $_POST['enddate'],
                'responsible' => $_POST['responsible'],
                'deputy_responsible' => $_POST['deputy_responsible'],
                'finance_responsible' => $_POST['finance_responsible']
            ];

            $model->update($id, $data);
            echo "her";
            return redirect()->to('/activityinfo/' . $id);
        } else {
            $activityModel = new \App\Models\activityModel();

            $memberModel = new \App\Models\memberModel();
    
            $builder1 = $activityModel->builder();
            
            $builder1->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
            $builder1->join('members res', 'activities.responsible=res.id');
            $builder1->join('members dep', 'activities.deputy_responsible=dep.id');
            $builder1->join('members fin', 'activities.finance_responsible=fin.id');
            $builder1->where('activities.id', $id);
            $query1 = $builder1->get();
            
            $data['activity'] =  $query1->getResultArray();
    
            $data['members'] = $memberModel->findAll();

            $data['validation'] = $this->validator;

            echo view("templates/header");
            echo view('activity/activityInfoUpdateView', $data);
            echo view("templates/footer");
        }


    }

    public function delete($id){
        $model = new \App\Models\activityModel();

        if($model->find($id)){
            $model->delete($id);
            return redirect()->to('/comingActivities');
        }else{
            echo 'En feil skjedde';
        }

    }

    public function activityRegistrationView()
    {


        echo view("templates/header");
        echo view("activity/activityRegistrationView");
        echo view("templates/footer");
    }
}
