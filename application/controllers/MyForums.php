<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyForums extends CI_Controller {

	public function __construct() {
        parent:: __construct();
    }

	public function index()
	{
		$data=array();
		$data['title']="Forums";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="M Y &nbsp; F O R U M S";
		$data['pageDescription']="My Forums Management";
		$data['activeNav']="accountNav";
		$this->load->view('template/header',$data);
		$this->load->view('pages/account/myForums',$data);
		$this->load->view('template/footer');
	}
}
