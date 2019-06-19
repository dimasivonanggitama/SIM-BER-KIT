<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('string');
        $this->load->model('ap_peraturan_m');
        $this->load->model('ap_peraturan_kategori_m');
    }

    public function index($id = NULL, $idx = NULL)
    {
        if ($id) {
            if ($idx) {
                $in = $this->cari_anak(array(
                    $idx
                ), array(
                    $idx
                ));
            } else {
                $in = $this->cari_anak(array(
                    $id
                ), array(
                    $id
                ));
            }
            
            $this->db->join('ap_peraturan_kategori', 'ap_peraturan_kategori.id_peraturan_kategori=ap_peraturan.id_peraturan_kategori', 'left');
            $this->db->order_by('ap_peraturan.id_peraturan_group ASC, ap_peraturan.id_peraturan_kategori ASC, ap_peraturan.id_peraturan_status ASC, ap_peraturan.id_peraturan ASC');
            $this->db->where_in('ap_peraturan.id_peraturan_kategori', $in);
            $this->data['content'] = $this->ap_peraturan_m->get();
        } else {
            $this->db->join('ap_peraturan_kategori', 'ap_peraturan_kategori.id_peraturan_kategori=ap_peraturan.id_peraturan_kategori', 'left');
            $this->db->order_by('ap_peraturan.id_peraturan_group ASC, ap_peraturan.id_peraturan_kategori ASC, ap_peraturan.id_peraturan_status ASC, ap_peraturan.id_peraturan ASC');
            $this->data['content'] = $this->ap_peraturan_m->get();
        }
        
        $this->data['peraturan_kate'] = $this->ap_peraturan_kategori_m->get_by(array(
            'parent_peraturan_kategori' => 0
        ));
        if ($id == 0) {
            $this->data['peraturan_kate_sub'] = NULL;
        } else {
            $this->data['peraturan_kate_sub'] = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori' => $id
            ));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_peraturan_kategori_m->get_by(array(
                'parent_peraturan_kategori'=>$val
            ));
            
            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_peraturan_kategori);
                    $anak_next = $this->ap_peraturan_kategori_m->get_by(array(
                        'parent_peraturan_kategori'=>$key->id_peraturan_kategori
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_peraturan_kategori);
                        $i++;
                    }
                endforeach;
            }
        endforeach;
        if ($i==0) {
            return $in;
        } else {
            return $this->cari_anak($new_id, $in);
        }
    }

    public function ambil($ambilsesi=null,$filename=null){
        $ifma=$this->session->userdata('m_acak');
        if($ambilsesi == $ifma){
         //$fn=get_mime_by_extension($filename);
         $path = '/prog/xampp/htdocs/run/application/uploads/' . $filename;
        //  header("Content-type: $fn");
        //  header("Content-disposition: inline; filename=$filename");
        //  header('Content-Transfer-Encoding: binary');
        //  header('Content-Length: ' . filesize($path));
        //  header('Accept-Ranges: bytes');
        //  header('Expires: 0');
        //  header('Cache-Control: public, must-revalidate, max-age=0');
        // //  ob_clean();
        // //  flush();
        //  readfile($path,true);
        //  exit;
         
         //$file = '/path/to/pdf/file';
         $contents = read_file($path);

        $this->output
                ->set_status_header(200)
                ->set_content_type(get_mime_by_extension($filename))
                ->set_output($contents);
                // ->_display();
                // exit;
        }
        // $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
        // $this->data['content'] = $this->ap_perusahaan_m->get($id);
        
        // $this->load->view($this->uri->rsegment(1) . '/ajax_view', $this->data);

        //echo '<script type="text/javascript">alert("' . $mr . '")</script>';
        //$ifsession=$this->session->session_id;
        //$ifmr=$this->session->userdata('m_acak');
        //$this->session->unset_userdata('m_acak1');
        
            //set baru
            //$this->session->unset_userdata('m_acak');
                //$data = file_get_contents(base_url().'/application/uploads/');
                //force_download($paramnamafile, $data);
            //}
            //$path = base_url().'/application/uploads/peraturan-menteri-keuangan-nomor-136pmk062018_20181207135711.pdf';
            // $this->output->set_header('Content-Length: ' . filesize($path));
            // $this->output->set_header("Content-type: application/pdf");
            // $this->output->set_header("Content-disposition: inline; filename=$filename");
            // $this->output->set_output(file_get_contents($path));

            //$contents = read_file('application/uploads/peraturan-menteri-keuangan-nomor-136pmk062018_20181207135711.pdf');

            // $file = '/path/to/application/uploads/peraturan-menteri-keuangan-nomor-136pmk062018_20181207135711.pdf';
            // $contents = read_file($file);

            // $this->output
            //     ->set_header( header('Content-Disposition: attachment; filename="peraturan-menteri-keuangan-nomor-136pmk062018_20181207135711.pdf"'))
            //     ->set_status_header(200)
            //     ->set_content_type(get_mime_by_extension($file))
            //     ->set_output($file)
            //     ->_display();
            // exit;
            // $this->output
            //     ->set_content_type('pdf') // You could also use ".jpeg" which will have the full stop removed before looking in config/mimes.php
            //    ->set_output(file_get_contents(base_url().'/application/uploads/peraturan-menteri-keuangan-nomor-136pmk062018_20181207135711.pdf'));
            //$this->load->view('ambil');       
    }        

    public function ambil_pdf($filename=''){
        $file = "/prog/xampp/htdocs/run/application/uploads/".$filename;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            // change inline to attachment if you want to download it instead
            header('Content-Disposition: inline; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
    }

}
