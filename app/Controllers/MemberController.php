<?php

namespace App\Controllers;

class MemberController extends BaseController
{

    function addMemberView()
    {
        echo view("templates/header");
        echo view('member/addMemberView');
        echo view("templates/footer");
    }

    function addMember()
    {
        helper(['form']);

        $validation = $this->validate(
            [
                'epost'          => 'required|min_length[10]|max_length[50]|valid_email|is_unique[members.email]',
                'fname'          => 'required|min_length[2]|max_length[50]',
                'lname'          => 'required|min_length[2]|max_length[50]',
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
                    "min_length" => "Epost må være lengre enn {param} karakterer",
                    "is_unique" => "Eposten er allerede i bruk. Medlemmet er kanskje allerede registrert"
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

            return redirect()->to('/listMembers');
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
        //$data['members'] = $model->findAll();

        $data = [
            'members' => $model->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle medlemmer"
        ];

        echo view("templates/header", $data);
        echo view("member/listMemberView", $data);
        echo view("templates/footer");
    }

    function updateView($id)
    {
        $model = new \App\Models\memberModel();
        $data['member'] = $model->find($id);

        echo view("templates/header", $data);
        echo view("member/updateMemberView", $data);
        echo view("templates/footer");
    }

    function memberProfile($id)
    {
        $model = new \App\Models\memberModel();
        $data['member'] = $model->find($id);

        echo view("templates/header", $data);
        echo view("member/memberProfileView", $data);
        echo view("templates/footer");
    }

    function update($id)
    {

        helper(['form']);

        $validation = $this->validate(
            [
                'epost'             => 'required|min_length[10]|max_length[50]|valid_email',
                'fname'             => 'required|min_length[4]|max_length[50]',
                'lname'             => 'required|min_length[4]|max_length[50]',
                'address'           => 'required|min_length[4]|max_length[50]',
                'post_code'         => 'required|min_length[4]|max_length[4]',
                'post_area'         => 'required',
                'mobile_nr'         => 'required|min_length[8]|max_length[8]',
                'dob'               => 'required',
                'gender'            => 'required',
                'contingent_status' => 'required'
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
                'gender' => $_POST['gender'],
                'contingent_status' => $_POST['contingent_status']
            ];

            if ($model->update($id, $data)) {
                return redirect()->to('/memberProfile/' . $id);
            }
        } else {
            echo ("her");
        }
    }

    function delete($id)
    {
        $model = new \App\Models\memberModel();
        $data['member'] = $model->where('id', $id)->delete($id);

        return redirect()->to('/listMembers');
    }

    function uploadProfileImage($id)
    {
        if ($_FILES["img"]["error"] == 0) {

            $img = $_FILES["img"];

            $imgName = $_FILES["img"]["name"];
            $imgTempName = $_FILES["img"]["tmp_name"];
            $imgSize = $_FILES["img"]["size"];
            $imgType = $_FILES["img"]["type"];
            $imgError = $_FILES["img"]["error"];

            $imgExt = explode("/", $imgType);
            $imgActualExt = strtolower(end($imgExt));

            $allowd = ["png", "jpg", "jpeg"];

            if (in_array($imgActualExt, $allowd)) {

                if ($imgSize < 2000000) {

                    $fileName = $id . "." . $imgActualExt;

                    $fileDestination = "assets/img/" . $fileName;

                    move_uploaded_file($imgTempName, $fileDestination);
                    return redirect()->to('/memberProfile/' . $id);
                } else { //error handling

                    $model = new \App\Models\memberModel();
                    $data['member'] = $model->find($id);

                    $data['error'] = "Bilde er for stort";

                    echo view("templates/header", $data);
                    echo view("member/updateMemberView", $data);
                    echo view("templates/footer");
                }
            } else { //error handling
                $model = new \App\Models\memberModel();
                $data['member'] = $model->find($id);

                $data['error'] = "Ikke tillat bilde format";

                echo view("templates/header", $data);
                echo view("member/updateMemberView", $data);
                echo view("templates/footer");
            }
        } else { //error handling

            $model = new \App\Models\memberModel();
            $data['member'] = $model->find($id);

            $data['error'] = "En feil oppsto under opplastningen av bilde";

            echo view("templates/header", $data);
            echo view("member/updateMemberView", $data);
            echo view("templates/footer");
        }
    }

    function getsearchSuggestion($string)
    {
        $model = new \App\Models\memberModel();
        $data['member'] = $model->query("select * from members where fname like '%$string%'")->getResult('array');

        $suggestions = [];

        foreach($data['member'] as $value){
            $member = [
                'id' => $value['id'],
                'fname' => $value['fname'],
                'lname' => $value['lname']
            ];


            $suggestions[] = $member;
        }

        $suggestions = json_encode($suggestions, JSON_UNESCAPED_UNICODE);

        print_r($suggestions);

    }
}
