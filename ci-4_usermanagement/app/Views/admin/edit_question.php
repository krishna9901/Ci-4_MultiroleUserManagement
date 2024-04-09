<!-- app/Views/admin/edit_question.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


<div class="container-fluid">
    <h1>Edit Question</h1>
    
    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Edit Questions Form</div>
                 <div class="col text-right">
                     
                 </div>
             </div>
         </div>
    
         <div class="card-body">

    <form action="<?= route_to('admin.dashboard.update', $question['id']) ?>" method="post">
  
<div class="form-group mb-3">
        <input type="hidden" class="form-control" name="_method" value="PUT">
        <label for="question">Question:</label>
        <input type="text" id="question" class="form-control" name="question" value="<?= $question['question'] ?>">
        </div>
<div class="form-group mb-3">
        <label for="question_type">Question Type:</label>
        <input type="text" id="question_type"  class="form-control" name="question_type" value="<?= $question['question_type'] ?>">
        </div>
<div class="form-group mb-3">
        <label for="answer">Answer:</label>
        <input type="text" id="answer" class="form-control" name="answer" value="<?= $question['answer'] ?>">
        </div>
<div class="form-group mb-3 text-right">
        <button type="submit" class="btn btn-info">Update Question</button>
        </div>

    </form>


    </div>

</div> <!--card-->
</div>










    </div> <!--wrapper end div -->
<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>