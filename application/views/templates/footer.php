		</div>
        <hr>
		<footer>
	      <p class="pull-right"><a href="#">Back to top</a></p>
	      <p>&copy; <?php echo site_name(); ?>, Inc.  <a href="#">Privacy</a>  <a href="#">Terms</a></p>
	    </footer>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.ui.widget.js"></script>
    <script src="/js/jquery.fileupload.js"></script>
    <script>
		$(function () {
			$('#fileupload').fileupload({
                dataType: 'json',
                add: function (e, data) {
                  data.submit();
                },
                done: function (e, data) {
                	$('#user_profile_thumb').attr('src', 'http://cidemo.dev/uploads/' + data.result.thumb);
                    $('.post_user_thumb_<?php echo user_id(); ?>').attr('src', 'http://cidemo.dev/uploads/' + data.result.thumb);
                }
        	});
		});

		</script>
    </body>
</html>
