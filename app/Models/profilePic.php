<?php

namespace App\Models;

use CodeIgniter\Model;

class profilePic extends Model
{
    protected $table            = 'profilepic';
    protected $primaryKey       = 'id';

    protected $allowedFields = [
        'id', 
        'path',
        'member_id'
    ];
}
