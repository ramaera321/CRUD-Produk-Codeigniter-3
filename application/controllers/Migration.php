<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Migration extends CI_Controller { 
    
    public function index() { 
        $this->load->library('migration');
        if ($this->migration->latest() === FALSE)
        {
            echo $this->migration->error_string();
        }else{
            $this->session->sess_destroy();
            echo "Table Migrated Successfully.";
        }
    }

}