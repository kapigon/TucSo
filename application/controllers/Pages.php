<?php

class Pages extends CI_Controller{
    /*function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    } */
    
	public function view($page = 'home'){
		if(!file_exists(APPPATH . 'views/pages/'. $page . '.php')){
			//show_404();
		}	
		
		$data['title'] = ucfirst($page);
		
		$this->load->view('templates/header');
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
		
	}
}