<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forums extends CI_Controller {

	public function __construct() {
        parent:: __construct();
        $this->load->model('forums_model','forumsModel');
        $this->load->model('answers_model','answersModel');
        $this->load->model('users_model','usersModel');
    }

	public function index()
	{
		$data=array();
		$data['forums']=array();
		$forums = $this->forumsModel->readForums();
		foreach ($forums as $forum) {
			$user=$this->usersModel->readUserById($forum['userId']);
			array_push($data['forums'],array(
				'id' => $forum['id'],
				'userId' => $forum['userId'],
				'firstName' => $user['firstName'],
				'lastName' => $user['lastName'],
				'title' => $forum['title'],
				'description' => $forum['description'],
				'createdAt' => $forum['createdAt'],
				'updatedAt' => $forum['updatedAt']
			));
		}
		$data['title']="Forums";
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$data['pageTitle']="F O R U M S";
		$data['pageDescription']="Browse Forums";
		$data['activeNav']="forumsNav";
		$this->load->view('template/header',$data);
		$this->load->view('pages/forums',$data);
		$this->load->view('template/footer');
	}

	public function forum($id){
		$data=array();
		$forum = $this->forumsModel->readForumById($id);
		$data['answers']=array();
		$data['loggedIn']=(empty($_SESSION['loggedIn']) ? FALSE : $_SESSION['loggedIn']);
		$answers=$this->answersModel->readAnswerByForumId($forum['id']);
		foreach ($answers as $answer) {
			$user=$this->usersModel->readUserById($answer['userId']);
			$ans=array(
				'id' => $answer['id'],
				'forumId' => $answer['forumId'],
				'userId' => $answer['userId'],
				'firstName' => $user['firstName'],
				'lastName' => $user['lastName'],
				'answer' => $answer['answer'],
				'createdAt' => $answer['createdAt']
			);
			if($data['loggedIn']){
				$ans['editable']=($_SESSION['id']==$forum['userId']?TRUE:FALSE);
			}else{
				$ans['editable']=FALSE;
			}
			array_push($data['answers'],$ans);
		}
		
		if($data['loggedIn']){
			$data['editable']=($_SESSION['id']==$forum['userId']?TRUE:FALSE);
		}else{
			$data['editable']=FALSE;
		}
		
		$data['forum']=$forum;
		$data['title']="Forums";
		
		$data['pageTitle']="F O R U M S";
		$data['pageDescription']=$forum['title'];
		$data['activeNav']="forumsNav";

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
}
