<?php
namespace App\Models;

use CodeIgniter\Model;

class memberModel extends Model{

    protected $table = 'members';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'fname', 
        'lname',
        'street_name',
        'post_code',
        'post_area',
        'email',
        'mobile_nr',
        'aktivity_id',
        'interest_id',
        'contingent_status',
        'user_id',
        'dob',
        'gender'
    ];
    
}