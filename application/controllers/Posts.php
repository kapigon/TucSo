<?php

class Posts extends CI_Controller{    
	function __construct()
    {
        parent::__construct();
        $this->load->model('PostModel');
    }
	public function index(){
		$data['title'] = 'Lastest Posts';
		
		$data['posts'] = $this->PostModel->get_posts();

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
		
	}
}