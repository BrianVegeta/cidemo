<?php

if ( ! function_exists('profile_thumb'))
{
  function profile_info()
  {
		$CI =& get_instance();
		$CI->load->model('tank_auth/users','foo');
    $user_id = $CI->tank_auth->get_user_id();
		$data = $CI->foo->get_profile_by_id($user_id);
		return $data;
  }
}