<?php

class Goodsyst_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ap_admin_m');
        if (! empty($this->session->userdata['id'])) {
            $ip = $this->input->ip_address();
            if($ip == '127.0.0.1'){
            $this->config->set_item('base_url','http://127.0.0.1/run/');
            }else{
            $this->config->set_item('base_url','http://localhost/run/');
            }
            // user info
            $this->data['user_info'] = $this->ap_admin_m->get($this->session->userdata['id']);
            // list modules
            $this->data['modules'] = $this->ci_modules_m->get();
            // languages
            $check_lang = $this->ci_languages_m->get($this->session->userdata['mylang']);
            $this->data['mylanguages_field'] = $check_lang->field;
            $mylanguages_field_x = $check_lang->field;
            // set language
            $this->config->set_item('language', $this->session->userdata['mylang']);
            // dictionary
            $dictionary = $this->ci_dictionary_m->get();
            foreach ($dictionary as $value) {
                $this->data[$value->token] = $value->$mylanguages_field_x;
            }
            
            // user rules
            $this->db->join('ci_modules', 'ci_modules.id=ci_rules_modules.modules_id', 'left');
            $this->data['main_menu'] = $this->ci_rules_modules_m->get_by(array(
                'rules_id' => $this->session->userdata['rules'],
                'parent_modules_id' => 0
            ));
            
            $this->db->join('ci_modules', 'ci_modules.id=ci_rules_modules.modules_id', 'left');
            $this->db->where('parent_modules_id<>0');
            $this->data['main_menu_tree'] = $this->ci_rules_modules_m->get_by(array(
                'rules_id' => $this->session->userdata['rules']
            ));
            
            $this->db->join('ci_modules', 'ci_modules.id=ci_rules_modules.modules_id', 'left');
            $hak_akses = $this->ci_rules_modules_m->get_by(array(
                'rules_id' => $this->session->userdata['rules'],
                'link' => $this->uri->rsegment(1)
            ));
            
            $this->data['main_menu_active'] = '';
            $this->data['main_menu_open'] = '';
            $this->data['modules_icon'] = '';
            $this->data['modules_title'] = '';
            if ($this->uri->rsegment(1) == 'dashboard' or $this->uri->rsegment(1) == '') {
                $this->data['main_menu_active'] = 'dashboard';
                $this->data['modules_icon'] = 'fa fa-home';
                $this->data['modules_title'] = $this->data['lang_dashboard'];
            } elseif ($this->uri->rsegment(1) == 'profile') {
                $this->data['main_menu_active'] = 'profile';
                $this->data['modules_icon'] = 'fa fa-user';
                $this->data['modules_title'] = $this->data['lang_profile'];
            }  elseif ($this->uri->rsegment(1) == 'notifikasi') {
                $this->data['main_menu_active'] = 'notifikasi';
                $this->data['modules_icon'] = 'fa fa-envelope';
                $this->data['modules_title'] = 'Notification';
            } else {
                $this->db->join('ci_modules', 'ci_modules.id=ci_rules_modules.modules_id', 'left');
                $active_item = $this->ci_rules_modules_m->get_by(array(
                    'link' => $this->uri->rsegment(1)
                ), TRUE);
                if ($active_item) {
                    $this->data['main_menu_active'] = $active_item->link;
                    $this->data['main_menu_open'] = $active_item->parent_modules_id;
                    $this->data['modules_icon'] = $active_item->icon;
                    $this->data['modules_title'] = $active_item->$mylanguages_field_x;
                }
            }
            
            $pengecualian = array();
            
            $pengecualian = array(
                'dashboard',
                'profile',
                'notifikasi',
                'auth/login',
                'auth/logout',
                'bahasa/indonesian',
                'bahasa/english',
                'maps/config_maps',
                ''
            );
            
            if (in_array(uri_string(), $pengecualian) == FALSE) {
                if (count($hak_akses) == 0) {
                    $ip = $this->input->ip_address();
                    if($ip == '127.0.0.1'){
                    $this->config->set_item('base_url','http://127.0.0.1/run/');
                    }else{
                    $this->config->set_item('base_url','http://localhost/run/');
                    }
                    redirect('404');
                }
            }

            $this->db->join('ci_notification','ci_notification.id_notification=ci_notification_rules.id_notification','left');
            $this->data['notifikasi'] = $this->ci_notification_rules_m->get_by(array(
                'id_admin'=>$this->session->userdata['id'],
                'done_notification_rules' => 0
            ));
        }
        
        // Login check
        $exception_uris = array(
            'auth/login',
            'auth/logout'
        );
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->ap_admin_m->loggedin() == FALSE) {
                $ip = $this->input->ip_address();
                if($ip == '127.0.0.1'){
                $this->config->set_item('base_url','http://127.0.0.1/run/');
                }else{
                $this->config->set_item('base_url','http://localhost/run/');
                }
                redirect('auth/login');
            }
        }
    }

    public function ambil_pct($ambilsesi,$filename){
        $this->load->helper('download');
        $this->load->helper('file');
        $this->load->helper('string');
        echo "<script>console.log( 'sukses' );</script>";
        $this->ambil_file($ma, $filename);
    }
}