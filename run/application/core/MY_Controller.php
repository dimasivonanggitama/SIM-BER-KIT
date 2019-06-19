<?php
class MY_Controller extends CI_Controller
{

    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['errors'] = array();
        $this->load->model('ci_settings_m');
        $this->load->model('ci_languages_m');
        $this->load->model('ci_dictionary_m');
        $this->load->model('ci_rules_m');
        $this->load->model('ci_rules_modules_m');
        $this->load->model('ci_modules_m');
        $this->load->model('ci_notification_m');
        $this->load->model('ci_notification_rules_m');
        $this->data['app_info'] = $this->ci_settings_m->get(1);
    }
    
    public function upload_dokumen($jeneng,$nama){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['file_name']            = $jeneng;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
    }

    public function upload_slide($jeneng,$nama){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|ppt|pptx|doc|docx';
        $config['file_name']            = $jeneng;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
    }
    
    public function upload_file_all($jeneng,$nama){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['file_name']            = $jeneng;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
    }
    
    public function upload_gambar($jeneng,$nama){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg|gif';
        /* $config['max_width']            = 1024; */
        /* $config['max_height']           = 768; */
        $config['image_library'] = 'gd2';
        $config['max_size'] = '0';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 1024;
        $config['height'] = 768;
        $config['file_name']            = $jeneng;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
    }
    
    public function nama_file($nama) {
        $tmp = explode('.', $nama);
        $j=count($tmp)-1;
        $nama_file='';
        for ($i=0; $i<$j; $i++){
            $nama_file=$nama_file.$tmp[$i];
        }
        $jeneng = $nama_file.'_'.date('YmdHis').'.'.end($tmp);
        $jeneng = str_replace(' ', '_', $jeneng);
        return $jeneng;
    }

    public function notifikasi($link,$content,$rules){
        $id=$this->ci_notification_m->increment();
        $data=array(
            'id_notification' => $id,
            'date_notification' => date('Y-m-d H:i:s'),
            'link_notification' => $link,
            'content_notification' => $content
        );
        $this->ci_notification_m->save($data, NULL);

        foreach($rules as $val):
            $data=array(
                'id_notification_rules' => $this->ci_notification_rules_m->increment(),
                'id_notification' => $id,
                'id_admin' => $val,
                'done_notification_rules' => 0,
                'date_notification_rules' => date('Y-m-d H:i:s')
            );
            $this->ci_notification_rules_m->save($data, NULL);            
        endforeach;
    }

    public function ambil_file($ambilsesi,$filename){
        $ifma=$this->session->userdata('m_acak');
        if($ambilsesi == $ifma){
         $fn=get_mime_by_extension($filename);
         $path = '/prog/xampp/htdocs/run/application/uploads/' . $filename;
         header("Content-type: $fn");
         header("Content-disposition: inline; filename=$filename");
         header('Content-Transfer-Encoding: binary');
         header('Content-Length: ' . filesize($path));
         header('Accept-Ranges: bytes');
         header('Expires: 0');
         header('Cache-Control: public, must-revalidate, max-age=0');
         ob_clean();
         flush();
         readfile($path,true);
         //attachment
        }
    }

    function ambil_pdf($ambilsesi,$filename){
    $this->load->helper('download');
    // read file contents
    $data = file_get_contents(base_url('/application/uploads/'.$filename));
    force_download($filename, $data);
    
    }
    function get_uploads($filename){
    $path='./uploads/'.$filename;
    return file_get_contents($path);
    }
}