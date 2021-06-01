<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('person_model');
        $this->load->model('logs_model');
        $this->load->model('admin_model');
        $this->load->model('contact_model');
        $this->load->model('phone_model');
        $this->load->model('address_model');
        if($this->session->userdata('logged') != 1 ){
            redirect(base_url()."login");
        }

	}

          	
	public function index()
	{
       $addresses_num = $this->address_model->get_addresses_num();
       $phones_num = $this->phone_model->get_phones_num();
       $contacts_num = $this->contact_model->get_contacts_num();
       $users_num = $this->admin_model->get_users_num();
       
       
       

		$page = array();
		$page['users_num'] = $users_num;
		$page['contacts_num'] = $contacts_num;
		$page['phones_num'] = $phones_num;
		$page['addresses_num'] = $addresses_num;
		$data['content'] = $this->load->view('home' , $page , TRUE);
        $data['tab_name']   = "dashboard";
		$this->base_library->template($data);
	}
}
