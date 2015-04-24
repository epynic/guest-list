<?php
class Frontend_Controller extends MY_Controller
{

	function __construct ()
	{
		parent::__construct();

		$this->data['meta_title'] = 'Guest List';
		$this->data['pageTitle'] = "";
		$this->load->library('session');
		$this->load->helper('form');
		
		// Load stuff
		
		// Fetch navigation
		
	}
}