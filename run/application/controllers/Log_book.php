<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_book extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('ap_log_book_m');
        $this->load->model('ap_log_book_dtl_new_m');
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
        if ($bulan==NULL && $tahun==NULL){
            $this->db->join('ap_admin','ap_admin.id_admin=ap_log_book.id_atasan','left');
            $this->db->order_by('ap_log_book.id_log_book',"DESC");
            $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'ap_log_book.id_admin' => $this->session->userdata('id'),
            ));
        } else {
            $this->db->join('ap_admin','ap_admin.id_admin=ap_log_book.id_atasan','left');
            $this->db->order_by('ap_log_book.id_log_book',"DESC");
            $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'ap_log_book.id_admin' => $this->session->userdata('id'),
            'bulan_log_book'=>$this->data['bulan'],
            'tahun_log_book'=>$this->data['tahun'],
            ));
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajukan($id = NULL)
    {
        $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'id_log_book' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);
        
        $data = array(
            'flag_pengajuan' => 1,
            'date_create_log_book' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_log_book', $id);
        $this->db->update('ap_log_book', $data);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function edit()
    {
        $this->db->where('id_admin!=',1);
        $this->db->where('id_pegawai_aktif=',1);
        $this->db->order_by('id_eselon', "asc");
        $this->data['atasan'] = $this->ap_admin_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit_aj($id = NULL)
    {
        $this->data['content'] = $this->ap_log_book_m->get_by(array(
            'id_log_book' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);

        $this->db->where('id_admin!=',1);
	    $this->db->where('id_pegawai_aktif=',1);
        $this->data['atasan'] = $this->ap_admin_m->get();

        $this->data['content'] = $this->ap_log_book_m->get($id);

        if ($this->input->post('jabatann') != NULL && $this->input->post('atasan') != NULL) {
            //count($this->data['content']) || redirect('404');
            $data = array(
            // 'bulan_log_book' => $this->input->post('bulan'),
            // 'tahun_log_book' => $this->input->post('tahun'),
            'jabatan_d' => $this->input->post('jabatann'),
            // 'date_update_log_book' => date('Y-m-d H:i:s'),
            //'id_admin' => $this->session->userdata('id')
            'id_atasan' => $this->input->post('atasan')
            );

            $this->db->where('id_log_book', $id);
            $this->db->update('ap_log_book', $data);
            redirect($this->uri->rsegment(1) . '/index/');
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/edit_atasan';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajax_edit_simpan_temp(){
        $id_atasan=$this->input->post('id_atasan');
        // $bulan=$this->input->post('bulan');
        // $tahun=$this->input->post('tahun');
        $jabatan=$this->input->post('jabatan');
        
        if($id_atasan == NULL || $jabatan == NULL){
            $datajson['note'] = 'Isian Jabatan Anda Kosong!';
            $datajson['angka'] = 1;
        }else{
            $ref_bulan=intval(date('m'));
            if($ref_bulan == 1){
                $bulan=12;
                $tahun=intval(date('Y'))-1;
            }else{
                $bulan=intval(date('m'))-1;
                $tahun=intval(date('Y'));
            }

            $this->db->where('id_admin', $this->session->userdata('id'));
            $this->db->where('bulan_log_book',$bulan);
            $this->db->where('tahun_log_book',$tahun);
            $this->data['validasi'] = $this->ap_log_book_m->get();

            if($this->data['validasi'] != NULL){
                $datajson['note'] = 'Anda Sudah Melakukan Pengimputan Untuk Laporan Log Book Periode Bulan '.bulan($bulan).' Tahun '.$tahun.
                                    ' / Jika Anda Akan Berkeinginan Laporan Double Untuk Periode Tersebut Silahkan Membuat Manual';
                $datajson['angka']   = 0;
            }else{
                $data = array(
                    'id_log_book' => $this->ap_log_book_m->increment(),
                    'bulan_log_book' => $bulan,
                    'tahun_log_book' => $tahun,
                    'jabatan_d' => $jabatan,
                    // 'date_create_log_book' => date('Y-m-d H:i:s'),
                    'date_update_log_book' => NULL,
                    'id_admin' => $this->session->userdata('id'),
                    'id_atasan' => $id_atasan,
                );
            
                $this->ap_log_book_m->save($data);
                    $userx=array();
                    array_push($userx,$id_atasan);
                    $this->notifikasi('aprove_log_book','Laporan Log Book',$userx);
                    //redirect($this->uri->rsegment(1) . '/index/');
                    $datajson['note'] = 'Data Berhasil Tersimpan!';
                    $datajson['angka'] = 2;
            }
        }
        echo json_encode($datajson);
    }

    public function ajax_edit_simpan(){
        $id_atasan=$this->input->post('id_atasan');
        $jabatan=$this->input->post('jabatan');
        
        if($id_atasan == NULL || $jabatan == NULL){
            $datajson['note'] = 'Isian Jabatan Anda Kosong!';
            $datajson['angka'] = 1;
        }else{
            $ref_bulan=intval(date('m'));
            if($ref_bulan == 1){
                $bulan=12;
                $tahun=intval(date('Y'))-1;
            }else{
                $bulan=intval(date('m'))-1;
                $tahun=intval(date('Y'));
            }

            $this->db->where('id_admin', $this->session->userdata('id'));
            $this->db->where('bulan_log_book',$bulan);
            $this->db->where('tahun_log_book',$tahun);
            $this->data['validasi'] = $this->ap_log_book_m->get();

            if($this->data['validasi'] != NULL){
                $datajson['note'] = 'Anda Sudah Melakukan Pengimputan Untuk Laporan Log Book Periode Bulan '.bulan($bulan).' Tahun '.$tahun.
                                    ' / Jika Anda Akan Berkeinginan Laporan Double Untuk Periode Tersebut Silahkan Membuat Manual';
                $datajson['angka']   = 0;
            }else{
                $data = array(
                    'id_log_book' => $this->ap_log_book_m->increment(),
                    'bulan_log_book' => $bulan,
                    'tahun_log_book' => $tahun,
                    'jabatan_d' => $jabatan,
                    // 'date_create_log_book' => date('Y-m-d H:i:s'),
                    'date_update_log_book' => NULL,
                    'id_admin' => $this->session->userdata('id'),
                    'id_atasan' => $id_atasan,
                );
            
                $this->ap_log_book_m->save($data);
                    $userx=array();
                    array_push($userx,$id_atasan);
                    $this->notifikasi('aprove_log_book','Laporan Log Book',$userx);
                    //redirect($this->uri->rsegment(1) . '/index/');
                    $datajson['note'] = 'Data Berhasil Tersimpan!';
                    $datajson['angka'] = 2;
            }
        }
        echo json_encode($datajson);
    }


    public function view_download($id)
    {
        $this->data['user'] = $this->ci_rules_m->get($this->session->userdata('rules'));

        $this->data['content'] = $this->ap_log_book_m->get($id);

        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
        'id_log_book' => $id
        ));

        $this->load->view('log_book/view_download', $this->data);
    }


    public function isi($id)
    {
        $this->data['user'] = $this->ci_rules_m->get($this->session->userdata('rules'));

        $this->data['content'] = $this->ap_log_book_m->get($id);

        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
        'id_log_book' => $id
        ));
        if($this->data['content']->flag_pengajuan == 1){
            $data = array(
                'flag_pengajuan' => 0,
                'date_create_log_book' => NULL
            );
            $this->db->where('id_log_book', $id);
            $this->db->update('ap_log_book', $data);    
        }
        if ($id) {
            $this->data['content_dtl'] = $this->ap_log_book_dtl_new_m->get_new();
            $data = array(
            'id_log_book_dtl' => $this->ap_log_book_dtl_new_m->increment(),
            'id_log_book' => $id,
            'date_create_log_book_dtl' => date('Y-m-d H:i:s'),
            'date_update_log_book_dtl' => NULL,
            'iku' => $this->input->post('iku'),
            'formula' => $this->input->post('formula'),
            'perhitungan' => $this->input->post('perhitungan'),
            'realisasi_pd_bln_pelaporan' => $this->input->post('rpd'),
            'realisasi_sd_bln_pelaporan' => $this->input->post('rsd'),
            'target' => $this->input->post('target'),
            'keterangan' => $this->input->post('keterangan'),
            'paraf_log_book_dtl' => NULL,
            'date_paraf_log_book_dtl' => NULL,
            'ket_paraf_log_book_dtl' => NULL,
            'tolak_log_book_dtl' => NULL,
            'date_tolak_log_book_dtl' => NULL,
            'ket_tolak_log_book_dtl' => NULL,
            'id_admin' => NULL,
            'jns_komponen_data' => $this->input->post('komponen'),
            'komponen_dt_mn1_penugasan'=>''.$this->input->post('komponenmn1'),
            'komponen_dt_mn1_a_pelaporan' => $this->input->post('komponenmn1a'),
            'komponen_dt_mn2_surat_dinas' => $this->input->post('komponenmn2'),
            'komponen_dt_mn2_a_hal' => $this->input->post('komponenmn2a'),
            'komponen_dt_mn3_dokumen' => $this->input->post('komponenmn3'),
            'komponen_dt_mn3_a_wk_penyelesaian' => $this->input->post('komponenmn3a'),
            'komponen_dt_mn3_b_wk_standar' => $this->input->post('komponenmn3b'),
            'komponen_dt_mn4_lain' => $this->input->post('komponenmn4')
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

    public function delete($id)
    {
        $this->db->delete('ap_log_book_dtl_new', array(
        'id_log_book' => $id
        ));
        $this->ap_log_book_m->delete($id);

        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function delete_dtl($parent,$id)
    {
        $tampung = $this->ap_log_book_dtl_new_m->get_by(array('id_log_book_dtl' => $id));
        $data = array(
            'flag_pengajuan' => 0,
            'date_create_log_book' => NULL
        );
        $this->db->where('id_log_book', $tampung[0]->id_log_book);
        $this->db->update('ap_log_book', $data);

        $this->ap_log_book_dtl_new_m->delete($id);

        redirect($this->uri->rsegment(1) . '/isi/'.$parent);
    }

    public function unduh_pdf($klik_id){
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->data['content'] = $this->ap_log_book_m->get($klik_id);

        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
        'id_log_book' => $klik_id
        ));

        $datatbl=''; 
        $datatbl=$this->load->view('log_book/view_download', $this->data, true);;

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
                $this->mpdf->shrink_tables_to_fit=0;    
                die;
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
    
    public function edit_isi($parent,$id)
    {
      
        $this->data['content'] = $this->ap_log_book_m->get($parent);
        $this->data['isi_detail'] = $this->ap_log_book_dtl_new_m->get_by(array(
            'id_log_book_dtl' => $id
        ));
        
        $this->data['detail'] = $this->ap_log_book_dtl_new_m->get($id);

        if ($parent) {
            $data = array(
                'date_update_log_book_dtl' => date('Y-m-d H:i:s'),
                'iku' => $this->input->post('iku'),
                'formula' => $this->input->post('formula'),
                'perhitungan' => $this->input->post('perhitungan'),
                'realisasi_pd_bln_pelaporan' => $this->input->post('rpd'),
                'realisasi_sd_bln_pelaporan' => $this->input->post('rsd'),
                'target' => $this->input->post('target'),
                'keterangan' => $this->input->post('keterangan'),
                'paraf_log_book_dtl' => NULL,
                'date_paraf_log_book_dtl' => NULL,
                'ket_paraf_log_book_dtl' => NULL,
                'tolak_log_book_dtl' => NULL,
                'date_tolak_log_book_dtl' => NULL,
                'ket_tolak_log_book_dtl' => NULL,
                'id_admin' => NULL,
                'jns_komponen_data' => $this->input->post('komponen'),
                'komponen_dt_mn1_penugasan'=>''.$this->input->post('komponenmn1'),
                'komponen_dt_mn1_a_pelaporan' => $this->input->post('komponenmn1a'),
                'komponen_dt_mn2_surat_dinas' => $this->input->post('komponenmn2'),
                'komponen_dt_mn2_a_hal' => $this->input->post('komponenmn2a'),
                'komponen_dt_mn3_dokumen' => $this->input->post('komponenmn3'),
                'komponen_dt_mn3_a_wk_penyelesaian' => $this->input->post('komponenmn3a'),
                'komponen_dt_mn3_b_wk_standar' => $this->input->post('komponenmn3b'),
                'komponen_dt_mn4_lain' => $this->input->post('komponenmn4')
                );
        }

        $rules = $this->ap_log_book_dtl_new_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('status', 'Success!');
            $this->ap_log_book_dtl_new_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/' . isi . '/' . $parent);
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/edit_isi';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}
