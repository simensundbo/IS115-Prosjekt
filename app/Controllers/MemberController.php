<?php

namespace App\Controllers;

class MemberController extends BaseController
{
    //viser view for å legge til ett medlem
    function addMemberView()
    {
        echo view("templates/header");
        echo view('member/addMemberView');
        echo view("templates/footer");
    }

    //legger til ett medlem
    function addMember()
    {
        //loader helper klasse
        helper(['form']);

        //validering av innputt fra foremt 
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
            [ //error meldinger
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

        //sjekker om valideringen ble godkjent
        if ($validation) {

            //initialiserer modellen
            $model = new \App\Models\memberModel();

            //data array som henter verdiene fra formet
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

            //legger inn dataen i db
            $model->save($data);

            //omdirigerer brukeren
            return redirect()->to('/listMembers');
        } else {
            //dersom valideringen ikke blir godkjent

            //validater er en codeigniter klasse
            $data['validation'] = $this->validator;

            //printer ut views med feilmeldinger
            echo view("templates/header");
            echo view('member/addMemberView', $data);
            echo view("templates/footer");
        }
    }

    //lister medlemmer
    function listMembers()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //lager  en data array som inneholder alle medlemmene. 
        $data = [
            'members' => $model->paginate(10), //paginate() er en codeigniter funksjon som deler opp sidene
            'pager' => $model->pager,
            'title' => "Alle medlemmer"
        ];

        //printer views med data arrayen
        echo view("templates/header", $data);
        echo view("member/listMemberView", $data);
        echo view("templates/footer");
    }

    //viser medlems profilen
    function memberProfile($id)
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //henter medlemmet med id
        $data['member'] = $model->find($id);

        //initialiserer modellen
        $model = new \App\Models\memInterestModel();

        //builder() brukes for å bygge en spørring
        $builder = $model->builder();
        $builder->select('*');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->where('member_id', $id);
        $query = $builder->get();

        //resultatet blir lagt i variabelen data
        $data['interests'] = $query->getResultArray();

        //initialiserer modellen
        $model = new \App\Models\profilePic();

        //henter profilebilde data til medlemmet
        $data['profilepic'] = $model->where('member_id', $id)->findAll();

        //printer ut views
        echo view("templates/header", $data);
        echo view("member/memberProfileView", $data);
        echo view("templates/footer");
    }

    //viser frem view-et som oppdaterer medlems info
    function updateView($id)
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();
        //henter medlemmet
        $data['member'] = $model->find($id);

        //initialiserer modellen
        $model = new \App\Models\memInterestModel();

        //henter medlemmets interesser ved query builder
        $builder = $model->builder();
        $builder->select('*');
        $builder->join('interests', 'mem_interests.interest_id=interests.id');
        $builder->join('members', 'mem_interests.member_id=members.id');
        $builder->where('member_id', $id);
        $query = $builder->get();

        $data['interests'] = $query->getResultArray();

        //initialiserer modellen
        $model = new \App\Models\profilePic();

        //henter profilebilde data til medlemmet
        $data['profilepic'] = $model->where('member_id', $id)->findAll();

        echo view("templates/header", $data);
        echo view("member/updateMemberView", $data);
        echo view("templates/footer");
    }

    //oppdaterer medlemmet
    function update($id)
    {

        //laster inn en helper klasse
        helper(['form']);

        //validering av data med feil meldinger
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

        //sjekker valideringen
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

            //om oppdateringen lykkes omdirigeres brukeren
            if ($model->update($id, $data)) {
                //omdirigerer brukeren
                return redirect()->to('/memberProfile/' . $id);
            } else {
                //feil melding og medlemet dirigeres tilbake
                return redirect()->to('/memberProfile/' . $id)->with('msg', ' En feil skjedde');
            }
        }
    }

    function delete($id)
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();
        //sletter medlemmet med id
        if ($model->delete($id)) {
            $data['member'] = $model->delete($id);
            return redirect()->to('/listMembers');
        } else {
            return redirect()->to('/listMembers')->with('msg', "En feil skjedde");
        }
    }

    //laster opp ett profilbilde til medlemmene
    function uploadProfileImage($id)
    {
        if ($_FILES["img"]["error"] == 0) {

            //bilde informasjon
            $imgName = $_FILES["img"]["name"];
            $imgTempName = $_FILES["img"]["tmp_name"];
            $imgSize = $_FILES["img"]["size"];
            $imgType = $_FILES["img"]["type"];
            $imgError = $_FILES["img"]["error"];

            $imgExt = explode("/", $imgType);
            $imgActualExt = strtolower(end($imgExt));

            $allowd = ["png", "jpg", "jpeg"];

            //sjekker om bilde har ett lovlig format
            if (in_array($imgActualExt, $allowd)) {

                //sjekker størrelsen
                if ($imgSize < 2000000) {

                    $fileName = $id . "." . $imgActualExt;

                    $fileDestination = "assets/img/" . $fileName;

                    //initialiserer modellen
                    $model = new \App\Models\profilePic();

                    //finner ut om medlemet har et profilbilde eller ikke
                    $memberpic = $model->where('member_id', $id)->findAll();

                    //dersom medlemmet har et bilde blir $memberpic ikke empty
                    if (!empty($memberpic)) {
                        $data = [
                            'id' => $memberpic['0']['id'],
                            'path' => $fileDestination,
                            'member_id' => $memberpic['0']['member_id']
                        ];
                        //oppdaterer tabellen
                        $model->save($data);
                    } else {
                        //data som skal bli fylt inn i tabellen
                        $data = [
                            'path' => $fileDestination,
                            'member_id' => $id
                        ];
                        //lagere data i tabellen
                        $model->save($data);
                    }


                    //flytter bilde til sin nye lokasjon
                    move_uploaded_file($imgTempName, $fileDestination);

                    //omdirigerer brukeren
                    return redirect()->to('/memberProfile/' . $id);
                } else { //error handling
                    //sender brukeren tilbake med nødvendig data
                    $model = new \App\Models\memberModel();
                    $data['member'] = $model->find($id);

                    $data['error'] = "Bilde er for stort";

                    $model = new \App\Models\memInterestModel();

                    $builder = $model->builder();
                    $builder->select('*');
                    $builder->join('interests', 'mem_interests.interest_id=interests.id');
                    $builder->join('members', 'mem_interests.member_id=members.id');
                    $builder->where('member_id', $id);
                    $query = $builder->get();

                    $data['interests'] = $query->getResultArray();

                    echo view("templates/header", $data);
                    echo view("member/updateMemberView", $data);
                    echo view("templates/footer");
                }
            } else { //error handling
                //sender brukeren tilbake med nødvendig data
                $model = new \App\Models\memberModel();
                $data['member'] = $model->find($id);

                $data['error'] = "Ikke tillat bilde format";

                $model = new \App\Models\memInterestModel();

                $builder = $model->builder();
                $builder->select('*');
                $builder->join('interests', 'mem_interests.interest_id=interests.id');
                $builder->join('members', 'mem_interests.member_id=members.id');
                $builder->where('member_id', $id);
                $query = $builder->get();

                $data['interests'] = $query->getResultArray();

                echo view("templates/header", $data);
                echo view("member/updateMemberView", $data);
                echo view("templates/footer");
            }
        } else { //error handling
            //sender brukeren tilbake med nødvendig data
            $model = new \App\Models\memberModel();
            $data['member'] = $model->find($id);

            $data['error'] = "En feil oppsto under opplastningen av bilde";

            $model = new \App\Models\memInterestModel();

            $builder = $model->builder();
            $builder->select('*');
            $builder->join('interests', 'mem_interests.interest_id=interests.id');
            $builder->join('members', 'mem_interests.member_id=members.id');
            $builder->where('member_id', $id);
            $query = $builder->get();

            $data['interests'] = $query->getResultArray();

            echo view("templates/header", $data);
            echo view("member/updateMemberView", $data);
            echo view("templates/footer");
        }
    }

    //gir søke forslag under søkefeltet
    function getsearchSuggestion($string)
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //henter ut data fra modellen
        $data['member'] = $model->query("select * from members where fname like '%$string%'")->getResult('array');

        //tom array som skal brukes til forslagene
        $suggestions = [];
        //looper gjennom forslagene
        foreach ($data['member'] as $value) {
            $member = [
                'id' => $value['id'],
                'fname' => $value['fname'],
                'lname' => $value['lname']
            ];

            //legger de inn i arrayen
            $suggestions[] = $member;
        }

        //json encoder dataen
        $suggestions = json_encode($suggestions, JSON_UNESCAPED_UNICODE);

        print_r($suggestions);
    }
}
