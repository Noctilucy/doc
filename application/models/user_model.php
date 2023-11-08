<?php

class user_model extends CI_Model {

    public function insert_user($data_input){
        $this->db->insert('user',$data_input);
    }
    
    public function update_user($id,$data_input){
        $this->db->where('id', $id);
        $this->db->update('user', $data_input);
    }

    public function delete_user($id){
        $this->db->delete('user', array('id' => $id));
    }

}