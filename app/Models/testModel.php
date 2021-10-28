<?php
namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model{

    public function login($uname, $pass)
    {
        if (empty($uname)) {
            $user_err = "Brukernavnet kan ikke være tomt";
            return $user_err;
        } elseif (!preg_match('/^[a-zA-Z0-9 øæå]+$/', $uname)) {
            $user_err = "Brukernavnet kan kun inneholder bokstaver og tall";
            return $user_err;
        } else {
            $db = \Config\Database::connect();
            $sql = "select id, bruker_navn, bruker_passord from brukere where bruker_navn = :bruker_navn: ";
            $result = $db->query($sql, [
                'bruker_navn' => $uname
            ]);

            if ($result->getNumRows() == 1) {

                $user = $result->getResult('array');
                foreach ($user as $item){
                    $hashed_password =  strval($item["bruker_passord"]);
                    if(password_verify($pass, $hashed_password)){
                        session_start();
                        $_SESSION["loggedon"] = true;
                        $_SESSION["userid"] = $item["id"];
                        $_SESSION["username"] = $item["bruker_navn"];
                        return $user;
                    }else{
                        $user_err = "Brukernavnet eller passordet stemmer ikke.";
                        return $user_err;
                    }
                }

            }
        }
    }

    public function register($uname, $pwd, $pwdRepeat){

        if (empty($uname)) {
            return "Brukernavnet kan ikke være tomt";

        } elseif (!preg_match('/^[a-zA-Z0-9 øæå]+$/', $uname)) {
            echo "Brukernavnet kan kun inneholder bokstaver og tall";
            return false;
        } else {

            $db = \Config\Database::connect();
            $sql = "select id, bruker_navn, bruker_passord from brukere where bruker_navn = :bruker_navn: ";
            $result = $db->query($sql, [
                'bruker_navn' => $uname
            ]);

            if ($result->getNumRows() == 1) {
                echo "Brukernavnet er allerede i bruk";
                return false;
            }
        }

        if($pwd == $pwdRepeat){
            $sql = "insert into brukere(bruker_navn, bruker_passord) values(:bruker_navn:,:bruker_passord:)";
            $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $result = $db->query($sql, [
                'bruker_navn' => $uname,
                'bruker_passord'=>$hashPwd
            ]);
            if($result){
                return true;
            }
        }else{
            echo "Passordene må være like";
            return false;
        }
    }


}