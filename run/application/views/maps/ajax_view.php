Nama perusahaan : <strong><?php echo $content->nama_perusahaan;?></strong><br>
Kategori perusahaan : <strong><?php echo $content->nama_perusahaan_kategori;?></strong> <br>
Alamat perusahaan : <strong><?php echo $content->alamat_perusahaan;?></strong> <br>
Kota Perusahaan : <strong><?php echo $content->kota_perusahaan?></strong> <br>
Luas Perusahaan : <strong><?php echo $content->luas_perusahaan?></strong> <br><br>
NPWP Perusahaan : <strong><?php echo $content ->npwp_perusahaan?></strong><br>
Pemilik Perusahaan : <strong><?php echo $content->pemilik_perusahaan?></strong> <br>
Jabatan Perusahaan : <strong><?php echo $content->jabatan_pemilik_perusahaan?></strong> <br>
Telepon Pemilik Perusahaan : <strong><?php echo $content->telp_pemilik_perusahaan?></strong> <br>
Email Pemilik Perusahaan : <strong><?php echo $content->email_pemilik_perusahaan?></strong><br><br>
SKEP Penetapan Perusahaan : <strong><?php echo $content->skep_penetapan_perusahaan?></strong><br>
File SKEP Perusahaan : <strong>
<?php if ($content->file_skep_perusahaan!=''){?>
	<a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->file_skep_perusahaan);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$content->file_skep_perusahaan);?>"><i class="fa fa-eye"></i> <?php echo $lang_view;?></a>
<?php }?></strong><br>
Tanggal SKEP Penetapaan Perusahaan : <strong><?php echo $content->tgl_skep_penetapan_perusahaan?></strong><br>
SKEP Perubahan Perusahaan : <strong><?php echo $content->skep_perubahan_perusahaan?></strong><br>
Tanggal SKEP Perubahaan Perusahaan : <strong><?php echo $content->tgl_skep_perubahan_perusahaan?></strong><br>
Jenis Lokasi Perusahaan : <strong><?php echo $content->jenis_lokasi_perusahaan?></strong><br>
Nama Kawasan Perusahaan : <strong><?php echo $content->nama_kawasan_perusahaan?></strong><br>
Hasil Produksi Perusahaan : <strong><?php echo $content->hasil_produksi_perusahaan?></strong><br><br>
NPPBKC Perusahaan : <strong><?php echo $content->nppbkc_perusahaan?></strong><br> 
NPPBKC Tanggal Perusahaan : <strong><?php echo $content->nppbkc_tgl_perusahaan?></strong><br>
Jenis dan Golongan : <strong><?php echo $content->c_jenis_gol?></strong><br><br>
Longitude Perusahaan : <strong><?php echo $content->longitude_perusahaan?></strong><br>
Latitude Perusahaan : <strong><?php echo $content->latitude_perusahaan?></strong><br>
Pembekuan Perusahaan : <strong><?php echo $content->pembekuan_perusahaan?></strong>