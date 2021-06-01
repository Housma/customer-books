<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_library {

        public function template($data = array() )
        {
                $CI =& get_instance();
                $id = $CI->session->userdata('id');
                $username = $CI->session->userdata('username');
                $name = $CI->session->userdata('name');
                $level = $CI->session->userdata('level');
                $data['id'] = $id ;
                $data['username'] = $username ;
                $data['name'] = $name ;
                $data['level'] = $level ;
                $CI->load->view('base_page' , $data );
        }

}