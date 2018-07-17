<?php

class Buddhas extends CI_Controller{    
    function __construct()
    {
        parent::__construct();
        $this->load->model('BuddhaModel');
        $this->load->library('myclass');
    }
	public function index($offset = 0){
            // Pagination
            $config['base_url'] = base_url() . 'Buddhas/index/';
            $config['total_rows'] = $this->db->count_all('Buddhas');
            $config['per_page'] = 6;
            $config['uri_segment'] = 3;
            $config['attributes'] = array('class' => 'pagination-links');

            $this->pagination->initialize($config);
            $data['title'] = 'Lastest Buddhas';           
            
            $data['Buddhas'] = $this->BuddhaModel->get_Buddhas(FALSE, $config['per_page'], $offset);

            $this->load->view('templates/header');
            $this->load->view('Buddhas/index', $data);
            $this->load->view('templates/footer');
		
	}
	public function view($slug = NULL){
            $data['Buddha'] = $this->BuddhaModel->get_Buddhas($slug);

            if(empty($data['Buddha'])){
                show_404();
            }

            $data['title'] = $data['Buddha']['Name'];
            
            $this->load->view('templates/header');
            $this->load->view('Buddhas/view', $data);
            $this->load->view('templates/footer');
	}

	public function create(){
            // Check session
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            $data['title'] = "Create Buddhas";

            $this->form_validation->set_rules('Name', 'Tên vị Phật', 'required');
            $this->form_validation->set_rules('ChungTu', 'Chủng tự', 'required');
            $this->form_validation->set_rules('ChanNgonTiengPhan', 'Chan Ngôn Tiếng Phạn', 'required');
            $this->form_validation->set_rules('ChanNgonTiengViet', 'Chan Ngôn Tiếng Viet', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('Buddhas/create', $data);
                $this->load->view('templates/footer');
            }
            else{
                // Upload Image
                $config['upload_path'] = './customs/images/Buddhas';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('HinhAnh')){
                        $errors = array('error' => $this->upload->display_errors());
                        $buddha_image = 'noimage.jpg';
                } else {
                        $data = array('upload_data' => $this->upload->data());
                        $buddha_image = $_FILES['HinhAnh']['name'];
                }
                
                $slug = $this->myclass->vn_to_str($this->input->post('Name'));
                
                $this->BuddhaModel->create_Buddha($buddha_image, $slug);
                
                // Set message
                $this->session->set_flashdata('Buddha_update', 'Thêm mới thành công.!');
                
                redirect('Buddhas');
            }
	}
        
        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            if($this->session->userdata('role_id')){
                $this->BuddhaModel->delete_Buddha();
                redirect('Buddhas');
            }
        }
        
        public function edit($slug){
            $data['Buddha'] = $this->BuddhaModel->get_Buddhas($slug);
            if(empty($data['Buddha'])){
                show_404();
            }

            $data['title'] = $data['Buddha']['Name'];
            $this->load->view('templates/header');
            $this->load->view('Buddhas/edit', $data);
            $this->load->view('templates/footer');
        }
        
        public function update(){
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            
            // Upload Image
            $config['upload_path'] = './customs/images/Buddhas';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('HinhAnh')){
                $errors = array('error' => $this->upload->display_errors());
            } else {
                    $data = array('upload_data' => $this->upload->data());
                $buddha_image = $_FILES['HinhAnh']['name'];
            }
            
            $slug = $this->myclass->vn_to_str($this->input->post('Name'));
            
            $this->BuddhaModel->update_Buddha($buddha_image, $slug);
            
            // Set message
            $this->session->set_flashdata('Buddha_update', 'Bạn đã cập nhật thành công.!');
            
            redirect('Buddhas');
        }
}