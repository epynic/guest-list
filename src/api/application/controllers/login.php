<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');

class Login extends REST_Controller {

	public function __construct(){
		parent::__construct();
		$this->data['meta_title'] = 'SpaLon';
		$this->data['pageTitle'] = "";
		$this->load->helper('form');
		$response = array();
		$this->load->model('guest_m');
	}

	public function index_post(){
		$post = json_decode(file_get_contents("php://input"),true);
		$count = $this->guest_m->get_by(array('fb_id' => (int) $post['id'] ) ,true);
		//Check if User exists
		if( $count ){
			$session_data = array(
				'loggedin' => true,
				'guest_id' => $count->id);
			$this->session->set_userdata($session_data);
			$response['status'] = 'loggedin';
			$this->response($response, 200);
		}else{
			$response['status'] = 'new';
			$this->response($response, 200);
		}
	}

	public function signup_post(){
		$post = json_decode(file_get_contents("php://input"),true);

		//email mobile check
		$where = 'email ="'.$post['email'].'" or mobile_no ="'.$post['mobileno'].'"';
		$co = $this->guest_m->get_by($where);
		if( $co ){
			$response['status'] = 'exists';
			$this->response($response,200);
		}

		if($post['id']){
			$count = $this->guest_m->get_by(array('fb_id' => (int) $post['id'] ) );

			$response['status'] = 'error';
			!$count || $this->response($response,200);

			$data = array(
					'fb_id' => $post['id'],
					'name' => $post['name'],
					'fb_uri'=>$post['link'],
					'mobile_no' => $post['mobileno'],
					'email' => $post['email']);
			$id = $this->guest_m->save($data);
			
			if($id){
				$session_data = array(
								'loggedin' => true,
								'guest_id' => $id);
				$this->session->set_userdata($session_data);
				$response['status'] = 'loggedin';
				$this->response($response, 200);
			}
		}
	}

	public function guest_session_post(){
		$status = $this->session->userdata('loggedin');
		if( $status == 'loggedin'){
			$response['status'] = 'loggedin';
		}
		$this->response($response,200);
	}

	public function logout_post(){
		$this->session->sess_destroy();
		$this->response('',200);
	}

	public function requestpass_post(){
		$post = (int) json_decode(file_get_contents("php://input"),true);
		$this->load->model('guest_pass_m');
		//check logged in
		if(!$this->session->userdata('loggedin')){
			$response['status'] = 'logout';
			$this->response($response,200);
		}
		//check if already requested
		$where = 'guest_id = "'.$this->session->userdata('guest_id').'" and event_id = "'.$post.'"';
		$count = $this->guest_pass_m->get_by($where,true);
		if( $count ){
			$response['status'] = 'already';
			$this->response($response,200);
		}
		//check if event
		$this->load->model('event_m');
		$where = 'event_id = '.$post.'';
		$count = $this->event_m->get_by($where,true);
		if( !$count ){
			$response['status'] = 'invalid';
			$this->response($response,200);			
		}
		//request pass
		$data = array('event_id' => $post, 'guest_id' => $this->session->userdata('guest_id'), 'approval_status' => 0 );
		$this->guest_pass_m->save($data);
		$response['status'] = 'success';
		$this->response($response,200);			
	}

}