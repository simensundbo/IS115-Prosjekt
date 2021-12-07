<?php
namespace App\Models;

use CodeIgniter\Model;

class activityModel extends Model{

    protected $table = 'activities';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id', 
        'name',
        'location', 
        'start_date',
        'end_date',
        'responsible',
        'deputy_responsible',
        'finance_responsible'
    ];
    
}