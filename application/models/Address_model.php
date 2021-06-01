<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Address_model extends CI_Model {
       private $table       = 'addresses';
       public  $id ;
       public  $address ;
       public  $contact_id ;
       public  $is_deleted ;
     
       public function get_contact_addresses($contact_id){
                $query = $this->db->select('*')
                                ->where('contact_id' , $contact_id )
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       public function get_addresses(){
                $query = $this->db->select('t1.address , t2.id , t2.name,t1.created_date')
                                ->from('addresses as t1')
                                ->join('contacts as t2', 't1.contact_id = t2.id')
                                ->where('t1.is_deleted' , 0 )
                                ->get(); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       public function get_addresses_num(){
                $query = $this->db->select('t1.address , t2.id , t2.name,t1.created_date')
                                ->from('addresses as t1')
                                ->join('contacts as t2', 't1.contact_id = t2.id')
                                ->where('t1.is_deleted' , 0 )
                                ->get(); 
               return (!$query->num_rows()) ? 0 : $query->num_rows();
       }
       public function get_address_by_id($id){
                $query = $this->db->select('*')
                                ->where('id' , $id )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       
       

}