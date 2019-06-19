<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->helper('file');
        $this->load->helper('string');
        $this->load->model('ap_penerimaan_m');
        $this->load->model('ap_penerimaan_cukai_m');
        $this->load->model('ap_penerimaan_pabean_m');
        $this->load->model('ap_pengumuman_m');
        $this->load->model('ap_popup_m');
    }

    public function index()
    {
        //echo '<script type="text/javascript">alert("' . join($tampungc, ',') . '")</script>';
        
        // monitoring penerimaan
        $this->db->order_by('date_penerimaan DESC');
        $this->db->limit(1);
        $sementara = $this->ap_penerimaan_m->get_by(array(), TRUE);
        $id = $sementara->id_penerimaan;
        $this->data['content'] = $this->ap_penerimaan_m->get($id);
        $this->data['content_cukai'] = $this->ap_penerimaan_cukai_m->get_by(array(
            'id_penerimaan' => $id
        ));
        $this->data['content_pabean'] = $this->ap_penerimaan_pabean_m->get_by(array(
            'id_penerimaan' => $id
        ));
        
        // pengumuman
        $this->db->where("DATE(date_start_pengumuman)>='" . date('Y-m-d') . "'");
        $start = $this->ap_pengumuman_m->get();
        
        $this->db->where("DATE(date_end_pengumuman)>='" . date('Y-m-d') . "'");
        $end = $this->ap_pengumuman_m->get();
        
        $id_pengumuman = array();
        foreach ($start as $value) :
            array_push($id_pengumuman, $value->id_pengumuman);
        endforeach
        ;
        
        foreach ($end as $value) :
            array_push($id_pengumuman, $value->id_pengumuman);
        endforeach
        ;
        
        if (count($id_pengumuman)) {
            $this->db->order_by('date_start_pengumuman ASC');
            $this->db->where_in('id_pengumuman', array_unique($id_pengumuman));
            $this->data['pengumuman'] = $this->ap_pengumuman_m->get();
        } else {
            $this->data['pengumuman'] = array();
        }
        
        // popup
        $this->db->where("DATE(start_popup)<='" . date('Y-m-d') . "'");
        $this->db->where("DATE(end_popup)>='" . date('Y-m-d') . "'");
        $this->data['popup'] = $this->ap_popup_m->get();

        //peraturan
        // line 1
        $sql1a = "SELECT * FROM ap_admin WHERE id_admin = (SELECT id_admin FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1)";
        $query1a = $this->db->query($sql1a);
        $this->data['gambaradmin1']= $query1a->row();
        $sql2a = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group = (SELECT id_peraturan_group FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1)";
        $query2a = $this->db->query($sql2a);
        $this->data['rctu1'] = $query2a->row();
        $sql3a = "SELECT * FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1";
        $query3a = $this->db->query($sql3a);
        $this->data['rct1'] = $query3a->row();
         // line 2
         $sql1b = "SELECT * FROM ap_admin WHERE id_admin = (SELECT id_admin FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1,1)";
         $query1b = $this->db->query($sql1b);
         $this->data['gambaradmin2']= $query1b->row();
         $sql2b = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group = (SELECT id_peraturan_group FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1,1)";
         $query2b = $this->db->query($sql2b);
         $this->data['rctu2'] = $query2b->row();
         $sql3b = "SELECT * FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 1,1";
         $query3b = $this->db->query($sql3b);
         $this->data['rct2'] = $query3b->row();
        // line 3
        $sql1c = "SELECT * FROM ap_admin WHERE id_admin = (SELECT id_admin FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 2,1)";
        $query1c = $this->db->query($sql1c);
        $this->data['gambaradmin3']= $query1c->row();
        $sql2c = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group = (SELECT id_peraturan_group FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 2,1)";
        $query2c = $this->db->query($sql2c);
        $this->data['rctu3'] = $query2c->row();
        $sql3c = "SELECT * FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 2,1";
        $query3c = $this->db->query($sql3c);
        $this->data['rct3'] = $query3c->row();
        // line 4
         $sql1d = "SELECT * FROM ap_admin WHERE id_admin = (SELECT id_admin FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 3,1)";
         $query1d = $this->db->query($sql1d);
         $this->data['gambaradmin4']= $query1d->row();
         $sql2d = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group = (SELECT id_peraturan_group FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 3,1)";
         $query2d = $this->db->query($sql2d);
         $this->data['rctu4'] = $query2d->row();
         $sql3d = "SELECT * FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 3,1";
         $query3d = $this->db->query($sql3d);
         $this->data['rct4'] = $query3d->row();
        // line 5
         $sql1e = "SELECT * FROM ap_admin WHERE id_admin = (SELECT id_admin FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 4,1)";
         $query1e = $this->db->query($sql1e);
         $this->data['gambaradmin5']= $query1e->row();
         $sql2e = "SELECT * FROM ap_peraturan_group WHERE id_peraturan_group = (SELECT id_peraturan_group FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 4,1)";
         $query2e = $this->db->query($sql2e);
         $this->data['rctu5'] = $query2e->row();
         $sql3e = "SELECT * FROM ap_peraturan ORDER BY id_peraturan DESC LIMIT 4,1";
         $query3e = $this->db->query($sql3e);
         $this->data['rct5'] = $query3e->row();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}
