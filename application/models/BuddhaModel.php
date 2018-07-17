<?php
    class BuddhaModel extends CI_Model{

        public function __construct(){
            $this->load->database();
        }

        public function get_Buddhas($slug = FALSE, $limit = FALSE, $offset = FALSE){
            if($limit){
                $this->db->limit($limit, $offset);
            }
            if($slug === FALSE){
                $query = $this->db->get('Buddhas');
                return $query->result_array();
            }

            $query = $this->db->get_where('Buddhas', array('Slug' => $slug));
            return $query->row_array();
        }

        public function create_Buddha($buddha_image, $slug){
            $slug = url_title($slug);
            $data = array(
                    'Name'              => $this->input->post('Name'),
                    'Slug'              => $slug,
                    'ChungTu'           => $this->input->post('ChungTu'),
                    'ChanNgonTiengPhan' => $this->input->post('ChanNgonTiengPhan'),
                    'ChanNgonTiengViet' => $this->input->post('ChanNgonTiengViet'),
                    'GhiChu'            => $this->input->post('GhiChu'),
                    'HinhAnh'           => $buddha_image
                    );

            return $this->db->insert('Buddhas', $data);
        }
        
        public function delete_Buddhas($id){
            $this->db->where('ID', $id);
            $this->db->delete('Buddhas');
            
            return true;
        }
        
        public function update_Buddha($buddha_image, $slug){
            $slug = url_title($slug);
            
            $data = array(
                    'Name'              => $this->input->post('Name'),
                    'Slug'              => $slug,
                    'ChungTu'           => $this->input->post('ChungTu'),
                    'ChanNgonTiengPhan' => $this->input->post('ChanNgonTiengPhan'),
                    'ChanNgonTiengViet' => $this->input->post('ChanNgonTiengViet'),
                    'GhiChu'            => $this->input->post('GhiChu')
                    );
            if(!empty($buddha_image)){
                $data['HinhAnh'] = $buddha_image;
            }
            
            $this->db->where('ID', $this->input->post('ID'));
            return $this->db->update('Buddhas', $data);
        }
    }