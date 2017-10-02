<?php

class Users_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function validateCredentials($credentials){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$credentials['username']);
        $this->db->where('deactivated',FALSE);
        $result=$this->db->get();
        if($result->num_rows()==1){
            $user=$result->row_array();
            if ($user['password']==$credentials['password']) {
	            return $user;
            }else{
            	return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }

    public function checkUsername($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    public function checkEmail($emailAddress){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('emailAddress',$emailAddress);
        $result=$this->db->get();
        if($result->num_rows()==1){
            return FALSE;
        }
        else{
            return TRUE;
        }
    }

    public function lastInsertedId(){
        return $this->db->insert_id();
    }

    public function createUser($user){
        $this->db->insert('users', $user);
    }
    
    public function readUsers(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by("firstName", "asc");
        $users = $this->db->get()->result_array();
        return $users;
    }
    
    public function readUserById($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where("id='$id'");
        $users = $this->db->get()->row_array();
        return $users;
    }
    
    public function updateUser($user){
        $this->db->where(array('id'=>$user['id']));
        $this->db->update('users', $user);
    }
}