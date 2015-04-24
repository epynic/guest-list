<?php
class Guest_pass_m extends MY_Model
{
	protected $_table_name = 'ci_guest_pass';
	protected $_order_by = 'ci_guest_pass.pass_id';
	protected $_primary_key = 'ci_guest_pass.pass_id';
	
	public $rules = array(
		'username' => array(
			'field' => 'username', 
			'label' => 'username', 
			'rules' => 'trim|required|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);
	
	public $rules_merchant = array(
			'username'  => array(
			'field' => 'username', 
			'label' => 'Email ID', 
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
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
		$user->username = '';
		$user->password = '';
		return $user;
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

}