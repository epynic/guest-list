<?php
class Event_m extends MY_Model
{
	protected $_table_name = 'ci_event';
	protected $_order_by = 'event_id';
	protected $_primary_key = 'event_id';
	
	
	public $rules = array(
		'event_name' => array(
			'field' => 'event_name', 
			'label' => 'Event Name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'event_desc' => array(
			'field' => 'event_desc', 
			'label' => 'Description', 
			'rules' => 'trim|required'
		), 
		'start_time' => array(
			'field' => 'start_time', 
			'label' => 'Start Time', 
			'rules' => 'trim|required'
		), 
		'end_time' => array(
			'field' => 'end_time', 
			'label' => 'End Time', 
			'rules' => 'trim|required'
		),
		'event_location' => array(
			'field' => 'event_location', 
			'label' => 'Location', 
			'rules' => 'trim|required'
		)
	);
	
	function __construct ()
	{
		parent::__construct();
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash( $this->input->post('password') ),
		), TRUE);
		
		if (count($user)) {
			// Log in user
			$data = array(
				'name' => $user->name,
				'username' => $user->username,
				'id' => $user->id,
				'merchant_id' => $user->merchant_id,
				'staff_id' => $user->staff_id,
				'user_type' => $user->user_type,
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}
	
	public function get_new(){
		$user = new stdClass();
		$user->event_name = '';
		$user->event_desc = '';
		$user->start_time = '';
		$user->end_time = '';
		$user->event_location = '';
		return $user;
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

}