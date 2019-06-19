<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_surat_masuk_m');
        $this->load->model('ci_surat_disposisiketentuan_m');
        $this->load->model('ap_surat_masuk_chat_m');

        // $this->load->model('ap_log_book_dtl_new_m');
        // $this->load->model('ap_log_book_group_m');
        // $this->load->model('ap_log_book_group_dtl_m');
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
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_surat_masuk.id_admin', 'left');
            $this->db->join('ci_surat_disposisiketentuan', 'ci_surat_disposisiketentuan.id_ketentuan_kategori=ap_surat_masuk.id_ketentuan_kategori', 'left');
            //$this->db->where_in('ap_surat_masuk.id_ketentuan_kategori',$in)
            $this->db->order_by('ap_surat_masuk.id_agenda',"DESC");
            $this->db->order_by('ap_surat_masuk.id_ketentuan_kategori',"DESC");
            $this->data['content'] = $this->ap_surat_masuk_m->get_by(array(
            'id_atasan' => $this->session->userdata('id')
            ));
        } else {
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_surat_masuk.id_admin', 'left');
            $this->db->order_by('ap_surat_masuk.id_agenda',"DESC");
            $this->data['content'] = $this->ap_surat_masuk_m->get_by(array(
            // 'bulan_log_book' => $this->data['bulan'],
            // 'tahun_log_book' => $this->data['tahun'],
            'id_atasan' => $this->session->userdata('id')
            ));
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function isi($id)
    {

        $this->data['user'] = $this->ci_rules_m->get($this->session->userdata('rules'));

        $this->data['content'] = $this->ap_surat_masuk_m->get($id);

        if ($id) {//untuk kategori
          $this->db->join('ap_admin', 'ap_admin.id_admin=ap_surat_masuk_chat.id_admin', 'left');
          $this->db->order_by('ap_surat_masuk_chat.id_chat',"ASC");
          $this->data['isi_detail'] = $this->ap_surat_masuk_chat_m->get_by(array(
          'id_agenda' => $id
          ));
        }

        $jeneng = NULL;
        if (! empty($_FILES['file_surat']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_surat']['name']);
        }
        if ($id) {

            $this->data['content_dtl'] = $this->ap_surat_masuk_chat_m->get_new();
            $data = array(
            'id_chat' => $this->ap_surat_masuk_chat_m->increment(),
            'id_agenda' => $id,
            'date_create_chat' => date('Y-m-d H:i:s'),
            'isi_chat' => $this->input->post('isi_chat'),
            'file_surat' => $jeneng,
            'id_admin' => $this->session->userdata('id')

            );
        }

        $rules = $this->ap_surat_masuk_chat_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
          if (! empty($_FILES['file_surat']['name'])) {
              $this->upload_dokumen($jeneng, 'file_surat');
              if ($id) {
                  unlink('./uploads/' . $this->data['content']->file_surat);
              }
          }
          $this->ap_surat_masuk_chat_m->save($data);
            redirect($this->uri->rsegment(1) . '/isi/' . $id);
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/isi';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function setuju_semua($id)
    {
        // $data = array(
        // 'paraf_log_book_dtl' => 1,
        // 'date_paraf_log_book_dtl' => date('Y-m-d H:i:s'),
        // 'id_admin' => $this->session->userdata('id')
        // );
        //
        // $this->db->where('id_log_book', $id);
        // $this->db->update('ap_log_book_dtl_new', $data);
        //
        // redirect($this->uri->rsegment(1) . '/aprove/' . $id);
    }

    public function ajax_setuju()
    {
        // $id = $this->input->post('id');
        // $ket = $this->input->post('ket');
        // $data = array(
        // 'paraf_log_book_dtl' => 1,
        // 'date_paraf_log_book_dtl' => date('Y-m-d H:i:s'),
        // 'ket_paraf_log_book_dtl' => $ket,
        // 'id_admin' => $this->session->userdata('id'),
        // 'tolak_log_book_dtl' => NULL,
        // 'date_tolak_log_book_dtl' => NULL,
        // 'ket_tolak_log_book_dtl' => NULL
        // );
        //
        // $this->ap_log_book_dtl_new_m->save($data, $id);
    }

    public function ajax_tidak_setuju()
    {
        // $id = $this->input->post('id');
        // $ket = $this->input->post('ket');
        // $data = array(
        // 'paraf_log_book_dtl' => NULL,
        // 'date_paraf_log_book_dtl' => NULL,
        // 'ket_paraf_log_book_dtl' => NULL,
        // 'id_admin' => $this->session->userdata('id'),
        // 'tolak_log_book_dtl' => 1,
        // 'date_tolak_log_book_dtl' => date('Y-m-d H:i:s'),
        // 'ket_tolak_log_book_dtl' => $ket
        // );
        //
        // $this->ap_log_book_dtl_new_m->save($data, $id);
    }
}
