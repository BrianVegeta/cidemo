<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'class' => 'form-control',
		'placeholder' => 'Username',
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'class' => 'form-control',
	'placeholder' => 'Email Address',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'form-control',
	'placeholder' => 'Password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'class' => 'form-control',
	'placeholder' => 'Confirm password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
	<?php if ($use_username) { ?>
		<?php $form_error_username = form_error($username['name']); ?>
		<div class="form-group <?php if (isset($errors[$username['name']]) OR !empty($form_error_username)) echo 'has-error'; ?>">
			<?php echo form_label('Username', $username['id'], array('class' => 'col-sm-2 control-label')); ?>
	    <div class="col-sm-4">
	    	<?php echo form_input($username); ?>
	    	<?php if (isset($errors[$username['name']]) OR !empty($form_error_username)): ?>
			  	<span class="help-block"><?php echo $form_error_username; ?><?php echo isset($errors[$username['name']]) ? $errors[$username['name']] : ''; ?></span>
			  <?php endif; ?>	
	    </div>
	  </div>
	<?php } ?>  
	<?php $form_error_email = form_error($email['name']); ?>
	<div class="form-group <?php if (isset($errors[$email['name']]) OR !empty($form_error_email)) echo 'has-error'; ?>">
		<?php echo form_label('Email Address', $email['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
    	<?php echo form_input($email); ?>
    	<?php if (isset($errors[$email['name']]) OR !empty($form_error_email)): ?>
		  	<span class="help-block"><?php echo $form_error_email; ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></span>
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
  <?php $form_error_confirm_password = form_error($confirm_password['name']); ?>
	<div class="form-group <?php if (isset($errors[$confirm_password['name']]) OR !empty($form_error_confirm_password)) echo 'has-error'; ?>">
		<?php echo form_label('Confirm Password', $confirm_password['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-4">
    	<?php echo form_password($confirm_password); ?>
    	<?php if (isset($errors[$confirm_password['name']]) OR !empty($form_error_confirm_password)): ?>
		  	<span class="help-block"><?php echo $form_error_confirm_password; ?><?php echo isset($errors[$confirm_password['name']]) ? $errors[$confirm_password['name']] : ''; ?></span>
		  <?php endif; ?>	
    </div>
  </div>
<table>
	<?php if ($captcha_registration) {
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
</table>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
<?php echo form_close(); ?>