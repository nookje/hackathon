<div class="content">
<h3>Login</h3>
<?php if (isset($login_error)) { ?>
	<div class="alert alert-error">Emailul sau parola sunt gresite</div>
<?php } ?>
<form class="form-horizontal"  method="post" action="/login" >
  <div class="control-group">
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" name="email" <?php if (isset($email)) { ?> value="<?=$email?>" <?php } ?>/>
    </div>
  </div>
  <br />
  <div class="control-group">
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="password" >
    </div>
  </div>
  <br />
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Login</button>
    </div>
  </div>
</form>
</div>