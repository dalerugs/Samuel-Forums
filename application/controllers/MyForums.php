<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyForums extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model('forums_model','forumsModel');
        $this->load->model('answers_model','answersModel');
        if (empty($_SESSION['loggedIn'])) {
        	header("Location: ". base_url(''));
        }
    }

	public function index()
	{
		$data=array();
		$data['title']="Forums";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="M Y &nbsp; F O R U M S";
		$data['pageDescription']="My Forums Management";
		$data['activeNav']="accountNav";
		$data['css']=array(
            'assets/css/tables.css',
            'assets/css/bootstrapValidator.css',
        );
        
        $data['script']=array(
            'assets/js/jquery.dataTables.min.js',
            'assets/js/dataTables.bootstrap.min.js'
        );
		$this->load->view('template/header',$data);
		$this->load->view('pages/account/myForums',$data);
		$this->load->view('template/footer');
	}

	public function forum($id){
		$data=array();
		$forum = $this->forumsModel->readForumById($id);
		$data['editable']=TRUE;
		if($forum['userId']!=$_SESSION['id']){
			show_404();
		}
		$data['forum']=$forum;
		$data['answers']=$this->answersModel->readAnswerByForumId($forum['id']);
		$data['title']="Forums";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="M Y &nbsp; F O R U M S";
		$data['pageDescription']=$forum['title'];
		$data['activeNav']="accountNav";

		if ($this->input->post("post")) {
			$answer=array(
				'userId' => $_SESSION['id'],
				'forumId' => $id,
				'answer' => $this->input->post("answer")
			);
			$this->answersModel->createAnswer($answer);
			header("Location: ". base_url('myForums/forum/'.$id));
		}

		$this->load->view('template/header',$data);
		$this->load->view('pages/forum',$data);
		$this->load->view('template/footer');
	}

	public function newForum(){
		if (!$this->input->post('title') || !$this->input->post('description')) {
			$success = FALSE;
		}else{
			$success = TRUE;
			$forum = array(
				'userId' => $_SESSION['id'],
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
			$this->forumsModel->createForum($forum);
		}
		$this->output->set_content_type('application/json')
			->set_output(json_encode(array('success'=>$success)));
	}

	public function showForums(){
		$forums = $this->forumsModel->readForumsByUserId($_SESSION['id']);
        $data = array();
        foreach ($forums as $rows) {;
            array_push($data,
                array(
                    $rows['title'],
                    $rows['description'],
                    $rows['createdAt'],
                    $rows['updatedAt'],
                    '<a href="'.base_url("myForums/forum/".$rows['id']).'" class="btn btn-primary btn-sm btn-block">View</a>'
                    
                )
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=>$data)));
	}
}
