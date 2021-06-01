<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_loop extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->model('person_model');
        $this->load->model('logs_model');
        $this->load->model('admin_model');

        if($this->session->userdata('logged') != 1 ){
            redirect(base_url()."login");
        }
        if($this->session->userdata('level') != 1 ){
            echo "You dont have permission to access this";
            die();
        }
	}

          	
	public function users()
	{
		$page = array();
		$page['users'] 		= $this->admin_model->get_users();
		$data['content'] 	= $this->load->view('users_list' , $page , TRUE);
        $data['tab_name']   = "users";
		$this->base_library->template($data);
	}
	public function add_user_func()
    {
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
    
            $check = $this->admin_model->check_user_name($username);
            if (empty($check)) { 
                $this->admin_model->add_user($name , $username , $level,$password);
                $log_desc = "User added username ($username) ";
                $this->logs_model->add_log($log_desc);
                 redirect(base_url()."Admin_loop/users?success=User has been added successfully.");
            }else{
                redirect(base_url()."Admin_loop/users?error=The name($username) is already used you should use new name.");
            }
        }
    }
     public function delete_user_func()
    {

        $id 	= $this->input->post('id');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
            
                    
                    $user = $this->admin_model->get_user_by_id($id)[0];  
                    $log_desc = "User deleted name ($user->name) user id ($id)";
                    $this->logs_model->add_log($log_desc); 

                    $this->admin_model->delete_user($id);
                    redirect(base_url()."Admin_loop/users?success=User has been deleted successfully.");  
        }
    }

     public function edit_user_func()
    {

        $name   = $this->input->post('name');
        $username   = $this->input->post('username');
        $level 	= $this->input->post('level');
        $password     = $this->input->post('password');
        $id     = $this->input->post('id');

        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|xss_clean');
        $this->form_validation->set_rules('id', 'id', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
                        echo validation_errors();
                        die("Bad Access");
        }else{
 
                $check_username = $this->admin_model->check_user_name($username);
                if(!empty($check_username) && $check_username[0]->id != $id){
                    redirect(base_url()."Admin_loop/users?error=this username is already exist."); 
                }
                $log_desc = "User edited name ($name) user id ($id) ";
                $this->logs_model->add_log($log_desc);  
                $this->admin_model->edit_user($name , $username  ,$level,$password ,$id );
                redirect(base_url()."Admin_loop/users?success=User has been edited successfully.");  
                
                
        }
    } 

	public function logs()
	{
		$page = array();
		$logs		= $this->logs_model->get_logs();
		$page['logs'] = $logs;
		$data['content'] 	= $this->load->view('logs_list' , $page , TRUE);
        $data['tab_name']   = "logs";
		$this->base_library->template($data);
	}

}
