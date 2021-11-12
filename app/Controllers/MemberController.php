<?php

namespace App\Controllers;

class MemberController extends BaseController
{

    function addMember()
    {
        helper(['form']);

        $validation = $this->validate(
            [
                'epost'          => 'required|min_length[10]|max_length[50]|valid_email',
                'fname'          => 'required|min_length[4]|max_length[50]',
                'lname'          => 'required|min_length[4]|max_length[50]',
                'address'        => 'required|min_length[4]|max_length[50]',
                'post_code'      => 'required|min_length[4]|max_length[4]',
                'post_area'      => 'required',
                'mobile_nr'       => 'required|min_length[8]|max_length[8]',
                'dob'            => 'required',
                'gender'         => 'required'
            ],
            [ //error messages
                "epost" => [
                    "required" => "epost må oppgis",
                    "min_length" => "Epost må være lengre enn {param} karakterer"
                ],
                "fname" => [
                    "required" => "Fornavn må oppgis"
                ],
                "lname" => [
                    "required" => "Etternavn må oppgis"
                ],
                "address" => [
                    "required" => "Adresse må oppgis"
                ],
                "post_code" => [
                    "required" => "Postkode må oppgis"
                ],
                "post_area" => [
                    "required" => "Poststed må oppgis"
                ],
                "mobile_nr" => [
                    "required" => "Mobil nummer må oppgis"
                ],
                "dob" => [
                    "required" => "Fødselsdato må oppgis"
                ],
                "gender" => [
                    "required" => "Kjønn må oppgis"
                ]
            ]
        );

        if ($validation) {
            //true. Hente ur data fra fromet
            $model = new \App\Models\memberModel();

            $data = [
                'email' => $_POST['epost'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'street_name' => $_POST['address'],
                'post_code' => $_POST['post_code'],
                'post_area' => $_POST['post_area'],
                'mobile_nr' => $_POST['mobile_nr'],
                'dob' => $_POST['dob'],
                'gender' => $_POST['gender']
            ];

            $model->save($data);

            return redirect()->to('dashboard');
        } else {
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('member/addMemberView', $data);
            echo view("templates/footer");
        }
    }

    function listMembers()
    {

        $model = new \App\Models\memberModel();

        $result = $model->findAll();
        //$result = $model->query("select * from members")->getResult("array");

        $data['title'] = "Alle medlemmer";
        $data['members'] = $result;

        echo view("templates/header", $data);
        echo view("member/listMemberView", $data);
        echo view("templates/footer");
    }

    function update(){

    }

    function delete(){
        
    }
}
