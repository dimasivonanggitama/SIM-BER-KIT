<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ngunduh extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
    }

    function ambil($file){
        echo '<script type="text/javascript">alert("' . $sid . '")</script>';
        //$data = file_get_contents(site_url().'/../images/uploads/'.$job_no."/".$url_para[0]);
        //$name = 'myphoto.jpg';
        $ifsession=$this->session->session_id;
        if($ifsession == $sid ){
        $data = file_get_contents(base_url().'/application/uploads/');
        $name = $file;
        force_download($name, $data);
        }
    }


}