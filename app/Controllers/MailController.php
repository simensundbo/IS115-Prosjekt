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
}