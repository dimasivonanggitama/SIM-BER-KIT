<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aprove_log_book extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ap_log_book_m');
        $this->load->model('ap_log_book_dtl_new_m');
        $this->load->model('ap_log_book_group_m');
        $this->load->model('ap_log_book_group_dtl_m');
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
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_log_book.id_admin', 'left');
            $this->db->order_by('ap_log_book.id_log_book',"DESC");
            $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'id_atasan' => $this->session->userdata('id')
            ));
        } else {
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_log_book.id_admin', 'left');
            $this->db->order_by('ap_log_book.id_log_book',"DESC");
            $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'bulan_log_book' => $this->data['bulan'],
            'tahun_log_book' => $this->data['tahun'],
            'id_atasan' => $this->session->userdata('id')
            ));
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function aprove($id)
    {

        $this->data['user'] = $this->ci_rules_m->get($this->session->userdata('rules'));

        $this->data['content'] = $this->ap_log_book_m->get($id);
        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
        'id_log_book' => $id
        ));
        if ($id) {
            $this->data['content_dtl'] = $this->ap_log_book_dtl_new_m->get_new();
            $data = array(
            'paraf_log_book_dtl' => NULL,
            'date_paraf_log_book_dtl' => NULL,
            'ket_paraf_log_book_dtl' => NULL,
            'tolak_log_book_dtl' => NULL,
            'date_tolak_log_book_dtl' => NULL,
            'ket_tolak_log_book_dtl' => NULL,
            'id_admin' => NULL
            );
        }

        $rules = $this->ap_log_book_dtl_new_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {

            $this->ap_log_book_dtl_new_m->save($data);
            redirect($this->uri->rsegment(1) . '/isi/' . $id);
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/isi';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function setuju_semua($id)
    {
        $data = array(
        'paraf_log_book_dtl' => 1,
        'date_paraf_log_book_dtl' => date('Y-m-d H:i:s'),
        'id_admin' => $this->session->userdata('id')
        );

        $this->db->where('id_log_book', $id);
        $this->db->update('ap_log_book_dtl_new', $data);

        redirect($this->uri->rsegment(1) . '/aprove/' . $id);
    }

    public function ajax_setuju()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('ket');
        $data = array(
        'paraf_log_book_dtl' => 1,
        'date_paraf_log_book_dtl' => date('Y-m-d H:i:s'),
        'ket_paraf_log_book_dtl' => $ket,
        'id_admin' => $this->session->userdata('id'),
        'tolak_log_book_dtl' => NULL,
        'date_tolak_log_book_dtl' => NULL,
        'ket_tolak_log_book_dtl' => NULL
        );

        $this->ap_log_book_dtl_new_m->save($data, $id);
    }

    public function ajax_batal_setuju()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('ket');
        $data = array(
        'paraf_log_book_dtl' => NULL,
        'date_paraf_log_book_dtl' => NULL,
        'ket_paraf_log_book_dtl' => NULL,
        'id_admin' => $this->session->userdata('id'),
        'tolak_log_book_dtl' => NULL,
        'date_tolak_log_book_dtl' => NULL,
        'ket_tolak_log_book_dtl' => NULL
        );

        $this->ap_log_book_dtl_new_m->save($data, $id);
    }

    public function ajax_tidak_setuju()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('ket');
        $data = array(
        'paraf_log_book_dtl' => NULL,
        'date_paraf_log_book_dtl' => NULL,
        'ket_paraf_log_book_dtl' => NULL,
        'id_admin' => $this->session->userdata('id'),
        'tolak_log_book_dtl' => 1,
        'date_tolak_log_book_dtl' => date('Y-m-d H:i:s'),
        'ket_tolak_log_book_dtl' => $ket
        );

        $this->ap_log_book_dtl_new_m->save($data, $id);
    }

    public function ajax_batal_tidak_setuju()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('ket');
        $data = array(
        'paraf_log_book_dtl' => NULL,
        'date_paraf_log_book_dtl' => NULL,
        'ket_paraf_log_book_dtl' => NULL,
        'id_admin' => $this->session->userdata('id'),
        'tolak_log_book_dtl' => NULL,
        'date_tolak_log_book_dtl' => NULL,
        'ket_tolak_log_book_dtl' => NULL
        );

        $this->ap_log_book_dtl_new_m->save($data, $id);
    }

    public function unduh_pdf_approve($klik_id){
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->data['content'] = $this->ap_log_book_m->get($klik_id);

        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
        'id_log_book' => $klik_id
        ));

        $datatbl=''; 
        $datatbl=$this->load->view('log_book/view_download_approve', $this->data, true);;

        //
                $this->load->library('m_pdf');
                $pdfFilePath="download_pdf.pdf";

                $this->mpdf = new mPDF("en-GB-x","A3",9,"");

                $this->mpdf->AddPage('L', // L - landscape, P - portrait
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
