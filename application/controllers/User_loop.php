<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_loop extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('person_model');
        $this->load->model('logs_model');
        $this->load->model('user_model');
        $this->load->model('contact_model');
        $this->load->model('phone_model');
        $this->load->model('address_model');

        if($this->session->userdata('logged') != 1 ){
            redirect(base_url()."login");
        }
        if($this->session->userdata('level') != 2 ){
            echo "You dont have permission to access this";
            die();
        }
	}

          	
	public function contacts()
	{
		$page = array();
		$page['contacts'] 		= $this->contact_model->get_contacts();
		$data['content'] 	= $this->load->view('contacts_list' , $page , TRUE);
        $data['tab_name']   = "contacts";
		$this->base_library->template($data);
	}
	public function add_contact_func()
    {
        $name = $this->input->post('name');

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
            $contact_id = $this->user_model->add_contact($name);
            $log_desc = "Contact added name ($name) ";
            $this->logs_model->add_log($log_desc);
             redirect(base_url()."User_loop/contact/$contact_id?success=Contact has been added successfully.");
        }
    }
     public function delete_contact_func()
    {

        $id 	= $this->input->post('id');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
            
                    
                    $contact = $this->contact_model->get_contact_by_id($id)[0];  
                    $log_desc = "Contact deleted name ($contact->name) contact id ($id)";
                    $this->logs_model->add_log($log_desc); 

                    $this->user_model->delete_contact($id);
                    redirect(base_url()."User_loop/contacts?success=contact has been deleted successfully.");  
        }
    }

     public function edit_contact_func()
    {

        $name   = $this->input->post('name');
        $id     = $this->input->post('id');

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
 
               
                $log_desc = "contacts edited name ($name) contacts id ($id) ";
                $this->logs_model->add_log($log_desc);  
                $this->user_model->edit_contact($name ,$id );
                redirect(base_url()."User_loop/contacts?success=User has been edited successfully.");  
                
                
        }
    } 

    public function contact($id)
    {
        $page = array();
        $contact                = $this->contact_model->get_contact_by_id($id)[0];
        $phones                 = $this->phone_model->get_contact_phones($contact->id);
        $addresses              = $this->address_model->get_contact_addresses($contact->id);
        $page['contact']        = $contact;
        $page['phones']         = $phones;
        $page['addresses']      = $addresses;
        $data['content']        = $this->load->view('contact_profile' , $page , TRUE);
        $data['tab_name']   = "contacts";
        $this->base_library->template($data);
    }

    public function add_contact_phone_func()
    {
        $phone = $this->input->post('phone');
        $contact_id = $this->input->post('contact_id');

        $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact_id', 'contact_id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
            $this->user_model->add_contact_phone($contact_id,  $phone);
            $log_desc = "Phone added phone ($phone) ";
            $this->logs_model->add_log($log_desc);
             redirect(base_url()."User_loop/contact/$contact_id?success=phone has been added successfully.");
        }
    }

     public function delete_contact_phone_func()
    {

        $id     = $this->input->post('id');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{            
            $phone = $this->phone_model->get_phone_by_id($id)[0];  
            $log_desc = "Phone deleted name ($phone->phone) phone id ($id)";
            $this->logs_model->add_log($log_desc); 
            $contact_id = $phone->contact_id ;
            $this->user_model->delete_contact_phone($id);
            redirect(base_url()."User_loop/contact/$contact_id?success=phone has been deleted successfully.");  
        }
    }

    public function add_contact_address_func()
    {
        $address = $this->input->post('address');
        $contact_id = $this->input->post('contact_id');

        $this->form_validation->set_rules('address', 'address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact_id', 'contact_id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
            $this->user_model->add_contact_address($contact_id,  $address);
            $log_desc = "address added address ($address) ";
            $this->logs_model->add_log($log_desc);
             redirect(base_url()."User_loop/contact/$contact_id?success=address has been added successfully.");
        }
    }

     public function delete_contact_address_func()
    {

        $id     = $this->input->post('id');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{            
            $address = $this->address_model->get_address_by_id($id)[0];  
            $log_desc = "address deleted name ($address->address) address id ($id)";
            $this->logs_model->add_log($log_desc); 
            $contact_id = $address->contact_id ;
            $this->user_model->delete_contact_address($id);
            redirect(base_url()."User_loop/contact/$contact_id?success=address has been deleted successfully.");  
        }
    }

            
    public function phones()
    {
        $page = array();
        $page['phones']         = $this->phone_model->get_phones();
        $data['content']        = $this->load->view('phones_list' , $page , TRUE);
        $data['tab_name']       = "phones";
        $this->base_library->template($data);
    }
            
    public function addresses()
    {
        $page = array();
        $page['addresses']      = $this->address_model->get_addresses();
        $data['content']        = $this->load->view('addresses_list' , $page , TRUE);
        $data['tab_name']       = "addresses";
        $this->base_library->template($data);
    }


}
