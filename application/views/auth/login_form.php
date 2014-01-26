<?php
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or Username';
} else if ($login_by_username) {
	$login_label = 'Username';
} else {
	$login_label = 'Email';
}
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class' => 'form-control',
	'placeholder' => $login_label,
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'password'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember')
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
	<?php $form_error_login = form_error($login['name']); ?>
	<div class="form-group <?php if (isset($errors[$login['name']]) OR !empty($form_error_login)) echo 'has-error'; ?>">
		<?php echo form_label($login_label, $login['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
    	<?php echo form_input($login); ?>
    	<?php if (isset($errors[$login['name']]) OR !empty($form_error_login)): ?>
		  	<span class="help-block"><?php echo $form_error_login; ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></span>
		  <?php endif; ?>	
    </div>
  </div>
  <?php $form_error_password = form_error($password['name']); ?>
  <div class="form-group <?php if (isset($errors[$password['name']]) OR !empty($form_error_password)) echo 'has-error'; ?>">
  	<?php echo form_label('Password', $password['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
    	<?php echo form_password($password); ?>
    	<?php if (isset($errors[$password['name']]) OR !empty($form_error_password)): ?>
		  	<span class="help-block"><?php echo $form_error_password; ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></span>
		  <?php endif; ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <div class="checkbox">
      	<div class="pull-right">
	      	<?php //echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
					<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
	      </div>
        <label>
        	<?php echo form_checkbox($remember); ?> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
<table>

	<!-- captcha start-->
	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
	<!-- captcha end-->
</table>
<?php echo form_close(); ?>