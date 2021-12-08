<?php

namespace App\Controllers;

class DashboardController extends BaseController
{

    //viser frem dashbordet
    public function index()
    {
        //api url
        $url = "api.openweathermap.org/data/2.5/find?q=Kristiansand&units=metric&appid=f72f6212854d177ec2fffc9ac25adcc2";

        //starter curl
        $ch = curl_init();

        //definerer parametere
        $param = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1
        );

        //setop
        curl_setopt_array($ch, $param);

        //henter resultatet fra apien
        $resultat = curl_exec($ch);

        //lukker curl
        curl_close($ch);

        //dekoder json dataen man får fra api-en
        $arr = json_decode($resultat);

        //henter frem temperaturen fra arraysen
        $data['temp'] = $arr->list['0']->main->temp;

        echo view("templates/header");
        echo view('dashboard/index', $data);
        echo view("templates/footer");
    }
}
