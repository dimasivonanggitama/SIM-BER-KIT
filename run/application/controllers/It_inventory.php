<?php
defined('BASEPATH') or exit('No direct script access allowed');

class It_inventory extends Goodsyst_Controller
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
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_it.id_atasan', 'left');
            $this->db->order_by('ap_it.id_cctv DESC');
            $this->data['content'] = $this->ap_it_m->get_by(array(
                'ap_it.id_admin' => $this->session->userdata('id')
            ));
            $this->db->where('id_admin!=', 1);
            $this->db->where('id_pegawai_aktif=',1);
            $this->data['atasan'] = $this->ap_admin_m->get();
        } else {
            $this->db->join('ap_admin', 'ap_admin.id_admin=ap_it.id_atasan', 'left');
            $this->db->order_by('ap_it.id_cctv DESC');
            $this->data['content'] = $this->ap_it_m->get_by(array(
                'ap_it.id_admin' => $this->session->userdata('id'),
                'bulan_cctv' => $this->data['bulan'],
                'tahun_cctv' => $this->data['tahun']
            ));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->db->where('id_admin!=', 1);
        $this->db->where('id_pegawai_aktif=',1);
        $this->data['atasan'] = $this->ap_admin_m->get();
        if ($id) {
            $this->data['content'] = $this->ap_it_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'bulan_cctv' => $this->input->post('bulan'),
                'tahun_cctv' => $this->input->post('tahun'),
                'id_perusahaan' => $this->input->post('kawasan'),
                'hanggar_cctv' => $this->input->post('hanggar'),
                //'date_update_cctv' => date('Y-m-d H:i:s'),
                'flag_format_baru' => 1,
                'id_admin' => $this->session->userdata('id'),
                'id_atasan' => $this->input->post('atasan')
            );
        } else {            
            $this->data['content'] = $this->ap_it_m->get_new();
            $data = array(
                'id_cctv' => $this->ap_it_m->increment(),
                'bulan_cctv' => $this->input->post('bulan'),
                'tahun_cctv' => $this->input->post('tahun'),
                'id_perusahaan' => $this->input->post('kawasan'),
                'hanggar_cctv' => $this->input->post('hanggar'),
                'date_create_cctv' => NULL,
                'date_update_cctv' => NULL,
                'flag_format_baru' => 1,
                'id_admin' => $this->session->userdata('id'),
                'id_atasan' => $this->input->post('atasan')
            );
        }
        
        $rules = $this->ap_it_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_it_m->save($data, $id);
            if ($id == NULL) {
                $userx = array();
                array_push($userx, $this->input->post('atasan'));
                $this->notifikasi('it_inventory_spv', 'Laporan Hanggar IT Inventory', $userx);
            }
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function cek($id = NULL)
    {
        $this->data['content'] = $this->ap_it_m->get_by(array(
            'id_cctv' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);

        $tampung_ref=$this->ap_it_ref_cek_m->get();
        $tampung_cek=$this->ap_it_cek_m->get_by(array('id_cctv' => $id));
        if ($tampung_cek == NULL){
            // $msg='test';
            // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            foreach($tampung_ref as $val){
                $data = array(
                    'id_cctv_cek' => $this->ap_it_cek_m->increment(),
                    'id_cctv' => $id,
                    'desc_cctv_cek' => $val->id_cctv_ref,
                    'ya_tidak_cctv_cek' => NULL,
                    'ket_cctv_cek' => NULL
                );
                $this->ap_it_cek_m->save($data);
            }
        }

        $this->data['cctv'] = $this->ap_it_m->get($id);

        $this->data['cctv_ref'] = $this->ap_it_ref_cek_m->get();
        
        $this->data['cctv_cek'] = $this->ap_it_cek_m->get_by(array(
            'id_cctv' => $id
        ));
        
        $sql = "SELECT * FROM ap_it_cek WHERE id_cctv=? ORDER BY id_cctv_cek DESC LIMIT 1";
        $query = $this->db->query($sql,array($id));
        $row = $query->row();
        if (isset($row)){
            if($row->ya_tidak_cctv_cek == 0 || $row->ya_tidak_cctv_cek == 2 || $row->ya_tidak_cctv_cek = NULL){
                //echo '<script type="text/javascript">alert("' . $row->ya_tidak_cctv_cek . '")</script>';
                $this->data['cctv_cek_kondisi'] = "isi";
            }if($row->ya_tidak_cctv_cek == 1){
                //echo '<script type="text/javascript">alert("' . $row->ya_tidak_cctv_cek . '")</script>';
                $this->data['cctv_cek_kondisi'] = NULL;
            }
        }
        
        $this->data['cctv_kegi'] = $this->ap_it_kegi_m->get_by(array(
            'id_cctv' => $id
        ));

        $this->data['user_info'] = $this->ap_admin_m->get($this->data['cctv']->id_admin);
        
        if ($id) {
            $this->data['content'] = $this->ap_it_cek_m->get_new();
            $data = array(
                'id_cctv_cek' => $this->ap_it_cek_m->increment(),
                'id_cctv' => $id,
                'desc_cctv_cek' => $this->input->post('desc'),
                'ya_tidak_cctv_cek' => $this->input->post('ya_tidak'),
                'ket_cctv_cek' => $this->input->post('keterangan')
            );
        }
        
        if ($id) {
            
            $this->data['content_kegi'] = $this->ap_it_kegi_m->get_new();
            
            $data_kegi = array(
                'id_cctv_kegiatan' => $this->ap_it_kegi_m->increment(),
                'id_cctv' => $id,
                'date_cctv_kegiatan' => $this->input->post('date'),
                'time_start_cctv_kegiatan' => $this->input->post('start'),
                'time_end_cctv_kegiatan' => $this->input->post('end'),
                'uraian_cctv_kegiatan' => $this->input->post('uraian')
            );
        }
        
        if ($this->input->post('cek') != NULL) {
            $rules = $this->ap_it_cek_m->rules;
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == TRUE) {
                $this->ap_it_cek_m->save($data);
                redirect($this->uri->rsegment(1) . '/cek/' . $id);
            }
        }
        
        if ($this->input->post('kegiatan') != NULL) {
            $rules = $this->ap_it_kegi_m->rules;
            $this->form_validation->set_rules($rules);
            
            if ($this->form_validation->run() == TRUE) {
                $this->ap_it_kegi_m->save($data_kegi);
                redirect($this->uri->rsegment(1) . '/cek/' . $id);
            }
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/cek';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $this->db->delete('ap_it_cek', array(
            'id_cctv' => $id
        ));
        $this->db->delete('ap_it_kegiatan', array(
            'id_cctv' => $id
        ));
        $this->ap_it_m->delete($id);
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function delete_cek($id, $parent)
    {
        $this->ap_it_cek_m->delete($id);
        redirect($this->uri->rsegment(1) . '/cek/' . $parent);
    }

    public function delete_kegi($id, $parent)
    {
        $this->ap_it_kegi_m->delete($id);
        redirect($this->uri->rsegment(1) . '/cek/' . $parent);
    }

    public function unduh_pdf_cctv($id)
    {
        $this->data['content'] = $this->ap_it_m->get_by(array(
            'id_cctv' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);

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
        $datatbl=$this->load->view('it_inventory/view_download', $this->data, true);;

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
        $this->data['content'] = $this->ap_it_m->get_by(array(
            'id_cctv' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);

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
        $datatbl=$this->load->view('it_inventory/view_download_old', $this->data, true);;

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

    public function ajax_setuju_semua()
    {
        $tableData = stripcslashes($this->input->post('pTableData'));
        // Decode the JSON array
        $tableData = json_decode($tableData,TRUE);

        for ($x = 0; $x < count($tableData); $x++) {
            $data = array(
                'ya_tidak_cctv_cek' => 1,
                'ket_cctv_cek' =>  $tableData[$x]['keterangan']
            );
            $this->db->where('id_cctv', $tableData[0]['id_cctv']);
            $this->db->where('id_cctv_cek', $tableData[$x]['id_cctv_cek']);
            $this->db->update('ap_it_cek', $data);
        }
    }

    public function batal_setuju_semua($id)
    {
        $data = array(
            'ya_tidak_cctv_cek' => NULL,
            'ket_cctv_cek' => NULL
        );
        $this->db->where('id_cctv', $id);
        $this->db->update('ap_it_cek', $data);

        redirect($this->uri->rsegment(1) . '/cek/' . $id);
    }

    public function ajax_setuju()
    {
        // $id = $this->input->post('id');
        $id_cctv = $this->input->post('id_cctv');
        $id_cek = $this->input->post('id_cctv_cek');
        $catatan=$this->input->post('ket');
        //echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
        $this->data['content'] = $this->ap_it_cek_m->get($id);
        $data = array(
            'ya_tidak_cctv_cek' => 1,
            'ket_cctv_cek' => $catatan
        );
        $this->ap_it_cek_m->updateM($data, $id_cctv, $id_cek);
    }

    public function ajax_batal_setuju()
    {
        $id_cctv = $this->input->post('id_cctv');
        $id_cek = $this->input->post('id_cctv_cek');
        $catatan=$this->input->post('ket');

        $tampung_cek_bawah=$this->ap_it_cek_m->get_by(array('id_cctv' => $id_cctv, 'id_cctv_cek >=' => $id_cek));
        if ($tampung_cek_bawah != NULL){
            // $msg='test';
            // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            foreach($tampung_cek_bawah as $val){
                $data = array(
                    'ya_tidak_cctv_cek' => NULL,
                    'ket_cctv_cek' => NULL
                );
                $this->ap_it_cek_m->updateM($data, $val->id_cctv, $val->id_cctv_cek);
            }
        }
    }

    public function ajax_tidak_setuju()
    {
        // $id = $this->input->post('id');
        $id_cctv = $this->input->post('id_cctv');
        $id_cek = $this->input->post('id_cctv_cek');
        $catatan=$this->input->post('ket');
        //echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
        $this->data['content'] = $this->ap_it_cek_m->get($id);
        $data = array(
            'ya_tidak_cctv_cek' => 0,
            'ket_cctv_cek' => $catatan
        );
        $this->ap_it_cek_m->updateM($data, $id_cctv, $id_cek);

        $tampung_cek_atas=$this->ap_it_cek_m->get_by(array('id_cctv' => $id_cctv, 'id_cctv_cek <' => $id_cek,'ya_tidak_cctv_cek' => NULL));
        if ($tampung_cek_atas != NULL){
            // $msg='test';
            // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            foreach($tampung_cek_atas as $val){
                $data = array(
                    'ya_tidak_cctv_cek' => 1,
                    'ket_cctv_cek' => NULL
                );
                $this->ap_it_cek_m->updateM($data, $val->id_cctv, $val->id_cctv_cek);
            }
        }

        $tampung_cek_bawah=$this->ap_it_cek_m->get_by(array('id_cctv' => $id_cctv, 'id_cctv_cek >' => $id_cek,'ya_tidak_cctv_cek' => NULL));
        if ($tampung_cek_bawah != NULL){
            // $msg='test';
            // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            foreach($tampung_cek_bawah as $val){
                $data = array(
                    'ya_tidak_cctv_cek' => 2,
                    'ket_cctv_cek' => NULL
                );
                $this->ap_it_cek_m->updateM($data, $val->id_cctv, $val->id_cctv_cek);
            }
        }
    }

    public function ajax_batal_tidak_setuju()
    {
        $id_cctv = $this->input->post('id_cctv');
        $id_cek = $this->input->post('id_cctv_cek');
        $catatan=$this->input->post('ket');

        $tampung_cek_bawah=$this->ap_it_cek_m->get_by(array('id_cctv' => $id_cctv, 'id_cctv_cek >=' => $id_cek));
        if ($tampung_cek_bawah != NULL){
            // $msg='test';
            // echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            foreach($tampung_cek_bawah as $val){
                $data = array(
                    'ya_tidak_cctv_cek' => NULL,
                    'ket_cctv_cek' => NULL
                );
                $this->ap_it_cek_m->updateM($data, $val->id_cctv, $val->id_cctv_cek);
            }
        }
    }

    public function ajukan($id = null)
    {
        $this->data['content'] = $this->ap_it_m->get_by(array(
            'id_cctv' => $id,
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna($this->session->userdata('id'),$this->data['content'][0]->id_admin);
        $data = array(
            'flag_pengajuan' => 1,
            'date_create_cctv' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_cctv', $id);
        $this->db->update('ap_it', $data);
        redirect($this->uri->rsegment(1) . '/index/');
    }

}
