<?php

namespace App\Controllers;

class ActivityController extends BaseController
{
    //lister alle aktiviteter
    function listActivities()
    {
        //kobler sammen til aktivitetstabellen i databasen
        $model = new \App\Models\activityModel();

        //spørring for å hente ut all info om activiteten, samt navn på de ansvarlige (roller)
        $builder = $model->builder();

        $builder->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder->join('members res', 'activities.responsible=res.id');
        $builder->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder->join('members fin', 'activities.finance_responsible=fin.id');
        $query = $builder->get();

        //legger uthentet data inn i en matrise
        $data['activities'] =  $query->getResultArray();


        echo view("templates/header", $data);
        echo view("activity/listActivitiesView", $data);
        echo view("templates/footer");
    }

    //legger til en aktivitet
    function addActivity()
    {
        helper(['form']);

        //validering, sjekker at alle felt er fylt inn
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
            [ //meldingene som kommer opp ved feil
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
            //true. Hente ur data fra formet og lagrer i databasen, hvis alle nødvendig input felt fylt inn 
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
            //dataen lagres i db
            $model->save($data);
            //omdirigerer brukeren
            return redirect()->to('listActivities');
        } else {
            //dersom valideringen feiler
            $data['validation'] = $this->validator;

            echo view("templates/header");
            echo view('activity/addActivityView', $data);
            echo view("templates/footer");
        }
    }

    //viser frem view-et som tar inn data til en ny aktivitet
    public function addActivityView()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //henter ut alle medlemmene
        $data['members'] = $model->findAll();

        //printer ut views med data
        echo view("templates/header");
        echo view('activity/addActivityView', $data);
        echo view("templates/footer");
    }

    //viser kommende aktiviteter (alle aktiviteter fra dagens dato)
    public function comingActivities()
    {
        //initialiserer modellen
        $model = new \App\Models\activityModel();

        //sql spørring helt lik som ListActivities, men som henter ut fra dagens dato
        $builder = $model->builder();

        $builder->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder->join('members res', 'activities.responsible=res.id');
        $builder->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder->join('members fin', 'activities.finance_responsible=fin.id');
        $builder->where('end_date >=', date('Y-m-d'));
        $query = $builder->get();

        //lagrer dataen i en matrise
        $data['activities'] = $query->getResultArray();

        //printer ut views med data
        echo view("templates/header", $data);
        echo view("activity/comingActivityView", $data);
        echo view("templates/footer");
    }

    //viser aktivitets info siden
    public function activityInfo($id)
    {

        //initialiserer modellen
        $activityModel = new \App\Models\activityModel();

        //initialiserer modellen
        $memActivityModel = new \App\Models\memActivityModel();

        //sql spørring, lik som listActivities. Sql spørringen bygges med builder funksjonen
        $builder1 = $activityModel->builder();

        $builder1->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder1->join('members res', 'activities.responsible=res.id');
        $builder1->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder1->join('members fin', 'activities.finance_responsible=fin.id');
        $builder1->where('activities.id', $id);
        $query1 = $builder1->get();

        //lagre i matrise
        $data['activity'] =  $query1->getResultArray();

        // sql spørring nr 2, henter medlemmer som er meldt på aktivitet. Sql spørringen bygges med builder funksjonen
        $builder2 = $memActivityModel->builder();

        $builder2->select('members.fname, members.lname');
        $builder2->join('members', 'mem_activity.member_id=members.id');
        $builder2->where('activity_id', $id);
        $query2 = $builder2->get();

        //lagrer dataen i en matrise
        $data['registered'] =  $query2->getResultArray();

        echo view("templates/header");
        echo view("activity/activityInfoView", $data);
        echo view("templates/footer");
    }

    //viser frem udate view med data innfylt
    public function updateView($id)
    {

        //initialiserer modellen
        $activityModel = new \App\Models\activityModel();

        //initialiserer modellen
        $memberModel = new \App\Models\memberModel();

        //sql spørring, lik som listActivities
        $builder1 = $activityModel->builder();

        $builder1->select('activities.*, res.fname as resFname, res.lname as resLname, dep.fname as depFname, dep.lname as depLname, fin.fname as finFname, fin.lname as finLname');
        $builder1->join('members res', 'activities.responsible=res.id');
        $builder1->join('members dep', 'activities.deputy_responsible=dep.id');
        $builder1->join('members fin', 'activities.finance_responsible=fin.id');
        $builder1->where('activities.id', $id);
        $query1 = $builder1->get();

        //lagrer data fra spørring over i en matrise
        $data['activity'] =  $query1->getResultArray();

        //lagrer alle medlemmene i en matrise, for drop down meny
        $data['members'] = $memberModel->findAll();

        echo view("templates/header");
        echo view("activity/activityInfoUpdateView", $data);
        echo view("templates/footer");
    }

    //oppdaterer aktiviteten
    public function update($id)
    {

        //laster inn helper klasse
        helper(['form']);

        //Validering for å sjekke at bruker fyller inn nødvendig felt
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
            //true. Hente ur data fra formet, lagrer i db dersom validering er godkjent
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

            //oppdaterer dataen i databasen
            $model->update($id, $data);
            //omdirigerer brukeren
            return redirect()->to('/activityinfo/' . $id);
        } else {
            //error handling. Sender brukeren tilbake med nødvendig data. Samme spørringer som tidligere
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

    //sletter en aktivitet
    public function delete($id)
    {
        //initialiserer modellen
        $model = new \App\Models\activityModel();

        //sjekk at ID finnes i db før den slettes
        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('/comingActivities');
        } else {
            echo 'En feil skjedde';
        }
    }

    //viser frem view som lar medlemmer melde seg på aktiviteter
    public function registerMemberView($id)
    {

        //initialiserer modellen
        $model = new \App\Models\memberModel();
        //initialiserer modellen
        $memActivityModel = new \App\Models\memActivityModel();

        //henter alle medlemmene og legger dem inn i arrayen $data
        $data = [
            'members' => $model->findAll(),
            'title' => 'aktivitet',
            'id' => $id
        ];

        //bygger spørringen for å hente ut aktiviteter som er knyttet til ett gitt medlem
        $builder = $memActivityModel->builder();

        $builder->select('mem_activity.member_id, members.fname, members.lname');
        $builder->join('members', 'mem_activity.member_id=members.id');
        $builder->where('activity_id', $id);
        $query = $builder->get();

        //legger resultatet inn i arrayen
        $data['registered'] =  $query->getResultArray();

        //printer ut views med data
        echo view('templates/header');
        echo view('activity/registerMemberView', $data);
        echo view('templates/footer');
    }

    //registrerer påmeldingen av et medlem til en git aktivitet
    public function registerMember($id)
    {

        //initialiserer modellen
        $model = new \App\Models\memActivityModel();

        //henter medlem fra dropdown og registrerer den mot git aktivitet
        $data = [
            'activity_id' => $id,
            'member_id' => $_POST['member']
        ];

        //lagring av data, feilmelding ved feil
        if ($model->save($data)) {
            return redirect()->to('/registerMemberView/' . $id);
        } else {
            $model = new \App\Models\activityModel();

            $data = [
                'activity' => $model->findAll(),
                'title' => 'Activiteter',
                'id' => $id,
                'errormsg' =>  'En feil skjedde. Prøv på nytt.'
            ];

            echo view('templates/header');
            echo view('activity/registerMemberView', $data);
            echo view('templates/footer');
        }
    }

    //fjerner medlemmer fra en aktivitet
    public function deleteActivityMember($memberId, $activityId)
    {
        //initialiserer modellen
        $model = new \App\Models\memActivityModel();
        //finner medlemmet som er knyttet til aktiviteten og fjerner det
        $model->where('member_id', $memberId)->where('activity_id', $activityId)->delete();

        return redirect()->to('/registerMemberView/' . $activityId);
    }
}
