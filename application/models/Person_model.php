<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Person_model extends CI_Model {

        public $id;
        public $username;
        public $password;
        public $level;
        public $is_deleted;
        public $is_suspended;
        private $table = 'users';
        private $key = "3a839e25d85908b8e72247b8b7d04554";

        public function login($username , $password){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->where('username' , $username  )
                                ->where('password' , md5($password.$this->key)  )
                                ->limit(1)
                                ->get($this->table); 
                return (!$query->num_rows()) ? null : $query->result();
        }
       
      

}