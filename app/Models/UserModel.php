<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username', 
        'password'
    ];

    // protected $validationRules = [
    //     'username'          => 'required|min_length[2]|max_length[50]|is_unique[users.username]',
    //     'password'          => 'required',
    //     'confirmpassword'   => 'matches[password]'
    // ];

}