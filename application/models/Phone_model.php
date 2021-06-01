<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Phone_model extends CI_Model {
       private $table       = 'phones';
       public  $id ;
       public  $phone ;
       public  $contact_id ;
       public  $is_deleted ;
     
       public function get_phones(){
                $query = $this->db->select('t1.phone , t2.id , t2.name,t1.created_date')
                                ->from('phones as t1')
                                ->join('contacts as t2', 't1.contact_id = t2.id')
                                ->where('t1.is_deleted' , 0 )
                                ->get(); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       public function get_phones_num(){
                $query = $this->db->select('t1.phone , t2.id , t2.name,t1.created_date')
                                ->from('phones as t1')
                                ->join('contacts as t2', 't1.contact_id = t2.id')
                                ->where('t1.is_deleted' , 0 )
                                ->get(); 
               return (!$query->num_rows()) ? 0 : $query->num_rows();
       }
       public function get_contact_phones($id){
                $query = $this->db->select('*')
                                ->where('contact_id' , $id )
                                ->where('is_deleted' , 0 )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }

       public function get_phone_by_id($id){
                $query = $this->db->select('*')
                                ->where('id' , $id )
                                ->get($this->table); 
               return (!$query->num_rows()) ? null : $query->result();
       }
       
       
}