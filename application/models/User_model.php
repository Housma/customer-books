<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$obj = &get_instance();
$obj->load->model('person_model');
class User_model extends person_model {
        private $table = 'contacts';
       
        public function add_contact($name){
               $data = array(
              'name' => $name
             );
             $this->db->insert($this->table, $data);
             return $this->db->insert_id();
        }
        public function add_contact_phone($contact_id,  $phone){
               $data = array(
              'contact_id' => $contact_id,
              'phone' => $phone,
             );
             $this->db->insert("phones", $data);
        }

        public function delete_contact_phone($id){
                $data = array('is_deleted' => 1 );
                $this->db->where('id', $id);
                $this->db->update( "phones" , $data);
        } 
       
        public function add_contact_address($contact_id,  $address){
               $data = array(
              'contact_id' => $contact_id,
              'address' => $address,
             );
             $this->db->insert("addresses", $data);
        }
        public function delete_contact_address($id){
                $data = array('is_deleted' => 1 );
                $this->db->where('id', $id);
                $this->db->update( "addresses" , $data);
        } 
        public function delete_contact($id){
                $data = array('is_deleted' => 1 );
                $this->db->where('id', $id);
                $this->db->update( $this->table , $data);
        } 
         public function edit_contact($name ,$id ){
              $data = array(
                'name' => $name, 
              );
            $this->db->where('id', $id);
            $this->db->update( $this->table , $data);
        }
       

}