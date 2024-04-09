<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\QuestionModel;

class ClientController extends BaseController
{
   

    public function __construct()
    {
        if (session()->get('role') != "client") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
       // return view("client/dashboard");
       // Fetch user role from session or database
    $userRole = 'client'; // Example value
     // Fetch all questions from the database
     $questionModel = new QuestionModel();
    // Load the navsidebar.php view and pass the $userRole variable
    $data['userRole'] = $userRole;
   
    $data['questions'] = $questionModel->findAll();
    
    // Pass the data to the view
    return view('client/dashboard', $data);
    }
}


