<?php

namespace App\Controllers;

class MemberController extends BaseController
{

    function addMember()
    {
        helper(['form']);

        $validation = $this->validate(
            [
                'epost'          => 'required|min_length[4]|max_length[50]',
                'fname'          => 'required|min_length[4]|max_length[50]',
                'lname'          => 'required|min_length[4]|max_length[50]',
                'address'        => 'required|min_length[4]|max_length[50]',
                'post_code'      => 'required|min_length[4]|max_length[4]',
                'post_area'      => 'required',
                'mobilenr'       => 'required',
                'dob'            => 'required',
                'gender'         => 'required'
            ],
            [ //error messages
                "epost" => [
                    "required" => "epost må oppgis"
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
                "mobilenr" => [
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
            echo "her";
        } else {
            $data['validation'] = $this->validator;
            echo view("templates/header");
            echo view('member/addMemberView', $data);
            echo view("templates/footer");
        }
    }

    function listMembers(){

        $model = new \App\Models\memberModel();

        $result = $model->findAll();

        $data['title'] = "Alle medlemmer";
        $data['members'] = $result;

        //print_r($data);
        echo view("templates/header", $data);
        echo view("member/listMemberView", $data);
        echo view("templates/footer");

    }
}
