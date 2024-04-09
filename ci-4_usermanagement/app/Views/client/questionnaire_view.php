<!-- Display questionnaire data in a table -->
<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>
<!-- Page Wrapper -->
<div id="wrapper">
<?= $this->include('layouts/navsidebar.php'); ?>


    
<table class="table" id="Client-tbl">
    <thead>
        <tr class="row">
            <th class="col-md-1 text-center mr-1">ID</th>
            <th class="col-md-4 text-center mr-1">Question</th>
            <th class="col-md-4 text-center mr-1">Question</th>
            <th class="col-md-2 text-center mr-1">Answer</th>
            <th class="col-md-1 text-center mr-1">User_id</th>
            <!-- Add more headers if needed -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($questionnaire as $row): ?>
            <tr class="row ml-2">
                <td class="col-md-1 form-control text-center p-6"><?= $row['id'] ?></td>
                
                <!-- Access the associated questions for the current questionnaire -->
                <?php foreach ($questions as $question): ?>
                    <?php if ($question['id'] == $row['question_id']): ?>
                        <td class="col-md-4 form-control text-center p-6"><?= $question['question'] ?></td>
                        <!-- Add more cells for additional question attributes -->
                    <?php endif; ?>
                <?php endforeach; ?>
                <td class="col-md-2 form-control text-center p-6"><?= $row['answer'] ?></td>
                <td class="col-md-1 form-control text-center p-6"><?= $row['user_id'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

                    </div>
                    <?= $this->endSection() ?>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>