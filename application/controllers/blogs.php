<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends CI_controller {

	public $data 	= 	array();
 
	public function __construct() {
 
		parent::__construct();
 
		$this->load->helper('ckeditor');
 
 
		//Ckeditor's configuration
		$this->data['ckeditor'] = array(
 
			//ID of the textarea that will be replaced
			'id' 	=> 	'ckeditor',
			'path'	=>	'js/ckeditor',
 
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'360px',	//Setting a custom height
 
			),
 
			//Replacing styles from the "Styles tool"
			'styles' => array(
 
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 	=> 	'Blue',
						'font-weight' 	=> 	'bold'
					)
				),
 
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 	=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 		=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);

		$this->load->model('blogs_model');
	}
		
	public function index() 
	{
		$data['blogs'] = $this->blogs_model->get_blogs();

		$data['title'] = 'Blogs';
		$this->load->view('templates/header', $data);
		$this->load->view('blogs/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		need_login();
		$this->load->library('form_validation');
		$data = $this->data;
		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');

		if ($this->form_validation->run() === false) {
			$this->load->view('templates/header', $data);
			$this->load->view('blogs/create', $data);
			$this->load->view('templates/footer');
		} else {
			$user_id = $this->tank_auth->get_user_id();
			$this->blogs_model->set_blogs($user_id);
			redirect('/blogs');
		}
	}
}