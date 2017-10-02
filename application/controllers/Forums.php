<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forums extends CI_Controller {

	public function __construct() {
        parent:: __construct();
    }

	public function index()
	{
		$data=array();
		$data['title']="Forums";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="F O R U M S";
		$data['pageDescription']="Browse Forums";
		$data['activeNav']="forumsNav";
		$this->load->view('template/header',$data);
		$this->load->view('pages/forums',$data);
		$this->load->view('template/footer');
	}
}
