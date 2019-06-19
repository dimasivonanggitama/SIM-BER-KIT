<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_penerimaan_m');
        $this->load->model('ap_penerimaan_cukai_m');
        $this->load->model('ap_penerimaan_pabean_m');
    }

    public function index($id = NULL)
    {
    	$this->db->order_by('id_penerimaan DESC');
        $this->data['content'] = $this->ap_penerimaan_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['pabean'] = array(
            'bm',
            'bk',
            'pab_lain'
        );
        $this->data['cukai'] = array(
            'ht',
            'ea',
            'mmea',
            'cukai_lain',
            'plastik'
        );
        if ($id) {
            $this->data['content'] = $this->ap_penerimaan_m->get($id);
            $this->data['content_cukai'] = $this->ap_penerimaan_cukai_m->get_by(array('id_penerimaan'=>$id));
            $this->data['content_pabean'] = $this->ap_penerimaan_pabean_m->get_by(array('id_penerimaan'=>$id));
            count($this->data['content']) || redirect('404');
            
            $data = array(
                'realisasi_pabean_penerimaan' => str_angka($this->input->post('realisasi_pabean')),
                'target_pabean_penerimaan' => str_angka($this->input->post('target_pabean')),
                'capaian_pabean_penerimaan' => str_angka($this->input->post('capaian_pabean')),
                'realisasi_cukai_penerimaan' => str_angka($this->input->post('realisasi_cukai')),
                'target_cukai_penerimaan' => str_angka($this->input->post('target_cukai')),
                'capaian_cukai_penerimaan' => str_angka($this->input->post('capaian_cukai')),
                'realisasi_penerimaan' => str_angka($this->input->post('total_realisasi')),
                'target_penerimaan' => str_angka($this->input->post('total_target')),
                'capaian_penerimaan' => str_angka($this->input->post('total_capaian')),
                'date_update_penerimaan' => date('Y-m-d H:i:s'),
                'date_penerimaan' => $this->input->post('tgl_penerimaan'),
                'id_admin' => $this->session->userdata('id')
            );
        } else {
            $this->data['content'] = $this->ap_penerimaan_m->get_new();
            $this->data['content_cukai'] = NULL;
            $this->data['content_pabean'] = NULL;
            $data = array(
                'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                'realisasi_pabean_penerimaan' => str_angka($this->input->post('realisasi_pabean')),
                'target_pabean_penerimaan' => str_angka($this->input->post('target_pabean')),
                'capaian_pabean_penerimaan' => str_angka($this->input->post('capaian_pabean')),
                'realisasi_cukai_penerimaan' => str_angka($this->input->post('realisasi_cukai')),
                'target_cukai_penerimaan' => str_angka($this->input->post('target_cukai')),
                'capaian_cukai_penerimaan' => str_angka($this->input->post('capaian_cukai')),
                'realisasi_penerimaan' => str_angka($this->input->post('total_realisasi')),
                'target_penerimaan' => str_angka($this->input->post('total_target')),
                'capaian_penerimaan' => str_angka($this->input->post('total_capaian')),
                'date_create_penerimaan' => date('Y-m-d H:i:s'),
                'date_update_penerimaan' => NULL,
                'date_penerimaan' => $this->input->post('tgl_penerimaan'),
                'id_admin' => $this->session->userdata('id')
            );
        }
        
        

        //import
            if ($this->input->post('upload') != NULL) {
                
                $file = $_FILES['file']['tmp_name'];
                // load the excel library
                $this->load->library('excel');
                // read file from path
                $objPHPExcel = PHPExcel_IOFactory::load($file);
                // get only the Cell Collection
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                // extract to a PHP readable array format
                foreach ($cell_collection as $cell) {
                    $column = $objPHPExcel->getActiveSheet()
                        ->getCell($cell)
                        ->getColumn();
                    $row = $objPHPExcel->getActiveSheet()
                        ->getCell($cell)
                        ->getRow();
                    $data_value = $objPHPExcel->getActiveSheet()
                        ->getCell($cell)
                        ->getValue();
                    // header will/should be in row 1 only. of course this can be modified to suit your need.
                    if ($row == 1) {
                        $header[$row][$column] = $data_value;
                    } else {
                        $arr_data[$row][$column] = $data_value;
                    }
                }
                // send the data in an array format

                if ($id) {
                    
                    $data = array(
                        'realisasi_pabean_penerimaan' => str_angka($arr_data[2]["B"]),
                        'target_pabean_penerimaan' => str_angka($arr_data[2]["C"]),
                        'capaian_pabean_penerimaan' => str_angka($arr_data[2]["D"]),
                        'realisasi_cukai_penerimaan' => str_angka($arr_data[6]["B"]),
                        'target_cukai_penerimaan' => str_angka($arr_data[6]["C"]),
                        'capaian_cukai_penerimaan' => str_angka($arr_data[6]["D"]),
                        'realisasi_penerimaan' => str_angka($arr_data[12]["B"]),
                        'target_penerimaan' => str_angka($arr_data[12]["C"]),
                        'capaian_penerimaan' => str_angka($arr_data[12]["D"]),
                        'date_update_penerimaan' => date('Y-m-d H:i:s'),
                        'date_penerimaan' => $this->input->post('tgl_penerimaan'),
                        'id_admin' => $this->session->userdata('id')
                    );
                } else {
                    $data = array(
                        'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                        'realisasi_pabean_penerimaan' => str_angka($arr_data[2]["B"]),
                        'target_pabean_penerimaan' => str_angka($arr_data[2]["C"]),
                        'capaian_pabean_penerimaan' => str_angka($arr_data[2]["D"]),
                        'realisasi_cukai_penerimaan' => str_angka($arr_data[6]["B"]),
                        'target_cukai_penerimaan' => str_angka($arr_data[6]["C"]),
                        'capaian_cukai_penerimaan' => str_angka($arr_data[6]["D"]),
                        'realisasi_penerimaan' => str_angka($arr_data[12]["B"]),
                        'target_penerimaan' => str_angka($arr_data[12]["C"]),
                        'capaian_penerimaan' => str_angka($arr_data[12]["D"]),
                        'date_create_penerimaan' => date('Y-m-d H:i:s'),
                        'date_update_penerimaan' => NULL,
                        'date_penerimaan' => $this->input->post('tgl_penerimaan'),
                        'id_admin' => $this->session->userdata('id')
                    );
                }
                
                if ($id){
                        $this->db->delete('ap_penerimaan_cukai', array('id_penerimaan'=>$id));
                        $this->db->delete('ap_penerimaan_pabean', array('id_penerimaan'=>$id));
                    }
                    if ($id){
                        $i = 3;
                        foreach ($this->data['pabean'] as $val) :
                        
                        $data_pabean = array(
                            'id_penerimaan_pabean' => $this->ap_penerimaan_pabean_m->increment(),
                            'id_penerimaan' => $id,
                            'nama_penerimaan_pabean' => strtoupper($val),
                            'realisasi_pabean' => str_angka($arr_data[$i]["B"]),
                            'target_pabean' => str_angka($arr_data[$i]["C"]),
                            'capaian_pabean' => str_angka($arr_data[$i]["D"]),
                        );
                        $this->ap_penerimaan_pabean_m->save($data_pabean, NULL);
                        $i ++;
                        endforeach
                        ;
                        
                        $i = 7;
                        foreach ($this->data['cukai'] as $val) :
                        $data_cukai = array(
                            'id_penerimaan_cukai' => $this->ap_penerimaan_cukai_m->increment(),
                            'id_penerimaan' => $id,
                            'nama_penerimaan_cukai' => strtoupper($val),
                            'realisasi_cukai' => str_angka($arr_data[$i]["B"]),
                            'target_cukai' => str_angka($arr_data[$i]["C"]),
                            'capaian_cukai' => str_angka($arr_data[$i]["D"]),
                            
                        );
                        $this->ap_penerimaan_cukai_m->save($data_cukai, NULL);
                        $i ++;
                        endforeach
                        ;
                    } else {
                        $i = 3;
                        foreach ($this->data['pabean'] as $val) :
                        
                        $data_pabean = array(
                            'id_penerimaan_pabean' => $this->ap_penerimaan_pabean_m->increment(),
                            'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                            'nama_penerimaan_pabean' => strtoupper($val),
                            'realisasi_pabean' => str_angka($arr_data[$i]["B"]),
                            'target_pabean' => str_angka($arr_data[$i]["C"]),
                            'capaian_pabean' => str_angka($arr_data[$i]["D"]),
                        );
                        $this->ap_penerimaan_pabean_m->save($data_pabean, NULL);
                        $i ++;
                        endforeach
                        ;
                        
                        $i = 7;
                        foreach ($this->data['cukai'] as $val) :
                        $data_cukai = array(
                            'id_penerimaan_cukai' => $this->ap_penerimaan_cukai_m->increment(),
                            'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                            'nama_penerimaan_cukai' => strtoupper($val),
                            'realisasi_cukai' => str_angka($arr_data[$i]["B"]),
                            'target_cukai' => str_angka($arr_data[$i]["C"]),
                            'capaian_cukai' => str_angka($arr_data[$i]["D"]),
                            
                        );
                        $this->ap_penerimaan_cukai_m->save($data_cukai, NULL);
                        $i ++;
                        endforeach
                        ;
                    }
                    
                    $this->ap_penerimaan_m->save($data, $id);
                    redirect($this->uri->rsegment(1) . '/index/');
                
            } else {
                $rules = $this->ap_penerimaan_m->rules;
                $this->form_validation->set_rules($rules);
                
                if ($this->form_validation->run() == TRUE) {
                    if ($id){
                        $this->db->delete('ap_penerimaan_cukai', array('id_penerimaan'=>$id));
                        $this->db->delete('ap_penerimaan_pabean', array('id_penerimaan'=>$id));
                    }
                    if ($id){
                        $i = 0;
                        foreach ($this->data['pabean'] as $val) :
                        
                        $data_pabean = array(
                            'id_penerimaan_pabean' => $this->ap_penerimaan_pabean_m->increment(),
                            'id_penerimaan' => $id,
                            'nama_penerimaan_pabean' => strtoupper($val),
                            'realisasi_pabean' => str_angka($this->input->post('pabean_realisasi')[$i]),
                            'target_pabean' => str_angka($this->input->post('pabean_target')[$i]),
                            'capaian_pabean' => str_angka($this->input->post('pabean_capaian')[$i])
                        );
                        $this->ap_penerimaan_pabean_m->save($data_pabean, NULL);
                        $i ++;
                        endforeach
                        ;
                        
                        $i = 0;
                        foreach ($this->data['cukai'] as $val) :
                        $data_cukai = array(
                            'id_penerimaan_cukai' => $this->ap_penerimaan_cukai_m->increment(),
                            'id_penerimaan' => $id,
                            'nama_penerimaan_cukai' => strtoupper($val),
                            'realisasi_cukai' => str_angka($this->input->post('cukai_realisasi')[$i]),
                            'target_cukai' => str_angka($this->input->post('cukai_target')[$i]),
                            'capaian_cukai' => str_angka($this->input->post('cukai_capaian')[$i])
                            
                        );
                        $this->ap_penerimaan_cukai_m->save($data_cukai, NULL);
                        $i ++;
                        endforeach
                        ;
                    } else {
                        $i = 0;
                        foreach ($this->data['pabean'] as $val) :
                        
                        $data_pabean = array(
                            'id_penerimaan_pabean' => $this->ap_penerimaan_pabean_m->increment(),
                            'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                            'nama_penerimaan_pabean' => strtoupper($val),
                            'realisasi_pabean' => str_angka($this->input->post('pabean_realisasi')[$i]),
                            'target_pabean' => str_angka($this->input->post('pabean_target')[$i]),
                            'capaian_pabean' => str_angka($this->input->post('pabean_capaian')[$i])
                        );
                        $this->ap_penerimaan_pabean_m->save($data_pabean, NULL);
                        $i ++;
                        endforeach
                        ;
                        
                        $i = 0;
                        foreach ($this->data['cukai'] as $val) :
                        $data_cukai = array(
                            'id_penerimaan_cukai' => $this->ap_penerimaan_cukai_m->increment(),
                            'id_penerimaan' => $this->ap_penerimaan_m->increment(),
                            'nama_penerimaan_cukai' => strtoupper($val),
                            'realisasi_cukai' => str_angka($this->input->post('cukai_realisasi')[$i]),
                            'target_cukai' => str_angka($this->input->post('cukai_target')[$i]),
                            'capaian_cukai' => str_angka($this->input->post('cukai_capaian')[$i])
                            
                        );
                        $this->ap_penerimaan_cukai_m->save($data_cukai, NULL);
                        $i ++;
                        endforeach
                        ;
                    }
                    
                    $this->ap_penerimaan_m->save($data, $id);
                    redirect($this->uri->rsegment(1) . '/index/');
                }
            }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function view($id){
        
        
        $this->data['content'] = $this->ap_penerimaan_m->get($id);
        $this->data['content_cukai'] = $this->ap_penerimaan_cukai_m->get_by(array('id_penerimaan'=>$id));
        $this->data['content_pabean'] = $this->ap_penerimaan_pabean_m->get_by(array('id_penerimaan'=>$id));
        
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/view';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
        
    }
    
    public function delete($id)
    {
       $this->db->delete('ap_penerimaan_cukai', array('id_penerimaan'=>$id));
       $this->db->delete('ap_penerimaan_pabean', array('id_penerimaan'=>$id));
        $this->ap_penerimaan_m->delete($id);
        
        redirect($this->uri->rsegment(1) . '/index/');
    }
}
