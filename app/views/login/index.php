<?= $this->getJS(); ?>
<?= $this->getCSS();?>
<div class="container-fluid">
  <ul class="nav nav-tabs" role="tablist" id="userTab">
    <li class="nav-item active">
      <a class="nav-link active" role="tab" data-toggle="tab" href="#signin" style="color:rgb(201, 150, 150);" aria-selected="true">Sign in</a>
    </li>
    <li class="nav-item">
      <a onclick="" class="nav-link" role="tab" data-toggle="tab" href="#register" style="color:rgb(201, 150, 150);" aria-selected="false">Register</a>
    </li>
  </ul>

  <div onload="loadSignIn()" class="tab-content">
    <div class="tab-pane fade in" id="signin">
      <title>Sign in</title>
      <br>
        <form method="POST" action="<?=$this->makeUrl("Login/login"); ?>">
            <div class="row justify-content-center text-left">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-lbl" style="right: 250px;"for="InputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label class="form-lbl" for="InputPassword">Password</label>
                        <input name="password" type="password" class="form-control" id="InputPassword">
                    </div>
                    <div class="form-group">
                        <input name="crsf_token" type="hidden" value="<?= app\utils\Token::generate(); ?>"/>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remeberCheck">Remeber me?</label>
                    </div>
                    <button style="color: white;" type="submit" class="btn">Sign in</button>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade in" id="register">
      <br>
        <title>Register</title>
          <form method="POST" action="<?=$this->makeUrl("Login/register"); ?>">
              <div class="row justify-content-center text-left">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-lbl" style="right: 250px;"for="name">Name:</label>
                          <input name="name" type="text" class="form-control" id="name">
                      </div>
                      <div class="form-group">
                          <label class="form-lbl" style="right: 250px;"for="surname">Surname:</label>
                          <input name="surname" type="text" class="form-control" id="surname">
                      </div>
                      <div class="form-group">
                          <label class="form-lbl" style="right: 250px;"for="userType">User type:</label>
                          <select name="type" class="custom-select" id="userTypeSelect">
                            <option selected>Choose...</option>
                            <option value="Student">Student</option>
                            <option value="Bussines">Bussines</option>
                            <option value="Personsal">Personal</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label class="form-lbl" style="right: 250px;"for="InputEmail">Email address:</label>
                          <input name="regEmail" type="email" class="form-control" id="InputEmail">
                      </div>
                      <div class="form-group">
                          <label class="form-lbl" for="InputPasswordregister">Password:</label>
                          <input name="regPassword" data-toggle="popover" data-trigger="focus" title="Important" data-content="Password should be at least 6 characters long!" type="password" type="password" class="form-control" id="InputPasswordregister">
                          <br>
                          <div class="progress">
                            <div id="danger" class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div id="warning" class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div id="success" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="form-lbl" for="InputPasswordregisterRepeat">Confirm password:</label>
                          <input name="regPasswordRepeat" type="password" class="form-control" id="InputPasswordregisterRepeat">
                      </div>
                      <div class="form-group">
                        <input name="crsf_token" type="hidden" value="<?= app\utils\Token::generate(); ?>"/>
                      </div>
                      <div class="form-group form-check text-center">
                        <input type="checkbox" class="form-check-input" name="news" id="newsCheck">
                        <label class="form-check-label" for="newsCheck">I want to get news on my e-mail address</label>
                      </div>
                      <div class="form-group form-button text-center">
                        <button type="submit" id="regBtn" class="btn">Register</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>