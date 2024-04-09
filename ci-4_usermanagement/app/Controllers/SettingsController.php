<?php 
// app/Controllers/Admin/SettingsController.php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuestionModel;

class SettingsController extends BaseController
{
    public function index()
    {
        $questionModel = new QuestionModel();
        $userRole = 'admin'; // Example value
    // Load the navsidebar.php view and pass the $userRole variable
        $data['userRole'] = $userRole;
        $data['questions'] = $questionModel->findAll();
        return view('admin/dashboard', $data);
    }

    public function create()
    {
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
            $data['userRole'] = $userRole;
        return view('admin/create_question',$data);
    }

    public function store()
    {
        $questionModel = new QuestionModel();
        $data = [
            'question' => $this->request->getPost('question'),
            'question_type' => $this->request->getPost('question_type'),
            'answer' => $this->request->getPost('answer'),
        ];
        $questionModel->insert($data);
        return redirect()->route('admin.dashboard.index')->with('success', 'Question added successfully.');
    }

    public function edit($id)
    {
        $questionModel = new QuestionModel();
        $userRole = 'admin'; // Example value
        // Load the navsidebar.php view and pass the $userRole variable
            $data['userRole'] = $userRole;
        $data['question'] = $questionModel->find($id);
        return view('admin/edit_question', $data);
    }

    public function update($id)
    {
        $questionModel = new QuestionModel();
        $data = [
            'question' => $this->request->getPost('question'),
            'question_type' => $this->request->getPost('question_type'),
            'answer' => $this->request->getPost('answer'),
        ];
        $questionModel->update($id, $data);
        return redirect()->route('admin.dashboard.index')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $questionModel = new QuestionModel();
        $questionModel->delete($id);
        return redirect()->route('admin.dashboard.index')->with('success', 'Question deleted successfully.');
    }
}

?>