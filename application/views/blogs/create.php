<?php echo validation_errors(); ?>
<?php echo form_open('blogs/create'); ?>
	<label for="title">Title</label>
	<input type="input" name="title" />
	<br>
	<label for="text">Content</label>
	<textarea name="text" id="ckeditor" ></textarea>
	<?php echo display_ckeditor($ckeditor); ?>
	<br>

	<input type="submit" name="submit" value="Create" />

</form>