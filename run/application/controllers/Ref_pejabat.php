<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_pejabat extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_jabatan_ref_m');
        $this->load->model('ap_pejabat_m');
        $this->load->model('ap_admin_m');
        //id_pegawai_aktif = 1
        //id_eselon = 1,2
    }

    public function index()
    {

        //
        $result = $this->ap_pejabat_m->get();
        if($result != NULL){
            foreach($result as $item):
                $array[]=$item->id_jabatan;
            endforeach;
            $tampung=implode(",", $array);
            $where="`id_jabatan` NOT IN (".$tampung.")";
            $this->db->where($where);
            $this->db->order_by('ap_jabatan_ref.id_jabatan',"ASC");
            $this->data['ref_jabatan']=$this->ap_jabatan_ref_m->get();

            foreach($result as $item2):
                $array2[]=$item2->id_admin;
            endforeach;
            $tampung2=implode(",", $array2);
            $where2="`id_admin` NOT IN (".$tampung2.") AND `id_eselon` IN (1,2) AND `id_pegawai_aktif` = 1 AND `name_admin` != 'Admin'";
            $this->db->where($where2);
            $this->db->order_by('ap_admin.id_eselon',"ASC");
            $this->data['ref_pegawai']=$this->ap_admin_m->get();
        }else{
            $this->db->order_by('ap_jabatan_ref.id_jabatan',"ASC");
            $this->data['ref_jabatan']=$this->ap_jabatan_ref_m->get();

            $where2="`id_eselon` IN (1,2) AND `id_pegawai_aktif` = 1 AND `name_admin` != 'Admin'";
            $this->db->where($where2);
            $this->db->order_by('ap_admin.id_eselon',"ASC");
            $this->data['ref_pegawai']=$this->ap_admin_m->get();
        }
        
        $this->data['dt_pejabat'] = $this->db->query("SELECT P.id_pejabat as id_pejabat, T.uraian_jabatan as uraian_jabatan, A.name_admin as name_admin FROM ap_pejabat P LEFT JOIN ap_jabatan_ref T ON T.id_jabatan = P.id_jabatan LEFT JOIN ap_admin A ON A.id_admin = P.id_admin ORDER BY T.id_jabatan ASC")->result();

        if ($this->input->post('id_jabatan') != NULL && $this->input->post('id_pejabat') != NULL){
            $data = array(
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_admin' => $this->input->post('id_pejabat'),
            'id_admin_rekam' => $this->session->userdata('id'),
            'wk_rekam' => date('Y-m-d H:i:s')
            );
            $this->ap_pejabat_m->save($data);
            redirect($this->uri->rsegment(1));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id_pej){
        //echo '<script type="text/javascript">alert("' . $id_penem. '")</script>';

        $this->db->where('id_pejabat', $id_pej);
        $this->db->delete('ap_pejabat');
        
        redirect($this->uri->rsegment(1));
    }

}