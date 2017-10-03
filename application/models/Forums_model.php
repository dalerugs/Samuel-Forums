<?php

class Forums_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function lastInsertedId(){
        return $this->db->insert_id();
    }

    public function createForum($forum){
        $this->db->insert('forums', $forum);
    }
    
    public function readForums(){
        $this->db->select('*');
        $this->db->from('forums');
        $this->db->order_by("createdAt", "desc");
        $forums = $this->db->get()->result_array();
        return $forums;
    }

    public function readForumsByUserId($userId){
        $this->db->select('*');
        $this->db->from('forums');
        $this->db->where("userId='$userId'");
        $this->db->order_by("createdAt", "desc");
        $forums = $this->db->get()->result_array();
        return $forums;
    }
    
    public function readForumById($id){
        $this->db->select('*');
        $this->db->from('forums');
        $this->db->where("id='$id'");
        $forums = $this->db->get()->row_array();
        return $forums;
    }
    
    public function updateForum($forum){
        $this->db->where(array('id'=>$forum['id']));
        $this->db->update('forums', $forum);
    }
}