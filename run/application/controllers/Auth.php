<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_admin_m');
        $this->load->model('ap_login_m');
    }

    public function login()
    {
        $dashboard = 'dashboard';
        $this->ap_admin_m->loggedin() == FALSE || redirect($dashboard);
        
        $rules = $this->ap_admin_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            // We can login and redirect
            if ($this->ap_admin_m->login() == TRUE) {
                $data = array(
                    'id_admin' => $this->ap_admin_m->login(),
                    'wk_login' => date('Y-m-d H:i:s')
                );
                $this->ap_login_m->save($data);
                $ip = $this->input->ip_address();
                if($ip == '127.0.0.1'){
                $this->config->set_item('base_url','http://127.0.0.1/run/');
                }else{
                $this->config->set_item('base_url','http://localhost/run/');
                }
                redirect($dashboard);
            } else {
                $this->session->set_flashdata('error', 'Wrong username or password !');
                $ip = $this->input->ip_address();
                if($ip == '127.0.0.1'){
                $this->config->set_item('base_url','http://127.0.0.1/run/');
                }else{
                $this->config->set_item('base_url','http://localhost/run/');
                }
                redirect('auth/login');
            }
        }
        $this->load->view('_layout_login', $this->data);
    }

    public function logout()
    {
        $this->ap_admin_m->logout();
        $ip = $this->input->ip_address();
        if($ip == '127.0.0.1'){
        $this->config->set_item('base_url','http://127.0.0.1/run/');
        }else{
        $this->config->set_item('base_url','http://localhost/run/');
        }
        redirect('auth/login');
    }

    public function logo_user(){
            $name= $this->input->post('username');
            //Either you can print value or you can send value to database
            echo json_encode($name);
        }
       
    

}