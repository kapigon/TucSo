<?php
    class FavoriteModel extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function get_Favorites($user_Id = 0, $limit = FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit, $offset);
            }
            
            $query = $this->db->get_where('Favorites', array('UserId' => $user_Id));
            return $query->result_array();
        }

        public function isExitFavorites($user_Id, $Buddha_Id){
            $query = $this->db->get_where('Favorites', array('UserId' => $user_Id, 'BuddhaId' =>$Buddha_Id));
            if(!empty($query->row_array())) {
                return true;
            }else{
                return false;
            }
        }
        
        public function add_Favorite($data){    
            return $this->db->insert('Favorites', $data);
        }
        
        public function delete_Favorite($id){
            $data['Active'] = 0;
            $this->db->where('ID', $this->input->post('ID'));
            return $this->db->update('Favorites', $data);
        }
    }