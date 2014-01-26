<?php

if ( ! function_exists('profile_thumb'))
{
  function profile_thumb()
  {
		$CI =& get_instance();
		$CI->load->model('tank_auth/users','foo');
    $user_id = $CI->tank_auth->get_user_id();
		$data = $CI->foo->get_profile_by_id($user_id);
		return _check_thumb_exist($data);;
  }

  function _check_thumb_exist($data)
  {
  	if (is_null($data->thumb)) {
  		return 'http://cdn0.sbnation.com/images/verge/default-avatar.v9899025.gif';
  	}
  	return 'uploads/' . $data->thumb;
  	
  }
}

if ( ! function_exists('profile_username'))
{
  function profile_username()
  {
		$CI =& get_instance();
		$CI->load->model('tank_auth/users','foo');
    $user_id = $CI->tank_auth->get_user_id();
		$data = $CI->foo->get_user_by_id($user_id, true);
		return $data->username;
  }
}