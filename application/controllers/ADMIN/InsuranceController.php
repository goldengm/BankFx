<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsuranceController extends CI_Controller {


	private function check_admin_logged_in()
    {
        if ($this->session->userdata('bankfx_admin_login')) {
            $this->admin_id = $this->session->userdata('admin_id');
            $this->admin_name = $this->session->userdata('admin_name');
            $this->admin_email = $this->session->userdata('admin_email');
         
        } else {
            redirect('admin/login', 'refresh');
        }
    }
	
    public function insurance_overview()
    {     
        $this->check_admin_logged_in();
        $data = array(
            "admin_id"=>$this->admin_id
        );
        
		$this->load->view('admin_panel/layout/header',array("admin_data"=>$data));
		$this->load->view('admin_panel/insurance/insurance_overview');
		$this->load->view('admin_panel/layout/footer');
    }

}