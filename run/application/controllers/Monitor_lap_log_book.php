<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor_lap_log_book extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_log_book_m');
        $this->load->model('ap_log_book_dtl_m');
        $this->load->model('ap_log_book_group_m');
        $this->load->model('ap_log_book_group_dtl_m');
    }

    public function index($bulan = NULL, $tahun = NULL)
    {
        if ($bulan == NULL){
            $this->data['bulan'] = intval(date('m'));
        } else {
            $this->data['bulan'] = intval($bulan);
        }
        if ($tahun == NULL){
            $this->data['tahun'] = date('Y');
        } else {
            $this->data['tahun'] = $tahun;
        }
        
        $this->db->where('id_admin !=',1);
        $this->db->where('id_eselon !=',1);
        $this->db->where('id_eselon !=',2);
        $this->db->where('id_pegawai_aktif =', 1);
        $this->data['group_dtl'] = $this->ap_admin_m->get();
        
        
        $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'id_admin' => $this->session->userdata('id'),
            'bulan_log_book'=>$this->data['bulan'],
            'tahun_log_book'=>$this->data['tahun'],
        ));
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        if ($id) {
            $this->data['content'] = $this->ap_log_book_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'bulan_log_book' => $this->input->post('bulan'),
                'tahun_log_book' => $this->input->post('tahun'),
                'date_update_log_book' => date('Y-m-d H:i:s'),
                'id_admin' => $this->session->userdata('id')
            );
        } else {
            $this->data['content'] = $this->ap_log_book_m->get_new();
            $data = array(
                'id_log_book' => $this->ap_log_book_m->increment(),
                'bulan_log_book' => $this->input->post('bulan'),
                'tahun_log_book' => $this->input->post('tahun'),
                'date_create_log_book' => date('Y-m-d H:i:s'),
                'date_update_log_book' => NULL,
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        $rules = $this->ap_log_book_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_log_book_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function isi($id)
    {
        $this->data['user'] = $this->ci_rules_m->get($this->session->userdata('rules'));
        
        $this->data['content'] = $this->ap_log_book_m->get($id);
        
        $this->data['isi_detail'] = $this->ap_log_book_dtl_m->get_by(array(
            'id_log_book' => $id
        ));
        
        if ($id) {
            $this->data['content_dtl'] = $this->ap_log_book_dtl_m->get_new();
            $data = array(
                'id_log_book_dtl' => $this->ap_log_book_dtl_m->increment(),
                'id_log_book' => $id,
                'date_log_book_dtl' => $this->input->post('tgl_pelapor'),
                'date_create_log_book_dtl' => date('Y-m-d H:i:s'),
                'date_update_log_book_dtl' => NULL,
                'iku_log_book_dtl' => $this->input->post('iku'),
                'target_log_book_dtl' => $this->input->post('target'),
                'dasar_log_book_dtl' => $this->input->post('dasar'),
                'kegiatan_log_book_dtl' => $this->input->post('kegiatan'),
                'doc_terima_log_book_dtl' => $this->input->post('docter'),
                'doc_selesai_log_book_dtl' => $this->input->post('docser'),
                'paraf_log_book_dtl' => NULL,
                'date_paraf_log_book_dtl' => NULL,
                'ket_paraf_log_book_dtl' => NULL,
                'tolak_log_book_dtl' => NULL,
                'date_tolak_log_book_dtl' => NULL,
                'ket_tolak_log_book_dtl' => NULL,
                'id_admin' => NULL,
                'jenis_log_book_dtl' => $this->input->post('kategori'),
                'waktu_mulai_log_book_dtl'=>''.$this->input->post('tgl_mulai').' '.$this->input->post('waktu_mulai').'',
                'waktu_selesai_log_book_dtl' => ''.$this->input->post('tgl_selesai').' '.$this->input->post('waktu_selesai').'',
                'kegiatan_mulai_log_book_dtl' => $this->input->post('kegi_mulai'),
                'kegiatan_selesai_log_book_dtl' => $this->input->post('kegi_selesai')
            );
        }
        
        $rules = $this->ap_log_book_dtl_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_log_book_dtl_m->save($data);
            redirect($this->uri->rsegment(1) . '/isi/' . $id);
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/isi';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->db->delete('ap_log_book_dtl', array(
            'id_log_book' => $id
        ));
        $this->ap_log_book_m->delete($id);
        
        redirect($this->uri->rsegment(1) . '/index/');
    }
    
    public function delete_dtl($parent,$id)
    {
        $this->ap_log_book_dtl_m->delete($id);
    
        redirect($this->uri->rsegment(1) . '/isi/'.$parent);
    }
}
