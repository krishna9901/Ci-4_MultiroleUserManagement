<?php
namespace App\Models;

use CodeIgniter\Model;

class ClientQuestionnaireModel extends Model
{
    protected $table = 'client_questionnaires';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question_id', 'answer', 'is_checked','user_id'];
}

?>