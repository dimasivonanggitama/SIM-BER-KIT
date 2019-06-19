<?php
class Ap_admin_m extends MY_Model
{
	
	protected $_table_name = 'ap_admin';
	protected $_order_by = 'id_admin';
	protected $_primary_key = 'id_admin';
	protected $_primary_filter = 'intval';
	protected $_timestamps = FALSE;
	public $rules = array(
		'username_admin' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required'
		), 
		'password_admin' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);
	public $rules_tambah = array(
	    'username_admin' => array(
	        'field' => 'username',
	        'label' => 'Username',
	        'rules' => 'trim|required'
	    ),
	);
	public $rules_gp = array(
	    'password_new' => array(
	        'field' => 'password_new',
	        'label' => 'Password',
	        'rules' => 'trim|required'
	    ),
	    'password_confirm' => array(
	        'field' => 'password_confirm',
	        'label' => 'Password',
	        'rules' => 'trim|required|matches[password_new]'
	    ),
	);
	
	public function __construct ()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	public function login ()
	{
		$user = $this->get_by(array(
			'username_admin' => $this->input->post('username'),
			'password_admin' => $this->hash($this->input->post('password')),
		    'active_admin' => '1'
		), TRUE);
		
		if (count($user) && $user->id_pegawai_aktif == 1 || $user->id_pegawai_aktif == 4) {
			// Log in admin
			$data = array(
			    'id' => $user->id_admin,
				'rules' => $user->rules_id,
			    'mylang' => $user->lang_admin,
			    'alamat_ip'=>$this->input->ip_address(),
				'loggedin' => TRUE,
			);
			$data = $this->security->xss_clean($data);
			$this->session->set_userdata($data);
			return $user->id_admin;
		}
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function logout ()
	{
	    $this->session->sess_destroy();
	}
	
	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
	
	public function get_new(){
	    $variabel = new stdClass();
	    $variabel->id_admin='';
	    $variabel->nip_admin='';
	    $variabel->username_admin='';
	    $variabel->password_admin='';
	    $variabel->name_admin='';
	    $variabel->email_admin='';
	    $variabel->telp_admin='';
	    $variabel->alamat_admin='';
	    $variabel->image_admin='';
	    $variabel->lang_admin='';
	    $variabel->rules_id='';
	    $variabel->active_admin='';
	    
	    return $variabel;
	}
	
}