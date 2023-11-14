<?php

class Kredit_debit_model extends CI_Model {
    
    public function get_list(){
        return $this->db->get("kredit_debit")->result();
    }
    
}

?>