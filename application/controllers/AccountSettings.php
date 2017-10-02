<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountSettings extends CI_Controller {

	public function __construct() {
        parent:: __construct();
    }

	public function index()
	{
		$data=array();
		$data['title']="Settings";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="S E T T I N G S";
		$data['pageDescription']="Manage Account Settings";
		$data['activeNav']="accountNav";
		$this->load->view('template/header',$data);
		$this->load->view('pages/account/myForums',$data);
		$this->load->view('template/footer');
	}
}
