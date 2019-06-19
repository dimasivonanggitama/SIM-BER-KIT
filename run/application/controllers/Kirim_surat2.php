<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirim_surat2 extends Goodsyst_Controller
{
  public function __construct()
  {
      parent::__construct();
      $this->load->model('ap_surat_sifat_m');
      $this->load->model('ap_surat_jenis_m');
      $this->load->model('ap_surat_masuk2_m');
  }
  public function index($id = NULL){
    // $this->data['pohon'] = $this->ap_surat_sifat_m->get();
    //       $this->data['parent_list'] = array();
    //       foreach ($this->data['pohon'] as $val) :
    //           array_push($this->data['parent_list'], $val->parent_sifat_kategori);
    //       endforeach
    //       ;

          $this->data['parent'] = $id;

           $jeneng = NULL;
           if (! empty($_FILES['file_surat']['name'])) {
               $jeneng = $this->nama_file($_FILES['file_surat']['name']);
           }

           $this->data['induk'] = $this->ap_surat_sifat_m->get();
           if ($id) {
               $this->data['content'] = $this->ap_surat_masuk2_m->get($id);
              // $this->data['sifat'] = $this->ap_surat_sifat_m->get();
               //$this->data['jenis'] = $this->ap_surat_jenis_m->get();
               //count($this->data['content']) || redirect('404');
               // if (! empty($_FILES['file_surat']['name'])) {
               //     $data = array(
               //         'nomor_naskah' => $this->input->post('nomor_naskah'),
               //         'tgl_naskah' => $this->input->post('date'),
               //         'lampiran_naskah' => $this->input->post('lampiran_naskah'),
               //         'id_sifat_kategori' => $this->input->post('sifat_kategori'),
               //         'id_jenis_kategori' => $this->input->post('jenis_kategori'),
               //         'dari_naskah' => $this->input->post('dari_naskah'),
               //         'perihal_naskah' => $this->input->post('perihal_naskah'),
               //         'file_surat' => $jeneng,
               //         'date_create_surat' => date('Y-m-d H:i:s')
               //     );
               // } else {
               //     $data = array(
               //       'nomor_naskah' => $this->input->post('nomor_naskah'),
               //       'tgl_naskah' => $this->input->post('date'),
               //       'lampiran_naskah' => $this->input->post('lampiran_naskah'),
               //       'id_sifat_kategori' => $this->input->post('sifat_kategori'),
               //       'id_jenis_kategori' => $this->input->post('jenis_kategori'),
               //       'dari_naskah' => $this->input->post('dari_naskah'),
               //       'perihal_naskah' => $this->input->post('perihal_naskah'),
               //       'date_create_surat' => date('Y-m-d H:i:s')
               //    );
               // }
           } else {
             // $this->data['content'] = $this->ap_surat_masuk_m->get_new();
             $this->data['sifat'] = $this->ap_surat_sifat_m->get();
             $this->data['jenis'] = $this->ap_surat_jenis_m->get();
             $data = array(
                 'id_agenda' => $this->ap_surat_masuk2_m->increment(),
                 'nomor_naskah' => $this->input->post('nomor_naskah'),
                 'tgl_naskah' => $this->input->post('date'),
                 'lampiran_naskah' => $this->input->post('lampiran_naskah'),
                 'id_sifat_kategori' => $this->input->post('sifat_kategori'),
                 'id_jenis_kategori' => $this->input->post('jenis_kategori'),
                 'dari_naskah' => $this->input->post('dari_naskah'),
                 'perihal_naskah' => $this->input->post('perihal_naskah'),
                 'file_surat' => $jeneng,
                 'date_create_surat' => date('Y-m-d H:i:s')
             );
           }

           $rules = $this->ap_surat_masuk2_m->rules;
           $this->form_validation->set_rules($rules);

           if ($this->form_validation->run() == TRUE) {
               if (! empty($_FILES['file_surat']['name'])) {
                   $this->upload_dokumen($jeneng, 'file_surat');
                   if ($id) {
                       unlink('./uploads/' . $this->data['content']->file_sop);
                   }
               }
               $this->ap_surat_masuk2_m->save($data, $id);

               if ($id==NULL) {
                   $userx=array();
                   $pick_all=$this->ap_admin_m->get();
                   foreach ($pick_all as $val):
                       array_push($userx,$val->id_admin);
                   endforeach;
                   $this->notifikasi('kotak_masuk','Surat Baru',$userx);
              }

                  //redirect
           }

          $this->data['subview'] = $this->uri->rsegment(1) . '/index';
          $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
          $this->load->view('_layout_main', $this->data);

  }
}
