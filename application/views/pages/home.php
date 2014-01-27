<?php 
  $mouth_image_attrs = array(
    'src' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVFF2WRnkGGom8RFNbqKb5P8SQ76Nu042ntbEdSmRkDDC5Y8Ovdw',
    'alt' => '',
    'id' => 'user_profile_thumb',
    'class' => 'img-circle fileinput-button',
    'width' => '200',
    'height' => '200',
    'style' => 'margin-top: 6px;'
  );
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<?php echo img($mouth_image_attrs); ?>
		<h2>Hello, This is <?php echo site_name(); ?>!</h2>
		<h2>Just write down what you want to say...</h2>
		<br>
		<?php echo anchor('/blogs/create', '&nbsp;&nbsp;Go!&nbsp;&nbsp;', array('class' => 'btn btn-primary btn-lg')); ?>
	</div>
</div>	