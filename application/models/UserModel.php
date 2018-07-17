<?php

class UserModel extends CI_Model{
    
    // Check Login
    public function login($user, $pass){
        /*
        $query = $this->db->query('SELECT ID, FullName, UserName FROM users Where UserName ="' . $user . '" and Password="' . $pass . '" and Active = 1' );
                
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }*/
        
        $this->db->where('UserName', $user);
        $this->db->where('Password', $pass);
        
        $result = $this->db->get('users');
        
        if($result->num_rows() == 1){
            return $result->row(0);
        }else{
            return false;
        }
    }
    
    // Get Thông tin User đăng nhập
    public function getUser($user, $pass){
         
        //return $this->db->get('user')->result();
         
        $query = $this->db->query('SELECT ID, FullName, UserName, RoleId FROM users Where UserName ="' . $user . '" and Password="' . $pass . '" and Active = 1' );
        
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
    
    public function getUserNotActive_Total(){
        return $this->db->from('users')->where('Active', 0)->count_all_results();
    }
    
    public function getUserList($start, $limit){
        //$query = $this->db->query('SELECT ID, Email, FullName, UserName FROM user Where Active = 0');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->limit($limit, $start);
        $this->db->where('Active', 0);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
        {
            $row = $query->result();
            return $row;
        }
    }
        
    // Check User có tồn tại không
    public function isExistUser($userName){
        
        $query = $this->db->get_where('users', array('UserName' => $userName));
        if(!empty($query->row_array())) {
            return true;
        }else{
            return false;
        }
                
        /*$this->db->select('UserName', 'Password');
        $this->db->from('users');
        $this->db->where('UserName', $userName);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        } */
    }
    
    // Check Email có tồn tại không
    public function isExistEmail($email){
        
        $query = $this->db->get_where('users', array('Email' => $email));
        if(!empty($query->row_array())) {
            return true;
        }else{
            return false;
        }
        /*
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $email);
        if($id != 0){
            $this->db->where('ID !=', $id);
        }
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }*/
    }
    
    // Create user mới
    public function create_User(){
        $username       = $this->input->post('username');
        $fullname       = $this->input->post('fullname');
        $phone          = $this->input->post('phone');
        $email          = $this->input->post('email');
        $pass           = md5($this->input->post('password'));
        $roleId         = $this->input->post('roleId');
        $currentUser    = '0';
        $active         = 0;

        if($this->input->post('active') == '1'){
            $active = 1;
        }

        $data = array(
            'fullname'      => $fullname,
            'username'      => $username,
            'phone'         => $phone,
            'email'         => $email,
            'password'      => $pass,
            'UserCreate'    => $currentUser,
            'RoleId'        => $roleId,               // Người dùng
            'Active'        => $active
        );
        
        // Insert user
        return $this->db->insert('users', $data);
        
        /*$this->db->set($data);
        $this->db->insert('user');
        
        $flag = $this->db->affected_rows();
        return $flag; // > 0 : thành công 
        */
    }
    
    # Update User
    public function updateUser($data, $id){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        
        $flag = $this->db->affected_rows();
        return $flag; // > 0 : thành công 
    }
    
    # Get Thông tin User thông qua ID
    public function getInfoUserById($id){
         
        $query = $this->db->query('SELECT * FROM users Where ID =' . $id);
        
        if ($query->num_rows() > 0 )
        {
            $row = $query->result();
            return $row;
        }
    }
    
    public function get_roles(){
        $this->db->order_by('ID');
        $query = $this->db->get('Roles');
        return $query->result_array();
    }
}
?>