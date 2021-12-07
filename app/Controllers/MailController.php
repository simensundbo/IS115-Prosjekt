<?php

namespace App\Controllers;

class MailController extends BaseController
{
    function mailView()
    {
        echo view("templates/header");
        echo view('mail/mailDashboardView');
        echo view("templates/footer");
    }

    function sendMail()
    {
        $model = new \App\Models\memberModel();

        $data['members'] = $model->findAll();

        echo view("templates/header");
        echo view('mail/sendMailView', $data);
        echo view("templates/footer");
    }
}