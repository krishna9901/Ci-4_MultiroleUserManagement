<?= $this->include('layouts/header.php'); ?>
  <body>
    <div class="container-fluid">
        <div class="row bg-color ">
            <div class="col-md-7 ">
            <img src="<?= base_url('img/login.gif') ?>" class="justify-content-md-center login-img" width="70%" height="60%"/>

</div>

<div class="col-md-5 justify-content-md-center login-frm">
<div class="container-fluid">
       
            <div class="col-12">
                <h2>Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/Register/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="phone_no" placeholder="Phone Number" value="<?= set_value('phone') ?>" class="form-control">
                 </div>
                    <div class="form-group mb-3">
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="client">Client</option>
                    </select>
                </div>
                    <div class="d-grid text-left">
                        <button type="submit" class="btn btn-info">SignUp</button>
                    </div>
                    
                </form>
                <div class="d-grid text-right">
                <label class="">If You are already Register </label>
                      <a href="<?php echo base_url(); ?>/login"><button type="submit" class="btn btn-success text-right">SignIn</button>
              </a>
                  </div>
           
        </div>
    </div>


</div>
</div>
</div>

<?= $this->section("footer") ?>
<?= $this->endSection() ?>