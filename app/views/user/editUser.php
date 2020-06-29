<?= $this->getCSS(); ?>
<div class="container py-2">
    <div class="row  my-2">
        <div class="col-lg-4">
            <h2 class="text-center font-weight-light">User profile</h2>
        </div>
        <div class="col-lg-8">
            <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user. </div>
        </div>
        <div class="col-lg-8 order-lg-1 personal-info">
            <form role="form">
            <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="Jane" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="Bishop" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="email" value="email@gmail.com" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">User type</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="url" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="" placeholder="Street" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-6">
                        <input class="form-control" type="text" value="" placeholder="City" />
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="text" value="" placeholder="State" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="password" value="11111122333" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="password" value="11111122333" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-9 ml-auto text-right">
                        <input type="reset" class="btn btn-outline-secondary" value="Cancel" />
                        <input type="button" class="btn btn-primary" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 order-lg-0 text-center">
            <img src="/public/img/user.png" class="mx-auto img-fluid rounded-circle" alt="avatar" id="profilePic" />
            <h6 class="my-4">Upload a new photo</h6>
            <div class="input-group px-xl-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-secondary"><i class="fa fa-upload"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>