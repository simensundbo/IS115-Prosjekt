<?php

namespace App\Controllers;


include "../vendor/phpmailer/phpmailer/src/Exception.php";
include '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailController extends BaseController
{
    //viser mail dashbordet
    function index()
    {
        //printer ut views
        echo view("templates/header");
        echo view('mail/mailDashboardView');
        echo view("templates/footer");
    }

    //viser frem send mail viewt
    function sendMailView()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        $data['members'] = $model->findAll();

        //printer ut views
        echo view("templates/header");
        echo view('mail/sendMailView', $data);
        echo view("templates/footer");
    }

    //sender mailen med data fra view-et
    public function sendMail()
    {
        //starter PHPMailer
        $mail = new PHPMailer(true);

        //henter vierdiene fra view-et
        $to = $_POST['member'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->CharSet = 'UTF-8';
            $mail->Username   = getenv('mail');
            $mail->Password   = getenv('password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom(getenv('mail'), 'Neo ungdomsklubb');
            $mail->addAddress($to);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = '<p>' . $body . '</p>';

            //sender mailene
            $mail->send();

            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble sendt');
        } catch (Exception $e) {
            $error = $mail->ErrorInfo;

            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble ikke sendt. Error: ' . $error);
        }
    }

    //viser liste av medlemmer som man kan sende mail til
    public function sendNewsMailView()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        $data = [
            'members' => $model->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle medlemmer"
        ];

        //printer ut views
        echo view("templates/header");
        echo view('mail/mailMemberList', $data);
        echo view("templates/footer");
    }

    //sender nyhetsbrev
    public function sendNewsMail($to)
    {
        //starter PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('mail');
            $mail->Password   = getenv('password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom(getenv('mail'), 'Neo ungdomsklubb');
            $mail->addAddress($to);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Neo Ungdomsklubb';
            $mail->Body    = '
            <body>
                <style>
                    .main {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                    
                    .nav {
                        position: relative;
                        display: flex;
                        flex-direction: row;
            
                    }
                    .container {
                        display: flex;
                        flex-direction: row;
                    }
            
                    .section {
                        padding: 20px;
                    }
            
                    .img {
                        width: 15%;
                        height: 15%;
                    }
                </style>
        
            <main class="main">
                <nav class="nav">
        
                    <img class="img" src="https://aaseninfo.no/wp-content/uploads/2021/02/ungdomsklubb2.jpg" /></li>
                    <h1 class="title">Neo Ungdomsklubb</h1>
                </nav>
                <hr>
        
                <div class="container">
                    <div class="section">
                        <h4>Nyhet 1</h4>
                        <p>Årets turneringer</p>
                    </div>
        
                    <div class="section">
                        <h4>Nyhet 2</h4>
                        <p>Se alle våre aktiviteter her-></p>
                        <a href="http://localhost:8080/comingActivities">Trykk her</a>
                    </div>
        
                    <div class="section">
                        <h4>Nyhet 3</h4>
                        <p>Er du medlem/ eller vil du bli?</p>
                        <a href="https://www.google.com/">Trykk her</a>
                    </div>
        
                    <div class="section">
                    <h4>Nyhet 4</h4>
                    <p>Bli med på Mandagsgolf!</p>
                    <a href="http://localhost:8080/activityinfo/19">Trykk her</a>
                </div>
                </div>
        
                <footer class="footer">
                    <hr>
                    <p>Copy right 2021</p>
                    <p>Neo Ungdomsklubb</p>
                    <p>Leder: Ola Nordmann</p>
                </footer>
            </main>
        ';

            //sender mailene
            $mail->send();

            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble sendt');
        } catch (Exception $e) {
            $error = $mail->ErrorInfo;

            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble ikke sendt. Error: ' . $error);
        }
    }

    //viser medlemmer hvor konigentstatusen = ikke aktiv
    public function contingentStatusView()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //data objekt som blir send til view
        $data = [
            'members' => $model->where('contingent_status', '0')->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle medlemmer"
        ];

        //printer ut views
        echo view("templates/header");
        echo view('mail/contingentStatus', $data);
        echo view("templates/footer");
    }

    //sender mail til medlemmene med ikke aktiv kontigent status
    public function contingentStatusMail()
    {
        //initialiserer modellen
        $model = new \App\Models\memberModel();

        //henter ut medlemmene med kontigentstatus = 0
        $data['members'] = $model->where('contingent_status', '0')->findAll();

        //starter PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp-mail.outlook.com';
            $mail->SMTPAuth   = true;
            $mail->CharSet = 'UTF-8';
            $mail->Username   = getenv('mail');
            $mail->Password   = getenv('password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients

            $mail->setFrom(getenv('mail'), 'Neo ungdomsklubb');
            //legger til medlemmene som har ikke aktiv status som mottaker
            foreach ($data['members'] as $member) {
                $mail->addCC($member['email']);
            }

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Kontigenten' . date('Y');
            $mail->Body    = '<p>Påminnelse for betling av kontigent</p>';

            //sender mailene
            $mail->send();

            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble sendt');
        } catch (Exception $e) {
            $error = $mail->ErrorInfo;


            //omdirigert brukeren
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble ikke sendt. Error: ' . $error);
        }
    }
}
