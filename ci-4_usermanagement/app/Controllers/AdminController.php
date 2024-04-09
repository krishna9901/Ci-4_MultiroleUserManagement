<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuestionModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        //return view("admin/dashboard");
       // Fetch user role from session or database
    $userRole = 'admin'; // Example value
    $questionModel = new QuestionModel();
    // Load the navsidebar.php view and pass the $userRole variable
    $data['userRole'] = $userRole;
    $data['questions'] = $questionModel->findAll();
      
    // Load the admin/dashboard view with data
    return view('admin/dashboard', $data);
    }
}