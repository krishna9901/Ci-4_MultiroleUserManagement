<!-- app/Views/admin/create_question.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>

<div class="row k-btns text-center ml-2">
<div class=" text-center ">
<a href="<?= route_to('admin.dashboard.create') ?>" class="btn btn-info  m-1">Add New Question</a>
</div>
<div class=" text-center">
<a herf="#"  class=" btn btn-info m-1">SAVE</a>
</div>
<div class=" text-center">
<a herf="#"  class=" btn btn-info m-1">BACK</a>
</div>

</div>


    <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col">Manage Questions </div>
                 <div class="col text-right">
             <a href="<?= route_to('admin.dashboard.create') ?>" class="btn btn-secondary btn-sm">Add New Question</a>
                 </div>
            
                </div>
         </div>
    
         <div class="card-body">


   

    <table id="qtn-tbl" >
        <thead>
            <tr class="row">
                <th class="col-md-1 text-center mr-1">ID</th>
                <th class="col-md-7 text-center mr-1" >Question</th>
                <th class="col-md-2 text-center mr-1">Question Type</th>
                <!-- <th class="col-md-3 text-center mr-1">Answer</th> -->
                <th class="col-md-1 text-center mr-1">Edit</th>
                <th class="col-md-1 text-center mr-1">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr class="row">
                <td class="col-md-1 form-control text-center mr-1"><i class="fas fa-list pr-2"></i><?= $question['id'] ?></td>
                <td class="col-md-7 form-control text-center mr-1"><?= $question['question'] ?></td>
                <td class="col-md-2 form-control text-center mr-1"><?= $question['question_type'] ?></td>
                <!-- <td class="col-md-3 form-control text-center mr-1"><?= $question['answer'] ?></td> -->
                <td class="col-md-1 form-control text-center mr-1">
                    <a href="<?= route_to('admin.dashboard.edit', $question['id']) ?>"><i class="fas fa-edit"></i></a>
            </td>
             <td class="col-md-1 text-center mr-1"> 
            <form action="<?= route_to('admin.dashboard.destroy', $question['id']) ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="form-control "><i class="fas fa-trash"></i></button>
                    </form>
                </td >
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


   
</div> <!--card-->
</div>







    </div> <!--wrapper end div -->


<?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>