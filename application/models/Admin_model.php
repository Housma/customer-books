<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$obj = &get_instance();
$obj->load->model('person_model');
class Admin_model extends person_model {


        private $table = 'users';
        private $key = "3a839e25d85908b8e72247b8b7d04554";
       
       
        public function get_users(){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
        }
        public function get_users_num(){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? 0 : $query->num_rows();
        }
        public function get_user_by_id($id){
                $query = $this->db->select('*')
                                ->where('id' , $id  )
                                ->limit(1)
                                ->get($this->table); 
                return (!$query->num_rows()) ? null : $query->result();
        }
        public function delete_user($id){
                $data = array('is_deleted' => 1 );
                $this->db->where('id', $id);
                $this->db->update( $this->table , $data);
        } 
       
        public function check_user_name($username ){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->where('username' , $username  )
                                ->limit(1)
                                ->get($this->table); 
                return (!$query->num_rows()) ? null : $query->result();
        }
        public function add_user($name , $username , $level,$password){
               $data = array(
              'name' => $name, 
              'level' => $level, 
              'username' => $username,
              'password' => md5($password.$this->key) 
             );
             $this->db->insert($this->table, $data);
        }
         public function edit_user($name , $username  ,$level,$password ,$id ){
               $data = array(
                'username' => $username, 
                'name' => $name, 
                'level' => $level
             );
               if(!empty($password)){
                $data['password'] = md5($password.$this->key);
               }
            $this->db->where('id', $id);
            $this->db->update( $this->table , $data);
        }
      

}