<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_sharing_pic extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penempatan_m');
        $this->load->model('ap_admin_m');
        $this->load->model('ap_sharing_pic_m');
    }

    public function index()
    {
            
        $id_penem = array(18,19,20,21,22,23,24,25,26);
        $this->db->where_in('id_penempatan', $id_penem);
        $this->db->order_by('ap_penempatan.id_penempatan',"DESC");
        $this->data['content'] = $this->ap_penempatan_m->get();

        $this->db->where('id_admin!=',1);
        $this->db->where('id_pegawai_aktif=',1);
        $this->db->order_by('id_eselon', "asc");
        $this->data['ref_pic'] = $this->ap_admin_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id_penem,$id_adm){
        //echo '<script type="text/javascript">alert("' . $id_penem. '")</script>';

        $this->db->where('id_penempatan', $id_penem);
        $this->db->where('id_admin', $id_adm);
        $this->db->delete('ap_sharing_pic');
        
        redirect($this->uri->rsegment(1) . '/idata/' . $id_penem);
    }

    public function idata($id)
    {
        $this->data['admin'] = $this->ap_admin_m->get_by(array(
            'id_admin' => $this->session->userdata('id')
        ));
        cek_pengguna(1,$this->data['admin'][0]->rules_id);

        $result = $this->ap_sharing_pic_m->get();
        foreach($result as $item):
            $array[] = $item->id_admin; 
        endforeach;
        $ab = implode(",", $array);
       
        //echo '<script type="text/javascript">alert("' . $ab. '")</script>';
        
        $where="`id_admin` NOT IN (".$ab.") AND `id_admin` != 1 AND `id_pegawai_aktif` = 1";
        $this->db->where($where);
        $this->db->order_by('id_eselon', "asc");
        $this->data['dt_admin'] = $this->ap_admin_m->get();

        //$this->data['content'] = $this->ap_hanggar_group_m->get();

        $this->data['group'] = $this->db->query("SELECT a.id_admin, a.name_admin, b.id_penempatan FROM ap_admin a LEFT JOIN ap_sharing_pic b ON b.id_admin = a.id_admin WHERE b.id_penempatan = ".$id." ORDER BY id_eselon ASC")->result();

        $query = $this->db->query("SELECT * FROM ap_penempatan WHERE id_penempatan = ".$id." LIMIT 1;");
        $row = $query->row(0);
        $this->data['unit_bag'] =$row->uraian_penempatan;


        if($id) {
            if ($this->input->post('pegaw') != NULL){
            $data = array(
            'id_penempatan' => $id,
            'id_admin' => $this->input->post('pegaw'),
            );
            $this->ap_sharing_pic_m->save($data);
            redirect($this->uri->rsegment(1) . '/idata/' . $id);
        }}

        
        $this->data['subview'] = $this->uri->rsegment(1) . '/idata';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

}