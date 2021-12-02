<?php

namespace App\Controllers;

class ActivityController extends BaseController
{
    function listActivities()
    {

        $model = new \App\Models\activityModel();

        $data = [
            'activities' => $model->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle aktiviteter"
        ];

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
                'member'        => 'required'
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
                "member" => [
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
                'ansvarlig' => $_POST['member'],
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
        echo view("templates/header");
        echo view('activity/addActivityView');
        echo view("templates/footer");
    }
}
