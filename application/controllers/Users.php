<?php

class Users extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('form_validation');
    }
    
    public function view($sign = 'signIn'){
        if(!file_exists(APPPATH . 'views/users/'. $sign . '.php')){
                //show_404();
        }	

        $data['title'] = ucfirst($sign);

        $this->load->view('templates/header');
        $this->load->view('users/' . $sign, $data);
        $this->load->view('templates/footer');

    }
	
    public function index(){
        $this->load->view('users/SignIn');
    }
    
    // Register User mới
    public function register(){
        
        // Get All danh sách quyền
        $data['roles'] = $this->UserModel->get_roles();
        
        // Check dữ liệu đầu vào
        $this->form_validation->set_rules('username', 'Tên truy cập', 'required|callback_checkUser');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required');
        //$this->form_validation->set_rules('re-password', 'Mật khẩu nhắc lại', 'required|callback_checkPass');
        $this->form_validation->set_rules('re-password', 'Mật khẩu nhắc lại', 'matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_checkEmail');
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        }else{
           
            // Create user
            $this->UserModel->create_User();
            
            // Set message
            $this->session->set_flashdata('user_registered', 'Bạn đã đăng ký thành công.! Hãy đăng nhập vào hệ thống...');
            
            redirect('Users/View/login');
            /*if($this->UserModel->createUser($data) > 0) {
                redirect('Users/View/SignIn');
            }
            else{
                //$this->load->view('users/signUp');
                $this->view('SignUp');
            }*/
        }
    }
    
    // Login 
    public function login(){
        $data['title'] = 'Đăng nhập';
        
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        }else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user_login = $this->UserModel->login($username, $password);

            if($user_login){
                // create session
                $user_data = array(
                    'user_id'   => $user_login->ID,
                    'user_role' => $user_login->RoleId,
                    'username'  => $username,
                    'logged_in' => true,
                );
                
                $this->session->set_userdata($user_data);
                //die("success");
                
                // Set message
                $this->session->set_flashdata('user_loggedin', 'Bạn đã đăng nhập thành công.!');
                redirect('');
            }else{                
                 // Set message
                $this->session->set_flashdata('login_falied', 'Lỗi đăng nhập!');
                
                redirect('users/login');
            }
        }   
    }
    
    # LogOut
    public function logOut(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_role');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        
        // Set message
        $this->session->set_flashdata('user_loggedout', 'Bạn đã thoát ra khỏi tài khoản.!');
        
        redirect('users/Login');
    }
         
    # Check Định dạng username và kiểm tra User tồn tại không
    public function checkUser(){
        $username = $this->input->post('username');
        if (preg_match('/^[A-Za-z0-9_]+$/', $username)) 
        {
            # Check User có tồn tại không?
            if($this->UserModel->isExistUser($username)) {
                $this->form_validation->set_message('checkUser','Tên truy nhập "' . $username . '" đã tồn tại.');
                return false;
            }
            else{
                $this->form_validation->set_message('checkUser','Đăng ký thành công.');
                return true;
            }
        }
        else
        {
            $this->form_validation->set_message('checkUser','Tên truy nhập không được có các ký tự đặc biệt và khoảng trống.');
            return false;
        }
    }
    
    # Check Email
    public function checkEmail(){
        $email = $this->input->post('email');
        
        if (preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email)) 
        {
            // Set message
            $this->form_validation->set_message('checkEmail','Email "' . $email . '" đã được đăng ký.');
            
            if($this->UserModel->isExistEmail($email)){
                return false;
            }    
            else{
                return true;
            }
        }
        else
        {
            // Set message
            $this->form_validation->set_message('checkEmail','Email không đúng định dạng');
            return false;
        }
    }
    
    # Check User có tồn tại không?
    public function isExitUser(){
        $this->form_validation->set_message('isExitUser','Tên truy nhập "' . $username . '" đã tồn tại.');
        
        if($this->UserModel->isExistUser($username)) {
            return false;
        }    
        else{
            return true;
        }
    }
    
    # Get List User not Active
    public function getUserList($page = 1){
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        if(isset($_SESSION["cUser"]) && ($_SESSION['cUser']->RoleId == 1 || $_SESSION['cUser']->RoleId == 2)){
            
            $url = base_url() .'danh-sach-user-cho-duyet/';
            $total_rows = $this->UserModel->getUserNotActive_Total();
            $per_page = 10;

            $config = $this->my_customs->pagination($url, $total_rows, $per_page);

            $total_page = ceil($config['total_rows'] / $config['per_page']);
            $page = ($page > $total_page) ? $total_page : $page;
            $page = ($page < 0) ? 1 : $page;
            //$config['cur_page'] = $page;
            $page = $page - 1;             

            $data['userList'] = $this->UserModel->getUserList($page * $config['per_page'], $config['per_page']);
            $this->pagination->initialize($config);
            $data['list_pagination'] = $this->pagination->create_links();
            $this->load->view('userList', $data);
            
        }
        else{
            redirect('');
        }
        
    }
    
    public function MyAccount(){
         // Check session
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        
        $id = $this->session->userdata('user_id');
        $data['info'] = $this->UserModel->getInfoUserById($id);

        $this->load->view('templates/header');
        $this->load->view('users/myAccount', $data);
        $this->load->view('templates/footer');
            
    }
    
    // Update: User
    public function updateUser($id = 0){
       
        $this->form_validation->set_rules('re-password', 'Mật khẩu nhắc lại', 'matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_checkEmail');
                
        if($this->form_validation->run() === FALSE){
             $this->MyAccount();
        }
        else{
            
            $fullname   = $this->input->post('fullname');
            $phone      = $this->input->post('phone');
            $email      = $this->input->post('email');
            $roleId     = $this->input->post('roleId');
            $pass       = $this->input->post('password');
            
            if(isset($_SESSION["cUser"]) && $id == 0){
                $id = $_SESSION['cUser']->ID;
       
                $data = array(
                    'FullName'  => $fullname,
                    'Email'     => $email,
                    'Phone'     => $phone,
                    'RoleID'    => $roleId
                );
                if($pass != ""){
                    $data['Password'] = md5($pass);
                }
                
                // Nếu thành công
                if($this->UserModel->updateUser($data, $id) > 0){
                    $this->myAccount();
                    $this->form_validation->set_message('checkPass','Lỗi mật khẩu không trùng nhau.');
                }
            }   
        }
    }
    
    # Active User
    public function activeUser(){
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        $data['Active'] = $active;
        
        if($this->UserModel->updateUser($data, $id)){
            return true;
        }else{
            return false;
        }
    }
}
?>