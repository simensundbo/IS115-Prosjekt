<?php
namespace App\Models;

use CodeIgniter\Model;

class activityModel extends Model{

    protected $table = 'activities';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'name', 
        'startdato',
        'sluttdato',
        'ansvarlig',
        'nestleder',
        'matansvarlig'
    ];
    
}