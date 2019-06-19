<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kotak_masuk2 extends Goodsyst_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_surat_jenis_m');
        $this->load->model('ap_surat_sifat_m');
        $this->load->model('ap_surat_masuk2_m');
        $this->load->model('ci_surat_disposisikep_m');
        $this->load->model('ci_surat_disposisikasi_m');
        $this->load->model('ci_surat_disposisiketentuan_m');
        // $this->load->model('ap_sop_m');
        // $this->load->model('ap_sop_kategori_m');
    }

    public function index($id = NULL)
    {
        if ($id) {//untuk kategori
            $in=$this->cari_anak(array($id),array($id));
            $this->db->join('ap_surat_sifat', 'ap_surat_sifat.id_sifat_kategori=ap_surat_masuk2.id_sifat_kategori', 'left');
            $this->db->where_in('ap_surat_masuk2.id_sifat_kategori',$in);
            $this->db->order_by('ap_surat_masuk2.id_sifat_kategori',"DESC");
            $this->data['content'] = $this->ap_surat_masuk2_m->get();
        } else {//untuk tampil
            $this->db->join('ap_surat_sifat', 'ap_surat_sifat.id_sifat_kategori=ap_surat_masuk2.id_sifat_kategori', 'left');
            $this->db->order_by('ap_surat_masuk2.id_sifat_kategori',"DESC");
            $this->data['content'] = $this->ap_surat_masuk2_m->get();
        }

        $this->data['sifat_srt'] = $this->ap_surat_sifat_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
//coba hak Hak_akses
    public function edit($id = NULL)
    {
      $this->data['pohon'] = $this->ap_surat_sifat_m->get();
            $this->data['parent_list'] = array();
            foreach ($this->data['pohon'] as $val) :
                array_push($this->data['parent_list'], $val->parent_sifat_kategori);
            endforeach
            ;

      $this->data['parent'] = $id;

      $jeneng = NULL;
      if (! empty($_FILES['file_surat']['name'])) {
          $jeneng = $this->nama_file($_FILES['file_surat']['name']);
      }

      $this->data['induk'] = $this->ap_surat_sifat_m->get();
      if ($id) {
          $this->data['content'] = $this->ap_surat_masuk2_m->get($id);
          $this->data['sifat'] = $this->ap_surat_sifat_m->get();
          $this->data['jenis'] = $this->ap_surat_jenis_m->get();
          $this->data['kasi'] = $this->ci_surat_disposisikep_m->get();
          $this->data['keten'] = $this->ci_surat_disposisiketentuan_m->get();
          count($this->data['content']) || redirect('404');
          if (! empty($_FILES['file_surat']['name'])) {
              $data = array(
                'id_agenda' => $this->input->post('id_agenda'),
                'nomor_naskah' => $this->input->post('nomor_naskah'),
                'tgl_naskah' => $this->input->post('date'),
                'lampiran_naskah' => $this->input->post('lampiran_naskah'),
                'id_sifat_kategori' => $this->input->post('sifat_kategori'),
                'id_jenis_kategori' => $this->input->post('jenis_kategori'),
                'dari_naskah' => $this->input->post('dari_naskah'),
                'perihal_naskah' => $this->input->post('perihal_naskah'),
              //  'file_surat' => $jeneng,
                'date_create_surat' => date('Y-m-d H:i:s'),
                'catatan_kep' => $this->input->post('catatan'),
                'id_ketentuan_kategori' => $this->input->post('id_ketentuan_kategori'),
                'id_kep' => $this->input->post('id_kasi')
              );
          } else {
              $data = array(
                'id_agenda' => $this->input->post('id_agenda'),
                'nomor_naskah' => $this->input->post('nomor_naskah'),
                'tgl_naskah' => $this->input->post('date'),
                'lampiran_naskah' => $this->input->post('lampiran_naskah'),
                'id_sifat_kategori' => $this->input->post('sifat_kategori'),
                'id_jenis_kategori' => $this->input->post('jenis_kategori'),
                'dari_naskah' => $this->input->post('dari_naskah'),
                'perihal_naskah' => $this->input->post('perihal_naskah'),
              //  'file_surat' => $jeneng,
                'date_create_surat' => date('Y-m-d H:i:s'),
                'catatan_kep' => $this->input->post('catatan'),
                'id_ketentuan_kategori' => $this->input->post('id_ketentuan_kategori'),
                'id_kep' => $this->input->post('id_kasi')
              );
          }
      } else {

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
                  unlink('./uploads/' . $this->data['content']->file_surat);
              }
          }
          $this->ap_surat_masuk2_m->save($data, $id);

          if ($id==NULL) {
              $userx=array();
              $pick_all=$this->ap_admin_m->get();
              foreach ($pick_all as $val):
                  array_push($userx,$val->id_admin);
              endforeach;
              $this->notifikasi('kontak_masuk','Surat Baru',$userx);
          }

          redirect($this->uri->rsegment(1) . '/index/');
      }

      $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
      $this->data['jscript'] = $this->uri->rsegment(1) . '/js';
      $this->load->view('_layout_main', $this->data);
    }

    public function do_upload()
    {}

    public function delete($id)
    {

        $this->data['content'] = $this->ap_surat_masuk2_m->get($id);
        $this->ap_surat_masuk2_m->delete($id);
        unlink('./uploads/' . $this->data['content']->file_surat);

        redirect($this->uri->rsegment(1) . '/index/');
    }
    //
    public function cari_anak($id=array(), $in=array()){
        $new_id = array();
        $i=0;
        foreach ($id as $val) :
            $anak = $this->ap_surat_sifat_m->get_by(array(
                'parent_sifat_kategori'=>$val
            ));

            if (count($anak)!=0) {
                foreach ($anak as $key) :
                    array_push($in, $key->id_sifat_kategori);
                    $anak_next = $this->ap_surat_sifat_m->get_by(array(
                        'parent_sifat_kategori'=>$key->id_sifat_kategori
                    ));
                    if (count($anak_next)!=0) {
                        array_push($new_id, $key->id_sifat_kategori);
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
