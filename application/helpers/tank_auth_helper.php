<?php
if ( ! function_exists('need_login'))
{
  function need_login()
  {
  	$CI =& get_instance();
  	if ($CI->tank_auth->is_logged_in() == false) {
  		redirect('/auth/login/');
  	}
  }
}