<?php
namespace App\Models;

use CodeIgniter\Model;

class interestModel extends Model{

    protected $table = 'interests';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'name'
    ];
    
}