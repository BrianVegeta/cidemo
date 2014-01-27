<?php 
  $image_properties = array(
    'alt' => '',
    'width' => '50',
    'height' => '50',
    'style' => 'margin-top: 6px;'
  );
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="row" style="background-color: #f7f7f9; margin-bottom: 30px; border: 1px solid #e1e1e8; border-radius: 4px;">
			<div class="col-md-12">
				<h3>
					<?php echo anchor('/blogs/create', 'Say', array('class' => 'btn btn-primary btn-lg')); ?> what you want...
				</h3>
			</div>
		</div>
		<?php foreach ($blogs as $blog): ?>
			<div class="row" style="background-color: #f7f7f9; margin-bottom: 30px; border: 1px solid #e1e1e8; border-radius: 4px;">
				<div class="col-md-3">
					<div class="pull-left">
						<?php $image_properties['src'] = profile_thumb($blog['user_id']); ?>
						<?php $image_properties['class'] = "img-circle fileinput-button post_user_thumb_{$blog['user_id']}"; ?>
						<?php echo img($image_properties); ?>
					</div>
					<div style="margin-left: 60px;padding-top: 16px;padding-left: 10px;">
						<span style="font-size: 16px;font-weight: 500;">
							<?php echo profile_username($blog['user_id']); ?>
						</span>
						said:
					</div>
				</div>
				<div class="col-md-9">
					<h2><?php echo $blog['title']; ?></h2>
					<hr>
					<div>
						<?php echo $blog['text']; ?>
					</div>
					<hr>
					<div class="pull-right">
						<span style="color: #999; ">
							<?php echo timespan(human_to_unix($blog['created_at']), time()) . ' ago'; ?>
						</span>
						<br>
						<br>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>	
</div>