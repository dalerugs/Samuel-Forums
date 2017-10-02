<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model('users_model','usersModel');
    }

	public function index()
	{
		$data=array();
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['title']="Sign Up";
		$data['activeNav']="signupNav";
		$data['pageTitle']="S I G N &nbsp U P";
		$data['pageDescription']="Create an account";
		$data['css']=array(
            'assets/css/bootstrapValidator.css'
        );
        $data['script']=array(
            'assets/js/bootstrapValidator.js'
        );

        if ($this->input->post('signup')) {
        	$newUser=array(
				'firstName'=>$this->input->post('firstName'),
                'lastName'=>$this->input->post('lastName'),
                'birthDate'=>$this->input->post('birthDate'),
                'sex'=>$this->input->post('sex'),
                'address'=>$this->input->post('address'),
                'contactNumber'=>$this->input->post('contactNumber'),
                'emailAddress'=>$this->input->post('emailAddress'),
                'username'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password')),
    		);
    		$this->usersModel->createUser($newUser);
    		$userId=$this->usersModel->lastInsertedId();
    		$user= $this->usersModel->readUserById($this->usersModel->lastInsertedId());
            $_SESSION['id']=$user['id'];
            $_SESSION['name']=$user['firstName']." ".$user['lastName'];
			$_SESSION['role']='user';
			$_SESSION['loggedIn']=TRUE;
			header("Location: ". base_url('Home'));
        }

		$this->load->view('template/header',$data);
		$this->load->view('pages/signup',$data);
		$this->load->view('template/footer');
	}

	public function checkUsername(){
        $username= $this->input->post('username');
        $valid= $this->usersModel->checkUsername($username);
        $this->output->set_content_type('application/json')->set_output(json_encode(array('valid'=>$valid)));
    }
    
    public function checkEmail(){
        $emailAddress= $this->input->post('emailAddress');
        $valid= $this->usersModel->checkEmail($emailAddress);
        $this->output->set_content_type('application/json')->set_output(json_encode(array('valid'=>$valid)));
    }
}
