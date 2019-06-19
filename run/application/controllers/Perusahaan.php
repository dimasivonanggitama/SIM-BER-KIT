<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends Goodsyst_Controller
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

    public function edit($id = NULL)
    {
        if ($this->input->post('kota') == '0') {
            $kota = $this->input->post('ket');
        } else {
            
            $kota = $this->input->post('kota');
        }
        
        $jeneng = NULL;
        if (! empty($_FILES['file_skep']['name'])) {
            $jeneng = $this->nama_file($_FILES['file_skep']['name']);
        }
        
        if ($id) {
            $this->data['peru_cate'] = $this->ap_perusahaan_kategori_m->get();
            $this->data['content'] = $this->ap_perusahaan_m->get($id);
            count($this->data['content']) || redirect('404');
            if (! empty($_FILES['file_skep']['name'])) {
                $data = array(
                    'nama_perusahaan' => $this->input->post('nama'),
                    'status_perusahaan' => $this->input->post('status_perusahaan'),
                    'kota_perusahaan' => $kota,
                    'luas_perusahaan' => $this->input->post('luas'),
                    'npwp_perusahaan' => $this->input->post('npwp'),
                    'pemilik_perusahaan' => $this->input->post('pemilik'),
                    'jabatan_pemilik_perusahaan' => $this->input->post('jabatan'),
                    'telp_pemilik_perusahaan' => $this->input->post('telp_pemilik'),
                    'email_pemilik_perusahaan' => $this->input->post('email_pemilik'),
                    'skep_penetapan_perusahaan' => $this->input->post('skep_penetapan'),
                    'file_skep_perusahaan' => $jeneng,
                    'tgl_skep_penetapan_perusahaan' => $this->input->post('skep_tgl_penetapan'),
                    'skep_perubahan_perusahaan' => $this->input->post('skep_peru_penetapan'),
                    'tgl_skep_perubahan_perusahaan' => $this->input->post('skep_tgl_peru_penetapan'),
                    'jenis_lokasi_perusahaan' => $this->input->post('lokasi'),
                    'nama_kawasan_perusahaan' => $this->input->post('kawasan'),
                    'hasil_produksi_perusahaan' => $this->input->post('hasil_produk'),
                    'nppbkc_perusahaan' => $this->input->post('nppbkc'),
                    'c_jenis_gol' => $this->input->post('i_c_jenis_gol'),
                    'alamat_perusahaan' => $this->input->post('alamat'),
                    'longitude_perusahaan' => $this->input->post('longitude'),
                    'latitude_perusahaan' => $this->input->post('latitude'),
                    'id_admin' => $this->session->userdata('id'),
                    'id_perusahaan_kategori' => $this->input->post('perusahaan_kategori'),
                    'nppbkc_tgl_perusahaan' => $this->input->post('nppbkc_tgl'),
                    'pembekuan_perusahaan' => $this->input->post('pembekuan')
                
                );
            } else {
                $data = array(
                    'nama_perusahaan' => $this->input->post('nama'),
                    'status_perusahaan' => $this->input->post('status_perusahaan'),
                    'kota_perusahaan' => $kota,
                    'luas_perusahaan' => $this->input->post('luas'),
                    'npwp_perusahaan' => $this->input->post('npwp'),
                    'pemilik_perusahaan' => $this->input->post('pemilik'),
                    'jabatan_pemilik_perusahaan' => $this->input->post('jabatan'),
                    'telp_pemilik_perusahaan' => $this->input->post('telp_pemilik'),
                    'email_pemilik_perusahaan' => $this->input->post('email_pemilik'),
                    'skep_penetapan_perusahaan' => $this->input->post('skep_penetapan'),
                    'tgl_skep_penetapan_perusahaan' => $this->input->post('skep_tgl_penetapan'),
                    'skep_perubahan_perusahaan' => $this->input->post('skep_peru_penetapan'),
                    'tgl_skep_perubahan_perusahaan' => $this->input->post('skep_tgl_peru_penetapan'),
                    'jenis_lokasi_perusahaan' => $this->input->post('lokasi'),
                    'nama_kawasan_perusahaan' => $this->input->post('kawasan'),
                    'hasil_produksi_perusahaan' => $this->input->post('hasil_produk'),
                    'nppbkc_perusahaan' => $this->input->post('nppbkc'),
                    'c_jenis_gol' => $this->input->post('i_c_jenis_gol'),
                    'alamat_perusahaan' => $this->input->post('alamat'),
                    'longitude_perusahaan' => $this->input->post('longitude'),
                    'latitude_perusahaan' => $this->input->post('latitude'),
                    'id_admin' => $this->session->userdata('id'),
                    'id_perusahaan_kategori' => $this->input->post('perusahaan_kategori'),
                    'nppbkc_tgl_perusahaan' => $this->input->post('nppbkc_tgl'),
                    'pembekuan_perusahaan' => $this->input->post('pembekuan')
                
                );
            }
        } else {
            
            $this->data['peru_cate'] = $this->ap_perusahaan_kategori_m->get();
            $this->data['content'] = $this->ap_perusahaan_m->get_new();
            $data = array(
                'id_perusahaan' => $this->ap_perusahaan_m->increment(),
                'nama_perusahaan' => $this->input->post('nama'),
                'alamat_perusahaan' => $this->input->post('alamat'),
                'id_perusahaan_kategori' => $this->input->post('perusahaan_kategori'),
                'status_perusahaan' => $this->input->post('status_perusahaan'),
                'kota_perusahaan' => $kota,
                'luas_perusahaan' => $this->input->post('luas'),
                'npwp_perusahaan' => $this->input->post('npwp'),
                'pemilik_perusahaan' => $this->input->post('pemilik'),
                'jabatan_pemilik_perusahaan' => $this->input->post('jabatan'),
                'telp_pemilik_perusahaan' => $this->input->post('telp_pemilik'),
                'email_pemilik_perusahaan' => $this->input->post('email_pemilik'),
                'skep_penetapan_perusahaan' => $this->input->post('skep_penetapan'),
                // 'file_skep_perusahaan' => $jeneng,
                'tgl_skep_penetapan_perusahaan' => $this->input->post('skep_tgl_penetapan'),
                'skep_perubahan_perusahaan' => $this->input->post('skep_peru_penetapan'),
                'tgl_skep_perubahan_perusahaan' => $this->input->post('skep_tgl_peru_penetapan'),
                'jenis_lokasi_perusahaan' => $this->input->post('lokasi'),
                'nama_kawasan_perusahaan' => $this->input->post('kawasan'),
                'hasil_produksi_perusahaan' => $this->input->post('hasil_produk'),
                'nppbkc_perusahaan' => $this->input->post('nppbkc'),
                'c_jenis_gol' => $this->input->post('i_c_jenis_gol'),
                'longitude_perusahaan' => $this->input->post('longitude'),
                'latitude_perusahaan' => $this->input->post('latitude'),
                'id_admin' => $this->session->userdata('id'),
                'nppbkc_tgl_perusahaan' => $this->input->post('nppbkc_tgl'),
                'pembekuan_perusahaan' => $this->input->post('pembekuan')
            
            );
        }
        
        $rules = $this->ap_perusahaan_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['file_skep']['name'])) {
                $this->upload_dokumen($jeneng, 'file_skep');
                if ($id) {
                    unlink('./uploads/' . $this->data['content']->file_skep_perusahaan);
                }
            }
            $this->ap_perusahaan_m->save($data, $id);
            
            redirect($this->uri->rsegment(1) . '/index/');
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
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

    public function detail($id)
    {
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        $this->data['produk'] = $this->ap_perusahaan_produk_m->get_by(array(
            'id_perusahaan' => $id
        ));
        
        if (! empty($_FILES['file']['name']) && ! empty($_FILES['filex']['name'])) {
            $jeneng = $this->nama_file($_FILES['file']['name']);
            $jenengx = $this->nama_file($_FILES['filex']['name']);
            $data = array(
                'id_perusahaan_produk' => $this->ap_perusahaan_produk_m->increment(),
                'id_perusahaan' => $id,
                'image_perusahaan_produk' => $jeneng,
                'imagex_perusahaan_produk' => $jenengx,
                'nama_perusahaan_produk' => $this->input->post('nama'),
                'ket_perusahaan_produk' => $this->input->post('ket')
            );
        } elseif (! empty($_FILES['file']['name'])) {
            $jeneng = $this->nama_file($_FILES['file']['name']);
            $data = array(
                'id_perusahaan_produk' => $this->ap_perusahaan_produk_m->increment(),
                'id_perusahaan' => $id,
                'image_perusahaan_produk' => $jeneng,
                'nama_perusahaan_produk' => $this->input->post('nama'),
                'ket_perusahaan_produk' => $this->input->post('ket')
            );
        } elseif (! empty($_FILES['filex']['name'])) {
            $jenengx = $this->nama_file($_FILES['filex']['name']);
            $data = array(
                'id_perusahaan_produk' => $this->ap_perusahaan_produk_m->increment(),
                'id_perusahaan' => $id,
                'imagex_perusahaan_produk' => $jenengx,
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
            if (! empty($_FILES['filex']['name'])) {
                $this->upload_gambar($jenengx, 'filex');
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

    public function ajax_detail()
    {
        $id = $this->input->post('id');
        $this->db->join('ap_perusahaan_kategori', 'ap_perusahaan_kategori.id_perusahaan_kategori=ap_perusahaan.id_perusahaan_kategori', 'left');
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        
        $this->load->view('maps/ajax_view', $this->data);
    }

    public function delete($id)
    {
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        $this->ap_perusahaan_m->delete($id);
        unlink('./uploads/' . $this->data['content']->file_skep_perusahaan);
        
        $content = $this->ap_perusahaan_produk_m->get_by(array(
            'id_perusahaan' => $id
        ));
        foreach ($content as $val) :
            $this->ap_perusahaan_produk_m->delete($val->id_perusahaan_produk);
            unlink('./uploads/' . $val->image_perusahaan_produk);
        endforeach
        ;
        
        redirect($this->uri->rsegment(1) . '/index/');
    }

    public function detail_edit($parent, $id)
    {
        $this->data['content'] = $this->ap_perusahaan_m->get($id);
        $this->data['produk'] = $this->ap_perusahaan_produk_m->get_by(array(
            'id_perusahaan' => $id
        ));
        $this->data['gambar'] = $this->ap_perusahaan_produk_m->get($id);
        
        if ($parent) {
            if (! empty($_FILES['file']['name']) && ! empty($_FILES['filex']['name'])) {
                $jeneng = $this->nama_file($_FILES['file']['name']);
                $jenengx = $this->nama_file($_FILES['filex']['name']);
                $data = array(
                    'image_perusahaan_produk' => $jeneng,
                    'imagex_perusahaan_produk' => $jenengx,
                    'nama_perusahaan_produk' => $this->input->post('nama'),
                    'ket_perusahaan_produk' => $this->input->post('ket')
                
                );
            } elseif (! empty($_FILES['file']['name'])) {
                $jeneng = $this->nama_file($_FILES['file']['name']);
                $data = array(
                    'image_perusahaan_produk' => $jeneng,
                    'nama_perusahaan_produk' => $this->input->post('nama'),
                    'ket_perusahaan_produk' => $this->input->post('ket')
                
                );
            } elseif (! empty($_FILES['filex']['name'])) {
                $jenengx = $this->nama_file($_FILES['filex']['name']);
                $data = array(

                    'imagex_perusahaan_produk' => $jenengx,
                    'nama_perusahaan_produk' => $this->input->post('nama'),
                    'ket_perusahaan_produk' => $this->input->post('ket')
                
                );
            } else {
                $data = array(
                    'nama_perusahaan_produk' => $this->input->post('nama'),
                    'ket_perusahaan_produk' => $this->input->post('ket')
                
                );
            }
        }
        $rules = $this->ap_perusahaan_produk_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['file']['name'])) {
                
                unlink('./uploads/' . $this->data['gambar']->image_perusahaan_produk);
                
                $this->upload_gambar($jeneng, 'file');
            }
            if (! empty($_FILES['filex']['name'])) {
                
                unlink('./uploads/' . $this->data['gambar']->imagex_perusahaan_produk);
                
                $this->upload_gambar($jenengx, 'filex');
            }
            $this->session->set_flashdata('status', 'Success!');
            $this->ap_perusahaan_produk_m->save($data, $id);
            redirect($this->uri->rsegment(1) . '/' . detail . '/' . $parent);
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/detail_edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete_produk($parent, $id)
    {
        $this->data['content'] = $this->ap_perusahaan_produk_m->get($id);
        $this->ap_perusahaan_produk_m->delete($id);
        unlink('./uploads/' . $this->data['content']->image_perusahaan_produk);
        unlink('./uploads/' . $this->data['content']->imagex_perusahaan_produk);
        redirect($this->uri->rsegment(1) . '/detail/' . $parent);
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
