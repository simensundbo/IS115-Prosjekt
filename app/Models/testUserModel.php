<?php
namespace App\Models;

use CodeIgniter\Model;

class testUserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username', 
        'password'
    ];


}