<?php
$title = array(
	'name'	=> 'title',
	'id'	=> 'login',
	'value' => set_value('title'),
	'class' => 'form-control',
	'placeholder' => 'Title'
);
$text = array(
	'name'	=> 'text',
	'id'	=> 'ckeditor',
	'class' => 'form-control'
);
?>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
	<?php $form_error_title = form_error($title['name']); ?>
	<div class="form-group <?php if (isset($errors[$title['name']]) OR !empty($form_error_title)) echo 'has-error'; ?>">
		<?php echo form_label('Title', $title['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-6">
    	<?php echo form_input($title); ?>
    	<?php if (isset($errors[$title['name']]) OR !empty($form_error_title)): ?>
		  	<span class="help-block"><?php echo $form_error_title; ?><?php echo isset($errors[$title['name']]) ? $errors[$title['name']] : ''; ?></span>
		  <?php endif; ?>	
    </div>
  </div>
  <?php $form_error_text = form_error($text['name']); ?>
  <div class="form-group <?php if (isset($errors[$text['name']]) OR !empty($form_error_text)) echo 'has-error'; ?>">
		<?php echo form_label('Content', $text['id'], array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-6">
    	<?php echo form_textarea($text); ?>
    	<?php echo display_ckeditor($ckeditor); ?>
    	<?php if (isset($errors[$text['name']]) OR !empty($form_error_text)): ?>
		  	<span class="help-block"><?php echo $form_error_text; ?><?php echo isset($errors[$text['name']]) ? $errors[$text['name']] : ''; ?></span>
		  <?php endif; ?>	
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Post</button>
    </div>
  </div>
<?php echo form_close(); ?>