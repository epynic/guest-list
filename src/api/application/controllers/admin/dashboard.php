<?php
class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('event_m');
    }

    public function index() {

        // Fetch all events
        $type = $this->session->userdata['user_type'];
        if( $type == 'CLUB'){
            $where = 'user_id = "'.$this->session->userdata('id').'"';
            $this->data['events'] = $this->event_m->get_by($where);
        }else if( $type == 'ADMIN'){
            $this->data['events'] = $this->event_m->get();
        }
        $this->data['access'] = $type;
    	$this->data['subview'] = 'admin/dashboard/index';
    	$this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit ($id = NULL)
    {   
        $type = $this->session->userdata['user_type'];
        
        if ($id) {
            $this->data['event'] = $this->event_m->get($id);
            count($this->data['event']) || $this->data['errors'][] = 'Event could not be found';
        }
        else {
            $this->data['event'] = $this->event_m->get_new();
        }
        
        // Set up the form
        $rules = $this->event_m->rules;
        $this->form_validation->set_rules($rules);
        
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        // Process the form
        if ($this->form_validation->run() == TRUE) {
            if( $type == 'CLUB' && $id ){
                if( $this->data['event']->user_id != $this->session->userdata('id') ){
                    redirect('admin/dashboard');
                }
            }

            $data = $this->event_m->array_from_post(array('event_desc', 'event_name', 'start_time', 'end_time', 'event_location' ,'facebook_url'));
            ($id) || $data['user_id'] = $this->session->userdata('id');
            
            if ( $this->upload->do_upload('event_picture'))
            {
               $data['event_picture'] = $this->upload->data()['file_name'];
            }

            $this->event_m->save($data, $id);
            redirect('admin/dashboard');
        }
        
        // Load the view
        $this->data['subview'] = 'admin/dashboard/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function view($id = NULL ){
        ((int)$id) || redirect('admin/dashboard');

        $this->load->model('guest_pass_m');
        $where = 'ci_guest_pass.event_id = "'.$id.'" and ci_event.user_id ="'.$this->session->userdata('id').'"';
        $this->db->join('ci_guest','ci_guest.id = ci_guest_pass.guest_id');
        $this->db->join('ci_event','ci_event.event_id = ci_guest_pass.event_id');
        $this->data['guestList'] = $this->guest_pass_m->get_by($where); 

        $this->data['subview'] = 'admin/dashboard/view';
        $this->load->view('admin/_layout_main', $this->data );
    }

    public function user($id){
        $this->load->model('guest_m');
        $this->db->select('count(approval_status) as count,name,email,fb_uri,mobile_no');
        $where = 'id = "'.$id.'"';
        $this->db->join('ci_guest_pass','ci_guest.id = ci_guest_pass.guest_id');
        $this->data['guestInfo'] = $this->guest_m->get_by($where,true);

        $this->load->view('admin/dashboard/user',$this->data);
    }

    public function approve(){
        $data['approval_status'] = 1;
        $this->load->model('guest_pass_m');
        $this->guest_pass_m->save($data, $this->input->post('id') );
    }

    public function approveEvent($status){
        $type = $this->session->userdata['user_type'];
        if( $type == 'CLUB'){
            redirect('admin/user');
        }
        $data['event_status'] =  ( $status == 'approve' ) ? 1 : 0;
        $this->event_m->save($data, $this->input->post('id') );
    }


}