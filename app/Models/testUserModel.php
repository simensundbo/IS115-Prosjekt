<?php
namespace App\Models;

use CodeIgniter\Model;

class testUserModel extends Model
{
    protected $table = 'brukere';
    protected $primaryKey = 'id';

    protected $allowedFields = ['bruker_navn', 'bruker_passord'];


}