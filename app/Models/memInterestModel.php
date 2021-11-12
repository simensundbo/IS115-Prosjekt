<?php
namespace App\Models;

use CodeIgniter\Model;

class memInterestModel extends Model{

    protected $table = 'mem_interests';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'interest_id',
        'member_id'
    ];
    
}