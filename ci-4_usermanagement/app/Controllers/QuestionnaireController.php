<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QuestionModel;
use App\Models\ClientQuestionnaireModel;
use App\Models\UserModel;

class QuestionnaireController extends BaseController
{
    public function __construct()
    {
        $this->questionnaireModel = new ClientQuestionnaireModel();
        // Load the form helper
        helper('form');
    }


    public function index()
    {
       
        $session = session();
       $user_id = $session->get('id');
        $userRole = 'client';
        
        // Fetch all questions from the database
        $questionModel = new QuestionModel();
        $data['questions'] = $questionModel->findAll();
        $data['userRole'] = $userRole;
        $data['user_id'] = $user_id;
        // Pass the data to the view
        return view('client/questionnaire', $data);
    }


    public function convertDocToPdf()
    {
        // Load the FileConverter library
        $fileConverter = new \App\Libraries\FileConverter();
        
        // Define the paths to the input Word DOC file and the output directory
        $inputFilePath = WRITEPATH . 'uploads/input.docx'; // Path to the Word DOC file
        $outputFilePath = WRITEPATH . 'uploads/output'; // Output directory (without file extension)
        
        // Convert the Word DOC file to PDF
        $pdfFilePath = $fileConverter->convertToPdf($inputFilePath, $outputFilePath);
        
        // Optionally, you can return the PDF file path or perform other actions
        return $pdfFilePath; // Return the PDF file path to the caller
    }




    public function store()
    {

        
        // Handle form submission and file conversion
        $file = $this->request->getFile('file');
        
        // Check if file is uploaded
        if ($file && $file->isValid() && $file->getType() === 'application/pdf') {
            // Move uploaded file to uploads directory
            $file->move(ROOTPATH . 'public/uploads');
            $filename = $file->getName();
    
            // Logic to convert file to PDF
            $fileConverter = new \App\Libraries\FileConverter();
            $fileConverter->convertToPdf($filename);
    
            // Save data to database
            $questionnaireModel = new \App\Models\ClientQuestionnaireModel();
            $questionnaireModel->save([
                'question_id' => $this->request->getPost('question_id'),
                'answer' => $filename,
                'is_checked' => $this->request->getPost('is_checked')
               
            ]);
    
            // Redirect or show success message
            return redirect()->to('client/questionnaire')->with('success', 'Form submitted successfully.');
        } else {
            // Handle case where file upload fails or file is not a valid PDF
            return redirect()->to('client/questionnaire')->with('error', 'Please upload a valid PDF file.');
        }
    }




public function storeQuestionnaire()
{
    // $userModel = new UserModel();
    // $userId = $userModel->getLoggedInUserId();
    // $userId = $this->request->getPost('user_id');
    $userId = (new UserController())->getLoggedInUserId();
    $model = new UserModel();
    $session = session();
    $userId = $session->get('id');
    $userId = intval($userId);

                // Stroing session values
       //dd($userId);        
      

    // Get the submitted answers and checked checkboxes from the form data
    $answers = $this->request->getPost('answers');
    $isChecked = $this->request->getPost('is_checked');
    // Retrieve the user ID from the session or wherever it's stored
    // $userId = session()->get('user_id'); // Adjust this according to your authentication mechanism


    // Initialize an array to store the data to be inserted into the database
    $dataToInsert = [];

    // Loop through each question and its corresponding answer and checked checkbox
    foreach ($answers as $questionId => $answer) {
        // Prepare the data for insertion into the database
        $data = [
            'question_id' => $questionId,
            'answer' => $answer,
            'is_checked' => isset($isChecked[$questionId]) ? 1 : 0 ,// Check if the checkbox is checked
            'user_id' => $userId
        ];

        // Add the data to the array
        $dataToInsert[] = $data;
    }

    // Handle file upload and conversion
    $file = $this->request->getFile('file');
    //dd($file);
    // Check if file is uploaded
    if ($file && $file->isValid()) {
        // Move uploaded file to temporary directory
        $tempFilePath = WRITEPATH . 'uploads/' . $file->getName();
        dd($tempFilePath);
        $file->move(WRITEPATH . 'uploads', $file->getName());

        // Convert Word DOC to PDF if uploaded file is a DOC
        if ($file->getExtension() === 'doc' || $file->getExtension() === 'docx') {
            // Load the FileConverter library
            $fileConverter = new \App\Libraries\FileConverter();
            
            // Convert Word DOC to PDF
            $pdfFilePath = $fileConverter->convertToPdf($tempFilePath, WRITEPATH . 'uploads/' . pathinfo($file->getName(), PATHINFO_FILENAME));
            
            // Use the PDF file for further processing
            $tempFilePath = $pdfFilePath;
        }

        // Save the file path to the database
        $dataToInsert[] = [
            'question_id' => null, // Adjust as needed
            
            'answer' => $tempFilePath,
           // 'answer' => $this->handleFileUpload($answer),
            'is_checked' => 0 // Assuming file upload doesn't need checkbox
        ];
    }

    // Insert the data into the database using the model
    $questionnaireModel = new \App\Models\ClientQuestionnaireModel();
    $questionnaireModel->insertBatch($dataToInsert);

    // Redirect to a success page or display a success message
    return redirect()->to('client/questionnaire')->with('success', 'Questionnaire submitted successfully.');
}


// Function to handle file upload and return the filename
private function handleFileUpload($file)
{
    // Check if a file was uploaded
    if ($file->isValid() && $file->getType() === 'application/pdf') {
        // Move the uploaded file to the uploads directory
        $newFileName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newFileName);

        // Return the filename to be stored in the database
        return $newFileName;
    }

    // Return null if file upload fails or file is not a valid PDF
    return null;
}


public function fetchQuestionnaire()
{
    // Load the ClientQuestionnaireModel
    $questionnaireModel = new \App\Models\ClientQuestionnaireModel();

    // Fetch all questionnaire data from the database
    $questionnaires = $questionnaireModel->findAll();

    // Load the QuestionModel
    $questionModel = new \App\Models\QuestionModel();

    // Fetch questions based on question IDs from the questionnaire data
    $questions = [];
    foreach ($questionnaires as $questionnaire) {
        // Assuming 'question_id' is the field linking the questionnaire to the question
        $questionId = $questionnaire['question_id'];
        // Fetch question data based on question ID
        $question = $questionModel->find($questionId);
        if ($question) {
            $questions[] = $question;
        }
    }
    $userRole = 'client';
    //$data['userRole'] = $userRole;
    // Pass the questionnaire and question data to the view
    $data = [
        'questionnaire' => $questionnaires,
        'questions' => $questions,
       'userRole' =>$userRole
    ];

    // Load the view and pass the questionnaire and question data
    return view('client/questionnaire_view', $data);
}



public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp,pdf]',
                    'max_size[userfile,100]',
                    'max_dims[userfile,1024,768]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            return view('client/questionnaire', $data);
        }

        $img = $this->request->getFile('userfile');

        if (! $img->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $img->store();

            $data = ['uploaded_fileinfo' => new File($filepath)];

            return view('upload_client/questionnairesuccess', $data);
        }

        $data = ['errors' => 'The file has already been moved.'];

        return view('client/questionnaire', $data);
    }

}
