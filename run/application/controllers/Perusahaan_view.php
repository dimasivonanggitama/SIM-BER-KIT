<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan_view extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_maps_m');
        $this->load->model('ap_perusahaan_m');
        $this->load->model('ap_perusahaan_kategori_m');
        $this->load->model('ap_perusahaan_produk_m');
    }

    public function index($kota = NULL, $status = NULL, $tahun = NULL, $kate = NULL, $beku = NULL)
    {
        if ($kota == NUll) {
            $kota = 0;
        }
        if ($status == NUll) {
            $status = 0;
        }
        if ($tahun == NUll) {
            $tahun = 0;
        }
        if ($kate == NUll) {
            $kate = 0;
        }
        if ($beku == NUll) {
            $beku = 0;
        }
        
        $this->data['peru_cate'] = $this->ap_perusahaan_kategori_m->get();
        $this->db->group_by('kota_perusahaan');
        $this->data['kota'] = $this->ap_perusahaan_m->get();
        $this->db->group_by('status_perusahaan');
        $this->data['status'] = $this->ap_perusahaan_m->get();
        $this->db->group_by('YEAR(tgl_skep_penetapan_perusahaan)');
        $this->data['tahun'] = $this->ap_perusahaan_m->get();
        
        if ($kota != '0' && $status != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $status != '0' && $tahun != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $status != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $tahun != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota)
            ));
        } elseif ($kate != '0' && $tahun != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $status != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($kota != '0' && $tahun != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($status != '0' && $tahun != '0') {
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status),
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kota != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'kota_perusahaan' => str_replace('_', ' ', $kota)
            ));
        } elseif ($status != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'status_perusahaan' => str_replace('_', ' ', $status)
            ));
        } elseif ($tahun != '0') {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
                'YEAR(tgl_skep_penetapan_perusahaan)' => $tahun
            ));
        } elseif ($kate != '0') {
            $in = $this->cari_anak(array(
                $kate
            ), array(
                $kate
            ));
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->db->where_in('ap_perusahaan.id_perusahaan_kategori', $in);
            $this->data['content'] = $this->ap_perusahaan_m->get();
        } else {
            if ($beku != '0') {
                $this->db->where_in('pembekuan_perusahaan', $beku);
            }
            $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
            $this->data['content'] = $this->ap_perusahaan_m->get();
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function maps($id = NULL)
    {
        $this->data['map'] = $this->ap_maps_m->get();
        
        foreach ($this->data['map'] as $val) {
            
            $config['center'] = '' . $val->latitude_config_map . ',' . $val->longitude_config_map . '';
            $config['zoom'] = '' . $val->zoom_config_map . '';
            $config['cluster'] = TRUE;
            $this->googlemaps->initialize($config);
            
            $marker = array();
            $marker['position'] = '' . $val->latitude_map . ',' . $val->longitude_map . '';
            $marker['infowindow_content'] = '<h3>' . $val->nama_map . '</h3><p>' . $val->alamat_map . '</p>';
            $marker['animation'] = 'DROP';
            $marker['icon'] = 'https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|997FFF|000000';
            $this->googlemaps->add_marker($marker);
        }
        
        $this->data['content'] = $this->ap_perusahaan_m->get_by(array(
            'id_perusahaan' => $id
        ));
        
        foreach ($this->data['content'] as $val) {
            
            $marker = array();
            $marker['position'] = '' . $val->latitude_perusahaan . ',' . $val->longitude_perusahaan . '';
            $marker['infowindow_content'] = '<h3>' . $val->nama_perusahaan . '</h3><p>' . $val->alamat_perusahaan . '</p><a href="#" onclick="ajax_detail(' . $val->id_perusahaan . ')" class="btn btn-xs btn-info">' . $this->data['lang_detail'] . '</a>';
            $marker['animation'] = 'DROP';
            // $marker['icon'] = 'https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' . $val->id_perusahaan . '|997FFF|000000';
            $this->googlemaps->add_marker($marker);
        }
        
        $this->data['map'] = $this->googlemaps->create_map();
        $this->data['subview'] = $this->uri->rsegment(1) . '/maps';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajax_detail()
    {
        $id = $this->input->post('id');
        $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        
        $this->load->view('maps/ajax_view', $this->data);
    }

    public function detail($id)
    {
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        $this->data['produk'] = $this->ap_perusahaan_produk_m->get_by(array(
            'id_perusahaan' => $id
        ));
        
        if (! empty($_FILES['file']['name'])) {
            $jeneng = $this->nama_file($_FILES['file']['name']);
            $data = array(
                'id_perusahaan_produk' => $this->ap_perusahaan_produk_m->increment(),
                'id_perusahaan' => $id,
                'image_perusahaan_produk' => $jeneng,
                'nama_perusahaan_produk' => $this->input->post('nama'),
                'ket_perusahaan_produk' => $this->input->post('ket')
            );
        }
        
        $rules = $this->ap_perusahaan_produk_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['file']['name'])) {
                $this->upload_gambar($jeneng, 'file');
            }
            $this->session->set_flashdata('status', 'Success!');
            $this->ap_perusahaan_produk_m->save($data, NULL);
            redirect($this->uri->rsegment(1) . '/' . $this->uri->rsegment(2) . '/' . $id);
        }
        
        // map
        $this->data['map'] = $this->ap_maps_m->get();
        
        foreach ($this->data['map'] as $val) {
            
            $config['center'] = '' . $val->latitude_config_map . ',' . $val->longitude_config_map . '';
            $config['zoom'] = '' . $val->zoom_config_map . '';
            $config['cluster'] = TRUE;
            $this->googlemaps->initialize($config);
            
            $marker = array();
            $marker['position'] = '' . $val->latitude_map . ',' . $val->longitude_map . '';
            $marker['infowindow_content'] = '<h3>' . $val->nama_map . '</h3><p>' . $val->alamat_map . '</p>';
            $marker['animation'] = 'DROP';
            $marker['icon'] = 'https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|997FFF|000000';
            $this->googlemaps->add_marker($marker);
        }
        
        $this->data['contentx'] = $this->ap_perusahaan_m->get_by(array(
            'id_perusahaan' => $id
        ));
        
        foreach ($this->data['contentx'] as $val) {
            
            $marker = array();
            $marker['position'] = '' . $val->latitude_perusahaan . ',' . $val->longitude_perusahaan . '';
            $marker['infowindow_content'] = '<h3>' . $val->nama_perusahaan . '</h3><p>' . $val->alamat_perusahaan . '</p><a href="#" onclick="ajax_detail(' . $val->id_perusahaan . ')" class="btn btn-xs btn-info">' . $this->data['lang_detail'] . '</a>';
            $marker['animation'] = 'DROP';
            // $marker['icon'] = 'https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' . $val->id_perusahaan . '|997FFF|000000';
            $this->googlemaps->add_marker($marker);
        }
        $this->data['map'] = $this->googlemaps->create_map();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/detail';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
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
