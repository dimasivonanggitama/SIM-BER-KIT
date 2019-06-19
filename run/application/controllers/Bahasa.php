<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahasa extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function indonesian()
    {
        $this->session->set_userdata(array('mylang'=>'indonesian'));
        $data = array(
            'lang_admin' => 'indonesian'    
        );
        $this->ap_admin_m->save($data, $this->session->userdata['id']);
        redirect('dashboard');
    }
    public function english()
    {
        $this->session->set_userdata(array('mylang'=>'english'));
        $data = array(
            'lang_admin' => 'english'
        );
        $this->ap_admin_m->save($data, $this->session->userdata['id']);
        redirect('dashboard');
    }
}