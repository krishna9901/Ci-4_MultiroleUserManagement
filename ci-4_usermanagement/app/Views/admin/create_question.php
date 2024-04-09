<!-- app/Views/admin/create_question.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


<div class="container-fluid">

    <h1>Manage Question</h1>

    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Questions Form</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">
    <form action="<?= route_to('admin.dashboard.store') ?>" method="post">
        
    <div class="form-group mb-3">
    <label for="question">Question:</label>
        <input type="text" class="form-control" id="question" name="question">
</div>
<div class="form-group mb-3">
        <label for="question_type">Question Type:</label>
        <select id="question_type" class="form-control" name="question_type">
            <option value="Text">Text</option>
            <option value="Link-Upload">Link Upload</option>
            <option value="File-Upload">File Upload</option>
            <option value="Date-Field">Date Field</option>
            <option value="Yes/No">Yes/No</option>
        </select>
        </div>
<div class="form-group mb-3">
        <label for="answer">Answer:</label>
        <input type="text" class="form-control" id="answer" name="answer">
        </div>
<div class="form-group mb-3 text-right">
        <button type="submit" class="btn btn-success">Add Question</button>
        </div>
 
    </form>
    </div>

</div> <!--card-->
</div>







    </div> <!--wrapper end div -->
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>
