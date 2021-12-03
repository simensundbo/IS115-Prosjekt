<?php

namespace App\Controllers;

class ActivityController extends BaseController
{
    function listActivities()
    {

        $model = new \App\Models\activityModel();

        /*
        $data = [
            'activities' => $model->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle aktiviteter"
        ];
        */

        $data['activities'] = $model->query('
        SELECT activities.id ,
       activities.name ,
       activities.startdato,
       activities.sluttdato,
       ansvarlig.fname as AnsFname,
       ansvarlig.lname as AnsLname,
       nestleder.fname as NestFname,
       nestleder.lname as NestLname,
       matansvarlig.fname as MatAnsFname,
       matansvarlig.lname as MatAnsLname
        FROM activities
        JOIN members ansvarlig on activities.ansvarlig=ansvarlig.id
        JOIN members nestleder on activities.nestleder=nestleder.id
        join members matansvarlig on activities.matansvarlig =matansvarlig.id;')->getResult('array');


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
                'stdate'          => 'required',
                'enddate'          => 'required',
                'ansvarlig'        => 'required',
                'nestleder' => 'required',
                'matansvarlig' => 'required'

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
                'startdato' => $_POST['stdate'],
                'sluttdato' => $_POST['enddate'],
                'ansvarlig' => $_POST['ansvarlig'],
                'nestleder' => $_POST['nestleder'],
                'matansvarlig' => $_POST['matansvarlig']
            ];

            $model->save($data);

            return redirect()->to('listActivities');
        } else {
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('member/addMemberView', $data);
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


        $data['activities'] = $model->query('
        SELECT activities.id ,
       activities.name ,
       activities.startdato,
       activities.sluttdato,
       ansvarlig.fname as AnsFname,
       ansvarlig.lname as AnsLname,
       nestleder.fname as NestFname,
       nestleder.lname as NestLname,
       matansvarlig.fname as MatAnsFname,
       matansvarlig.lname as MatAnsLname
        FROM activities
        JOIN members ansvarlig on activities.ansvarlig=ansvarlig.id
        JOIN members nestleder on activities.nestleder=nestleder.id
        join members matansvarlig on activities.matansvarlig =matansvarlig.id
        WHERE sluttdato >= CURRENT_DATE;')->getResult('array');


        echo view("templates/header", $data);
        echo view("activity/comingActivityView", $data);
        echo view("templates/footer");
    }
}
