<!-- app/Views/client/questionnaire.php -->

<!-- app/Views/admin/create_question.php -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


    
<form action="<?= route_to('client.questionnaire.store') ?>" method="post" >
    <table class="table" id="client-qtntble">
        <!-- <thead>
            <tr class="row ">
                <th class="col-md-1 text-center mr-1">ID</th>
                <th class="col-md-5 text-center mr-1">Question</th>
                <th class="col-md-5 text-center mr-1">Answer</th>
                <th class="col-md-1 text-center mr-1"></th>
            </tr>
        </thead> -->
        <tbody>
            <?php foreach ($questions as $question): ?>
                <tr class="row ml-2">
                    <td class="col-md-1 form-control text-center" ><?= $question['id'] ?></td>
                    <td class="col-md-5 form-control text-center" ><?= $question['question'] ?></td>
                    <td class="col-md-5 text-center ">
                        <?php if ($question['question_type'] === 'Text'): ?>
                            <input type="text" class="form-control text-center" placeholder="Enter name" name="answers[<?= $question['id'] ?>]">
                        <?php elseif ($question['question_type'] === 'Yes/No'): ?>
                            <select class="form-control" name="answers[<?= $question['id'] ?>]">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <?php elseif ($question['question_type'] === 'Date-Field'): ?>
                            <input type="date" class="form-control" name="answers[<?= $question['id'] ?>]">
                        <?php elseif ($question['question_type'] === 'Link-Upload'): ?>
                            <input type="text" class="form-control text-center" placeholder="Paste the link" name="answers[<?= $question['id'] ?>]">
                            <!-- <a href="#" target="_blank" style="font-size:10px;">View</a> -->
                        <?php elseif ($question['question_type'] === 'File-Upload'): ?>
                            <input type="file" class="form-control-file text-center" name="answers[<?= $question['id'] ?>]" size="20">
                         
                        
                            <?php endif; ?>

                    </td>
                    <td class="col-md-1 ">
                        <input type="checkbox" name="is_checked[<?= $question['id'] ?>]">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-right mr-4">
    <button type="submit" class="btn btn-primary ">Submit Answers</button>
                        </div>
</form>


                </div><!--wrapper-->
                <?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>