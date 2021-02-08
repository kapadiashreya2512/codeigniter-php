<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'student';

    protected $primaryKey = 'studentid';
    
    protected $allowedFields = ['studentname', 'marksPercentage','standard'];
}