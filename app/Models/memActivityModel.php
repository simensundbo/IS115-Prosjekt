<?php
namespace App\Models;

use CodeIgniter\Model;

class memActivityModel extends Model{

    protected $table = 'mem_activity';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'activity_id',
        'member_id'
    ];
    
}