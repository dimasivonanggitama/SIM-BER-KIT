<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_sop_m');
        $this->load->model('ap_sop_kategori_m');
    }

    public function index($id = NULL)
    {
        if ($id) {
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_sop_kategori', 'ap_sop_kategori.id_sop_kategori=ap_sop.id_sop_kategori', 'left');
            $this->db->where_in('ap_sop.id_sop_kategori',$in);
            $this->db->order_by('ap_sop.id_sop',"DESC");
            $this->data['content'] = $this->ap_sop_m->get();
        } else {
            $this->db->join('ap_sop_kategori', 'ap_sop_kategori.id_sop_kategori=ap_sop.id_sop_kategori', 'left');
            $this->db->order_by('ap_sop.id_sop',"DESC");
            $this->data['content'] = $this->ap_sop_m->get();
        }
        
        $this->data['sop_kate'] = $this->ap_sop_kategori_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_sop_kategori_m->get_by(array(
                'parent_sop_kategori'=>$val
            ));
            
            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_sop_kategori);
                    $anak_next = $this->ap_sop_kategori_m->get_by(array(
                        'parent_sop_kategori'=>$key->id_sop_kategori
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_sop_kategori);
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
