<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_admin_m');
        $this->load->model('ap_penempatan_m');
            }

    public function index($id = NULL)
    {
        if ($id) {
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_penempatan', 'ap_penempatan.id_penempatan=ap_admin.id_penempatan', 'left');
            $this->db->where_in('ap_admin.id_penempatan',$in);
            $this->db->where('id_admin!=', 1);
            $this->db->where('id_pegawai_aktif =', 1);
            $this->db->order_by('ap_admin.id_admin',"DESC");
            $this->data['content'] = $this->ap_admin_m->get();
        } else {
            $this->db->join('ap_penempatan', 'ap_penempatan.id_penempatan=ap_admin.id_penempatan', 'left');
            $this->db->where('id_admin!=', 1);
            $this->db->where('id_pegawai_aktif =', 1);
            $this->db->order_by('ap_admin.id_admin',"DESC");
            $this->data['content'] = $this->ap_admin_m->get();
        }

        $this->data['pegawai_kate'] = $this->ap_penempatan_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    } 

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_penempatan_m->get_by(array(
                'uraian_penempatan'=>$val
            ));
            
            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_penempatan);
                    $anak_next = $this->ap_penempatan_m->get_by(array(
                        'uraian_penempatan'=>$key->id_penempatan
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_penempatan);
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

}