<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi2 extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_surat_jenis_m');
        $this->load->model('ap_surat_sifat_m');
        $this->load->model('ap_surat_masuk2_m');
        $this->load->model('ci_surat_disposisikep_m');
        $this->load->model('ci_surat_disposisiketentuan_m');
    }

    public function index($id = NULL)
    {if ($id) {//untuk kategori
        $in=$this->cari_anak(array($id),array($id));
        $this->db->join('ci_surat_disposisikep', 'ci_surat_disposisikep.id_kep=ap_surat_masuk2.id_kep', 'left');

        $this->db->where_in('ap_surat_masuk2.id_kep',$in);

        $this->db->order_by('ap_surat_masuk2.id_kep',"DESC");

        $this->data['content'] = $this->ap_surat_masuk2_m->get();
    } else {//untuk tampil
        $this->db->join('ci_surat_disposisikep','ci_surat_disposisikep.id_kep=ap_surat_masuk2.id_kep','left');

        // $this->db->where('ci_surat_disposisikasi.id_kasi',$id);
        $this->db->order_by('ap_surat_masuk2.id_kep',"DESC");

        // $query = $this->db->get();
        $this->data['content'] = $this->ap_surat_masuk2_m->get();
    }

    $this->data['sifat_srt'] = $this->ci_surat_disposisikep_m->get();

    $this->data['subview'] = $this->uri->rsegment(1) . '/index';
    $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
    $this->load->view('_layout_main', $this->data);
    }

    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ci_surat_disposisikep_m->get_by(array(
                'parent_kep'=>$val
            ));

            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_kep);
                    $anak_next = $this->ci_surat_disposisikep_m->get_by(array(
                        'parent_kep'=>$key->id_kep
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_kep);
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
