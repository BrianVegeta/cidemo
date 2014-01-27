<html>
<head>
	<title><?php if (isset($title)) echo $title . '&nbsp;-'; ?> <?php echo site_name(); ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <link href="/css/jquery.fileupload.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="/"><?php echo site_name(); ?></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="<?php echo check_current_uri('active', ''); ?>"><a href="/">Home</a></li>
          <li class="<?php echo check_current_uri('active', 'blogs'); ?>"><?php echo anchor('/blogs', 'Posts'); ?></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if ($this->tank_auth->is_logged_in()): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo profile_username(); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('/#', 'action..'); ?></li>
                <li class="divider"></li>
                <li><?php echo anchor('/auth/logout', 'Logout'); ?></li>
              </ul>
            </li>
            <li>
              <?php $profile_thumb = profile_thumb(); ?>
              <?php 
                $image_properties = array(
                  'src' => $profile_thumb,
                  'alt' => '',
                  'id' => 'user_profile_thumb',
                  'class' => 'img-circle fileinput-button',
                  'width' => '40',
                  'height' => '40',
                  'style' => 'margin-top: 6px;'
                );
              ?>
              <span id="fileupload">
                <?php echo form_open_multipart('profile/do_upload', array('style' => 'margin-bottom: 0;'));?>
                  <span class="fileinput-button">
                    <?php echo img($image_properties); ?>
                    <input type="file" name="userfile" multiple style="height: 40px;font-size: 0;">
                  </span>
                <?php echo form_close(); ?>
              </span>
            </li>
          <?php else: ?>
            <li>
              <?php echo anchor('/auth/login', 'Login'); ?>
            </li>
          <?php endif; ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>

  </nav>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div style="min-height: 500px;">