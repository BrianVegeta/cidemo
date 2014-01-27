<?php
if ( ! function_exists('need_login'))
{
  function need_login()
  {
  	$CI =& get_instance();
		if ($message = $CI->session->flashdata('message')) {
			$CI->load->view('auth/general_message', array('message' => $message));
		} else {
			redirect('/auth/login/');
		}
  }
}