<?= $this->getCSS(); ?>
<?= $this->getJS(); ?>
<div class="container py-2">
    <div class="row  my-2">
        <div class="col-lg-4">
            <h2 class="text-center font-weight-light">User profile</h2>
        </div>
        <div class="col-lg-8">
            <a href="<?= $this->makeURL("User/dash/{$this->user->ID}") ?>" class="btn btn-secondary" style="color:white; border:none;">Dashboard</a>
        </div>
        <br>
        <div class="col-lg-8 order-lg-1 personal-info">
            <form action="<?= $this->makeUrl("User/updateuser/{$this->user->ID}"); ?>" role="form" method="POST">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                    <div class="col-lg-9">
                        <input name="name" class="form-control" type="text" value="<?= $this->user->Name; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                    <div class="col-lg-9">
                        <input name="surname" class="form-control" type="text" value="<?= $this->user->Surname; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input name="email" class="form-control" type="email" value="<?= $this->user->Email; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                    <div class="col-lg-9">
                        <input name="company" class="form-control" type="text" value="<?= $this->user->Company; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">User type</label>
                    <div class="col-lg-9">
                        <input name="usertype" class="form-control" type="text" value="<?= $this->user->Type; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                    <div class="col-lg-9">
                        <input name="website" class="form-control" type="url" value="<?= $this->user->Website; ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                        <input name="address" class="form-control" type="text" value="<?= $this->user->Address; ?>" placeholder="Street" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-6">
                        <input name="city" class="form-control" type="text" value="<?= $this->user->City; ?>" placeholder="City" />
                    </div>
                    <div class="col-lg-3">
                        <input name="state" class="form-control" type="text" value="<?= $this->user->State; ?>" placeholder="State" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        <input id="password1" name="password" class="form-control" type="password" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                        <input id="password2" class="form-control" type="password" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-9 ml-auto text-right">
                        <button class="btn btn-secondary">Cancel</button>
                        <button id="save" class="btn">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 order-lg-0 text-center">
            <?= $this->getIMG(); ?>
            <h6 class="my-4">Upload a new photo</h6>
            <form method="POST" enctype="multipart/form-data" action="<?= $this->makeURL("User/uploadProfilePictrue/{$this->user->ID}"); ?>">
                <div class="input-group px-xl-4">
                    <div class="custom-file">
                        <input name="file" type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-upload"></i></button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>