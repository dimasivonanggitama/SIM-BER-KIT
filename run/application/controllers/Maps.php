<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('googlemaps');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_maps_m');
        $this->load->model('ap_perusahaan_kategori_m');
    }

    public function index($kate = NULL)
    {
        if ($kate == NUll) {
            $kate = 0;
        }
        
        $this->data['peru_cate'] = $this->ap_perusahaan_kategori_m->get();
        
        $this->data['map'] = $this->ap_maps_m->get();
        
        foreach ($this->data['map'] as $val) {
            
            $config['center'] = '' . $val->latitude_config_map . ',' . $val->longitude_config_map . '';
            $config['zoom'] = '' . $val->zoom_config_map . '';
            $config['cluster'] = TRUE;
            $this->googlemaps->initialize($config);
        }
        if ($kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
        }
        
        $this->data['content'] = $this->ap_perusahaan_m->get();
        
        foreach ($this->data['content'] as $val) {
            
            $marker = array();
            $marker['position'] = '' . $val->latitude_perusahaan . ',' . $val->longitude_perusahaan . '';
            $marker['infowindow_content'] = '<h3>' . $val->nama_perusahaan . '</h3><p>' . $val->alamat_perusahaan . '</p><a href="#" onclick="ajax_detail(' . $val->id_perusahaan . ')" class="btn btn-xs btn-info">' . $this->data['lang_detail'] . '</a>';
            $marker['animation'] = 'DROP';
            
            //$marker['icon'] = 'https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' . $val->id_perusahaan . '|997FFF|000000';
            $this->googlemaps->add_marker($marker);
            //var markerCluster = new MarkerClusterer('map', $marker, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }
        
        $this->data['map'] = $this->googlemaps->create_map();
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function config_maps($id = NULL)
    {
        if ($id) {
            $this->data['content'] = $this->ap_maps_m->get($id);
            count($this->data['content']) || redirect('404');
            $data = array(
                'latitude_config_map' => $this->input->post('latitude'),
                'longitude_config_map' => $this->input->post('longitude'),
                'zoom_config_map' => $this->input->post('zoom'),
                'id_admin' => $this->session->userdata('id'),
                'nama_map' => $this->input->post('nama'),
                'longitude_map' => $this->input->post('longitude_map'),
                'latitude_map' => $this->input->post('latitude_map'),
                'alamat_map' => $this->input->post('alamat')
            );
        } else {
            $this->data['content'] = $this->ap_maps_m->get_new();
            $data = array(
                'id_config_map' => $this->ap_maps_m->increment(),
                'latitude_config_map' => $this->input->post('latitude'),
                'longitude_config_map' => $this->input->post('longitude'),
                'zoom_config_map' => $this->input->post('zoom'),
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        $rules = $this->ap_maps_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            
            $this->ap_maps_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/config';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajax_detail()
    {
        $id = $this->input->post('id');
        $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        
        $this->load->view($this->uri->rsegment(1) . '/ajax_view', $this->data);
    }

    public function cari_anak($id = array(), $in = array())
    {
        $new_id = array();
        $i = 0;
        foreach ($id as $val) :
            $anak = $this->ap_perusahaan_kategori_m->get_by(array(
                'parent_perusahaan_kategori' => $val
            ));
            
            if (count($anak) != 0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_perusahaan_kategori);
                    $anak_next = $this->ap_perusahaan_kategori_m->get_by(array(
                        'parent_perusahaan_kategori' => $key->id_perusahaan_kategori
                    ));
                    if (count($anak_next) != 0) {
                        array_push($new_id, $key->id_perusahaan_kategori);
                        $i ++;
                    }
                endforeach
                ;
            }
        endforeach
        ;
        if ($i == 0) {
            return $in;
        } else {
            return $this->cari_anak($new_id, $in);
        }
    }
}
