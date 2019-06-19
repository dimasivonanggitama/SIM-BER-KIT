<?php
defined('BASEPATH') or exit('No direct script access allowed');

class It_inventory_spv extends Goodsyst_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_it_m');
        $this->load->model('ap_it_cek_m');
        $this->load->model('ap_it_kegi_m');
        $this->load->model('ap_it_ref_cek_m');
    }
    
    public function index($bulan = NULL, $tahun = NULL)
    {
        if ($bulan == NULL) {
            $this->data['bulan'] = intval(date('m'));
        } else {
            $this->data['bulan'] = intval($bulan);
        }
        if ($tahun == NULL) {
            $this->data['tahun'] = date('Y');
        } else {
            $this->data['tahun'] = $tahun;
        }

        if ($bulan == NULL && $tahun == NULL) {
            $this->db->where('id_admin!=',1);
            $this->data['group_dtl'] = $this->ap_admin_m->get();
            $this->db->where('flag_pengajuan',1);
            $this->db->where('flag_format_baru',1);
            $this->db->or_where('flag_format_baru',0);
            $this->data['content'] = $this->ap_it_m->get_by(array(
            'bulan_cctv' => date("m"),
            'tahun_cctv' => date("Y")
            ));
        } else {
            $this->db->where('id_admin!=',1);
            $this->data['group_dtl'] = $this->ap_admin_m->get();
            $this->db->where('flag_pengajuan',1);
            $this->db->where('flag_format_baru',1);
            $this->db->or_where('flag_format_baru',0);
            $this->data['content'] = $this->ap_it_m->get_by(array(
            'bulan_cctv' => $this->data['bulan'],
            'tahun_cctv' => $this->data['tahun']
            ));
        }
        
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function unduh_pdf_cctv($id)
    {
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->data['cctv'] = $this->ap_it_m->get($id);
        $this->data['cctv_ref'] = $this->ap_it_ref_cek_m->get();
        $this->data['cctv_cek'] = $this->ap_it_cek_m->get_by(array(
            'id_cctv' => $id
        ));

        $this->data['user_info'] = $this->ap_admin_m->get($this->data['cctv']->id_admin);
        
        $this->data['cctv_kegi'] = $this->ap_it_kegi_m->get_by(array(
             'id_cctv' => $id
        ));

        $datatbl=''; 
        $datatbl=$this->load->view('it_inventory_spv/view_download', $this->data, true);;

        //
                $this->load->library('m_pdf');
                $pdfFilePath="download_pdf.pdf";

                $this->mpdf = new mPDF("en-GB-x","A4",9,"");

                $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                        8, // margin_left
                        8, // margin right
                        8, // margin top
                        8, // margin bottom
                        0, // margin header
                        0); // margin footer
                $this->mpdf->WriteHTML($datatbl);
                //$this->mpdf->Output($file_name, 'D'); // download force
                $this->mpdf->Output($pdfFilePath, 'I'); // view in the explorer    
                die;
    }

    public function unduh_pdf_cctv_old($id)
    {
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->data['cctv'] = $this->ap_it_m->get($id);

        $this->data['cctv_cek'] = $this->ap_it_cek_m->get_by(array(
            'id_cctv' => $id
        ));

        $this->data['user_info'] = $this->ap_admin_m->get($this->data['cctv']->id_admin);
        
        $this->data['cctv_kegi'] = $this->ap_it_kegi_m->get_by(array(
             'id_cctv' => $id
        ));

        $datatbl=''; 
        $datatbl=$this->load->view('it_inventory_spv/view_download_old', $this->data, true);;

        //
                $this->load->library('m_pdf');
                $pdfFilePath="download_pdf.pdf";

                $this->mpdf = new mPDF("en-GB-x","A4",9,"");

                $this->mpdf->AddPage('P', // L - landscape, P - portrait
                '', '', '', '',
                        8, // margin_left
                        8, // margin right
                        8, // margin top
                        8, // margin bottom
                        0, // margin header
                        0); // margin footer
                $this->mpdf->WriteHTML($datatbl);
                //$this->mpdf->Output($file_name, 'D'); // download force
                $this->mpdf->Output($pdfFilePath, 'I'); // view in the explorer    
                die;
    }
}