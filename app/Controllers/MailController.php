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
        echo view("templates/header");
        echo view('mail/mailDashboardView');
        echo view("templates/footer");
    }

    //viser frem send mail viewt
    function sendMailView()
    {
        $model = new \App\Models\memberModel();

        $data['members'] = $model->findAll();

        echo view("templates/header");
        echo view('mail/sendMailView', $data);
        echo view("templates/footer");
    }

    //sender mailen med data fra view-et
    public function sendMail()
    {
        $mail = new PHPMailer(true);

        $to = $_POST['member'];
        $subject = $_POST['subject'];
        $body = $_POST['message'];

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
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
            $mail->Subject = $subject;
            $mail->Body    = '<p>' . $body . '</p>';

            $mail->send();
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble sendt');
        } catch (Exception $e) {
            $error = $mail->ErrorInfo;

            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble ikke sendt. Error: ' . $error);
        }
    }

    //viser liste av medlemmer som man kan sende mail til
    public function sendNewsMailView()
    {
        $model = new \App\Models\memberModel();

        $data = [
            'members' => $model->paginate(10),
            'pager' => $model->pager,
            'title' => "Alle medlemmer"
        ];

        echo view("templates/header");
        echo view('mail/mailMemberList', $data);
        echo view("templates/footer");
    }

    //sender nyhetsbrev
    public function sendNewsMail($to)
    {
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

            $mail->send();
            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble sendt');
        } catch (Exception $e) {
            $error = $mail->ErrorInfo;

            return redirect()->to('mailDashboard')->with('msg', 'Meldingen ble ikke sendt. Error: ' . $error);
        }
    }
}
