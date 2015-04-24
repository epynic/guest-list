<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Dashboard extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$response = array();
		$this->load->model('event_m');
		$session = $this->session->userdata('loggedin');
		if( $session != 'loggedin' ){
			$response['status'] = 'logout';
			$this->response($response,200);
		}
	}

	public function event_post(){
		$date = date('Y-m-d');
		$where = "start_time > '$date' and event_status = 1";
		$data = $this->event_m->get_by($where);
		$this->response($data,200);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */