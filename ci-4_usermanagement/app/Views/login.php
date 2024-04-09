<?= $this->include('layouts/header.php'); ?>
  <body>
    <div class="container-fluid">
        <div class="row bg-color ">
            <div class="col-md-7 ">
            <img src="<?= base_url('img/login.gif') ?>" class="justify-content-md-center login-img" width="70%" height="60%"/>

</div>


<div class="col-md-5 justify-content-md-center login-frm">

<div class="container-fluid" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="" action="<?= base_url('login') ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-success">SignIn</button>
                    </form>
                    <div class="d-grid">
                    <label for="text"> If Not  Registered Please SignUp</label>
                    <button type="submit" class="btn btn-info"><a href="<?= base_url('register') ?>">SignUp</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



</div>
</div>
<?= $this->section("footer") ?>
<?= $this->endSection() ?>