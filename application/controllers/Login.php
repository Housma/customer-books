<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('person_model');
        $this->load->model('logs_model');

	}
	public function index()
	{
        if($this->session->userdata('logged') == 1 ){
                redirect(base_url()."dashboard");
        }
		$this->load->view('login');
	}

	public function login_func(){
		$username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

          if ($this->form_validation->run() == FALSE)
            {
                        echo validation_errors();
                        die("Bad Access");
            }else{
                        $user = $this->person_model->login($username , $password);

                        if($user != null && !empty($user)){
                            
                            $this->session->set_userdata('logged', 1);
                            $this->session->set_userdata('username', $user[0]->username);
                            $this->session->set_userdata('name', $user[0]->name);
                            $this->session->set_userdata('id', $user[0]->id);
                            $this->session->set_userdata('level', $user[0]->level);
                            $log_desc = "User logged in username ($username) ";

                            $this->logs_model->add_log($log_desc);
                              redirect(base_url()."dashboard"); 
                        }else{
                             redirect(base_url()."login/index?error=1"); 
                        }
            }
	}
	public function logout( )
    {   
        $log_desc = "User logged out";
        $this->logs_model->add_log($log_desc);
        $this->session->sess_destroy();
                        redirect(base_url()."login"); 
    }

    public function suspended( )
    {   
        echo "suspended";
    }




}
