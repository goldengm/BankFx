
<?php

defined('BASEPATH') or exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */

require APPPATH . '/libraries/REST_Controller.php';

class Loan extends \Restserver\Libraries\REST_Controller
{
    public $curr_date 			= "";
	public $unix_timestamp 		= "";
	public $timeStamp 			= "";
	public $responseData 		= array();
	
    public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('America/New_York');

        $date = new DateTime();
        $this->curr_date = date('Y-m-d H:i:s');
        $this->unix_timestamp = date('U');
		$this->timeStamp = $date->getTimestamp();
		$this->load->model('LoanModel');	
    }
 
	//get overview details 
	public function get_loan_overview_post()
	{  
        $query = $this->LoanModel->get_loan_overview();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	public function update_loan_overview_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('loan_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('loan_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->LoanModel->update_loan_overview($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	
	//=================PERSONAL LOAN============
	/*Get personal loan*/
	public function get_personal_loan_post()
	{  
		$query = $this->LoanModel->get_personal_loan();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/*update personal loan*/
	public function update_personal_loan_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('loan_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('loan_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->LoanModel->update_personal_loan($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	// get student loan rates content
	public function get_personal_loan_rate_content_post()
	{  
		$query = $this->LoanModel->get_personal_loan_rate_content();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/* update personal loan rate contetn*/
	public function update_personal_loan_rate_content_post()
	{
	
			$id		   	=	$this->input->post('id',true);
			$content	=	$this->input->post('content',true);
			
			$data = array(
				"id"=>$id,
				"content"=>$content,
				"updated_on"=>$this->curr_date
			);
		
			$query = $this->LoanModel->update_personal_loan_rate_content($data);
			
			if ($query['Status']) {
				return $this->set_response($query, REST_Controller::HTTP_OK);
			}
			return $this->send_error_response($query[$this->config->item('message')]);
	}

	//===============LOAN CALCULATOR==============
	// get loan calculator content
	public function get_loan_calculator_content_post()
	{  
		$query = $this->LoanModel->get_loan_calculator_content();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/* update loan calculator content*/
	public function update_loan_calculator_content_post()
	{
			$id		   	=	$this->input->post('id',true);
			$content	=	$this->input->post('content',true);
			
			$data = array(
				"id"=>$id,
				"content"=>$content,
				"updated_on"=>$this->curr_date
			);
		
			$query = $this->LoanModel->update_loan_calculator_content($data);
			
			if ($query['Status']) {
				return $this->set_response($query, REST_Controller::HTTP_OK);
			}
			return $this->send_error_response($query[$this->config->item('message')]);
	}


	//=======================AUTO LOAN=================
	/*Get auto loan*/
	public function get_auto_loan_post()
	{  
		$query = $this->LoanModel->get_auto_loan();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/*update auto loan*/
	public function update_auto_loan_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('loan_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('loan_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->LoanModel->update_auto_loan($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
		// get auto loan rates content
		public function get_auto_loan_rate_content_post()
		{  
			$query = $this->LoanModel->get_auto_loan_rate_content();
			if ($query['Status']) {
				return $this->set_response($query, REST_Controller::HTTP_OK);
			}
			return $this->send_error_response($query[$this->config->item('message')]);
		}
		/* update auto loan rate contetn*/
		public function update_auto_loan_rate_content_post()
		{
	
			$id		   	=	$this->input->post('id',true);
			$content	=	$this->input->post('content',true);
			
			$data = array(
				"id"=>$id,
				"content"=>$content,
				"updated_on"=>$this->curr_date
			);
		
			$query = $this->LoanModel->update_auto_loan_rate_content($data);
			
			if ($query['Status']) {
				return $this->set_response($query, REST_Controller::HTTP_OK);
			}
			return $this->send_error_response($query[$this->config->item('message')]);
		}

	//=======================STUDENT LOAN=================
	/*Get student loan*/
	public function get_student_loan_post()
	{  
		$query = $this->LoanModel->get_student_loan();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/*update student_loan */
	public function update_student_loan_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('loan_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('loan_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->LoanModel->update_student_loan($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}

	// get student loan rates content
	public function get_student_loan_rate_content_post()
	{  
        $query = $this->LoanModel->get_student_loan_rate_content();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/* update student loan rate contetn*/
	public function update_student_loan_rate_content_post()
	{

		$id		   	=	$this->input->post('id',true);
		$content	=	$this->input->post('content',true);
        
        $data = array(
			"id"=>$id,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);
	
		$query = $this->LoanModel->update_student_loan_rate_content($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	


	//=======================DEBT CONSOLIDATION=================
	/*Get debt_consolidation loan*/
	public function get_debt_consolidation_data_post()
	{  
		$query = $this->LoanModel->get_debt_consolidation_data();
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}
	/*update student_loan */
	public function update_debt_consolidation_data_post()
	{
		$_POST = $this->security->xss_clean($_POST);	
		$this->form_validation->set_rules('heading','heading', 'trim|required|max_length[100]');	
		$this->form_validation->set_rules('content','content', 'trim|required');	
		$this->form_validation->set_rules('id','id', 'trim|required');	
							
		if ($this->form_validation->run() == false) {
			$message = array(
				$this->config->item('status') => false,
				$this->config->item('message')=> validation_errors(),
				$this->config->item('data') => $this->form_validation->error_array(),
			);
			return $this->send_error_response(validation_errors(), REST_Controller::HTTP_NOT_FOUND);
		}

		$heading		    =	$this->input->post('heading',true);
		$content		    =	$this->input->post('content',true);
		$id		    		=	$this->input->post('id',true);
        
        $data = array(
			"id"=>$id,
			"heading"=>$heading,
			"content"=>$content,
			"updated_on"=>$this->curr_date
		);

		    //if image added
			if (isset($_FILES['image'])) {    
                $file_name = md5($this->unix_timestamp) . "." . substr($_FILES['image']['name'],
                                    strpos($_FILES['image']['name'], ".") + 1);
            
                $upPath   =    getcwd() .'/'. $this->config->item('loan_media_path');

                $config = array(
                    'upload_path'   => $upPath,
                    'file_name'     => $file_name,
                    'allowed_types' => "*",
                    'overwrite'     => TRUE,
                    'max_size'		=> "524288000"
                );
                $img_response = $this->validator->do_upload($config, 'image');

                $img_status = $img_response[$this->config->item('status')];
                if (!$img_status) {
                    return $this->validator->apiResponse($img_response);
                }
                $img_data   = $img_response[$this->config->item('data')];
                $file_name  = $img_data['file_name'];
                $file_path  = $this->config->item('loan_media_path');

            $image = $file_path.$file_name;
            $data['image']= $image;
        }

		$query = $this->LoanModel->update_debt_consolidation($data);
		
		if ($query['Status']) {
			return $this->set_response($query, REST_Controller::HTTP_OK);
		}
		return $this->send_error_response($query[$this->config->item('message')]);
	}












	 
  //Error message
  public function send_error_response($Message)
  {
      $response[$this->config->item('status')] = false;
      $response[$this->config->item('message')] = $Message;
      return $this->set_response($response, REST_Controller::HTTP_OK);
  }
  
}

