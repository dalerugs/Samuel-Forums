<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent:: __construct();
    }

	public function index()
	{
		$data=array();
		$data['title']="Home";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="H O M E";
		$data['pageDescription']="Samuel Forums Home";
		$data['activeNav']="homeNav";
		$this->load->view('template/header',$data);
		$this->load->view('pages/home',$data);
		$this->load->view('template/footer');
	}
}
