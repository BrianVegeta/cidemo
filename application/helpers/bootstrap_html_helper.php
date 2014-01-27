<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_current_url'))
{
  function check_current_uri($class, $uri_string)
  {
		$CI =& get_instance();
    if ($CI->uri->uri_string() == $uri_string) {
    	return $class;
    }
  }
}