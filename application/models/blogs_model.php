<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs_model extends CI_model {

	public function __construct() 
	{
		$this->load->database();
	}

	public function get_blogs()
	{
		$this->db->order_by("id", "desc");
		$query = $this->db->get('blogs');
		return $query->result_array();
	}

	public function set_blogs($user_id)
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', true);
		$data = array(
			'user_id' => $user_id,
			'title' => $this->input->post('title'),
			'slug' =>$slug,
			'text' => $this->input->post('text'),
			'created_at' => date('Y-m-d H:i:s')
		);

		return $this->db->insert('blogs', $data);
	}
}