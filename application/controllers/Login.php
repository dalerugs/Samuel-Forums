<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model('users_model','usersModel');
    }

    public function login(){
    	$credentials = array(
    		'username' => $this->input->post('username'),
    		'password' => md5($this->input->post('password'))
		);
		$valid = $this->usersModel->validateCredentials($credentials);
		if ($valid) {
			$_SESSION['id']=$valid['id'];
            $_SESSION['name']=$valid['firstName']." ".$valid['lastName'];
			$_SESSION['role']='user';
			$_SESSION['loggedIn']=TRUE;
			$valid = TRUE;
		}
		$this->output->set_content_type('application/json')
			->set_output(json_encode(array('valid'=>$valid)));
    }

	public function logout(){
        session_destroy();
        header("Location: ". base_url(''));
        exit();
    }
}
