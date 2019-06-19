<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_group_hanggar extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penempatan_m');
        $this->load->model('ap_admin_m');
        $this->load->model('ap_hanggar_group_m');
        $this->load->model('ap_hanggar_group_dtl_m');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_pejabat_m');
        $this->load->model('ap_jabatan_ref_m');
    }

    public function index()
    {
            
        $this->db->like('ap_penempatan.uraian_penempatan','HANGGAR');
        $this->data['content'] = $this->ap_penempatan_m->get();

        $this->data['ref_jabatan'] = $this->db->query("SELECT P.id_jabatan, P.uraian_jabatan, A.name_admin FROM `ap_jabatan_ref` P LEFT JOIN ap_pejabat T ON T.id_jabatan = P.id_jabatan LEFT JOIN ap_admin A ON A.id_admin = T.id_admin WHERE P.id_jabatan IN (8,9,10,11,12,13) ORDER BY P.id_jabatan ASC")->result();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function idata($id)
    {
        $this->data['admin'] = $this->ap_admin_m->get_by(array(
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna(1,$this->data['admin'][0]->rules_id);

        $result = $this->ap_hanggar_group_m->get();
        foreach($result as $item):
            $array[] = $item->id_perusahaan; 
        endforeach;
        $ab = implode(",", $array);
       
        //echo '<script type="text/javascript">alert("' . $ab. '")</script>';
        
        $where="`id_perusahaan` NOT IN (".$ab.") AND `status_perusahaan` = 'Aktif' AND `id_perusahaan_kategori` IN (5,6,7,9,14,16,17) AND `pembekuan_perusahaan` NOT IN ('BEKU','CABUT')";
        $this->db->where($where);
        $this->data['dt_perusahaan'] = $this->ap_perusahaan_m->get();

        $this->data['content'] = $this->ap_hanggar_group_m->get();

        $this->db->join('ap_perusahaan', 'ap_perusahaan.id_perusahaan=ap_hanggar_group.id_perusahaan', 'left');
        $this->db->where('id_penempatan=',$id);
        $this->data['group'] = $this->ap_hanggar_group_m->get();

        $query = $this->db->query("SELECT * FROM ap_penempatan WHERE id_penempatan = ".$id." LIMIT 1;");
        $row = $query->row(0);
        $this->data['hanggar'] =$row->uraian_penempatan;


        if($id) {
            if ($this->input->post('peru') != NULL){
            $data = array(
            'id_penempatan' => $id,
            'id_perusahaan' => $this->input->post('peru'),
            'id_admin' => $this->session->userdata('id'),
            'wk_rekam' => date('Y-m-d H:i:s')
            );
            $this->ap_hanggar_group_m->save($data);
            redirect($this->uri->rsegment(1) . '/idata/' . $id);
        }}

        
        $this->data['subview'] = $this->uri->rsegment(1) . '/idata';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id_penem,$id_per){
        //echo '<script type="text/javascript">alert("' . $id_penem. '")</script>';

        $this->db->where('id_penempatan', $id_penem);
        $this->db->where('id_perusahaan', $id_per);
        $this->db->delete('ap_hanggar_group');
        
        redirect($this->uri->rsegment(1) . '/idata/' . $id_penem);
    }

    public function ajax_simpan(){
        //echo '<script type="text/javascript">alert("' . $id_penem. '")</script>';
        $id_penem=$this->input->post('id_penempatan');
        $id_jab=$this->input->post('id_jabatan');

        if($id_jab != NULL){
            $this->db->where('id_penempatan',$id_penem);
            $this->data['validasi'] = $this->ap_hanggar_group_dtl_m->get();

            if($this->data['validasi'] != NULL){
                $data = array(
                    'id_pejabat' => $id_jab
                );
                $this->db->where('id_penempatan',$id_penem);
                $this->db->update('ap_hanggar_group_dtl',$data);
                $data['id']   = $id_penem;
                $data['angka']   = 0;
                echo json_encode($data);
            }else{
                $data = array(
                    'id_penempatan' => $id_penem,
                    'id_pejabat' => $id_jab
                );
                $this->ap_hanggar_group_dtl_m->save($data);
                $data['id']   = $id_penem;
                $data['angka']   = 0;
                echo json_encode($data);
            }
        }else{
            $data['id']   = $id_penem;
            $data['angka']   = 1;
            $data['cata'] = 'Data pejabat belum dipilih!';
            echo json_encode($data);
        }
    }

}