<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact_model extends CI_Model {
       private $table       = 'contacts';
       public  $id ;
       public  $name ;
       public  $is_deleted ;
       
       public function get_contacts(){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       
       public function get_contacts_num(){
                $query = $this->db->select('*')
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? 0 : $query->num_rows();
       }
       
       public function get_contact_by_id($id){
                $query = $this->db->select('*')
                                ->where('id' , $id )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }
   
       
       
       

}