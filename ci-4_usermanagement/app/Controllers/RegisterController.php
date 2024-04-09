<?php 

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class RegisterController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('register', $data);
        // echo "hello";
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]',
            'phone_no'          => 'required|min_length[10]|max_length[15]', // Adjust the length according to your requirements
            'role'          => 'required|in_list[admin,client]' // Add validation rule for role

        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'phone_no'     => $this->request->getVar('phone_no'),// Add phone number to the data array
                'role'     => $this->request->getVar('role') // Get role from form
            ];
            $userModel->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
          
    }
  
}