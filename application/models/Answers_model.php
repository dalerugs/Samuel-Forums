<?php

class Answers_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function lastInsertedId(){
        return $this->db->insert_id();
    }

    public function createAnswer($answer){
        $this->db->insert('answers', $answer);
    }
    
    public function readAnswer(){
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->order_by("createdAt", "asc");
        $forums = $this->db->get()->result_array();
        return $forums;
    }

    public function readAnswerByForumId($forumId){
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where("forumId='$forumId'");
        $this->db->order_by("createdAt", "asc");
        $forums = $this->db->get()->result();
        return $forums;
    }
    
    public function readAnswerById($id){
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where("id='$id'");
        $forums = $this->db->get()->row_array();
        return $forums;
    }
    
    public function updateAnswer($answer){
        $this->db->where(array('id'=>$answer['id']));
        $this->db->update('answers', $answer);
    }
}