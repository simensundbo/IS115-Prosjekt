<?php
namespace App\Models;

use CodeIgniter\Model;

class memRoleModel extends Model{

    protected $table = 'mem_role';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'role_id',
        'member_id'
    ];
    
}