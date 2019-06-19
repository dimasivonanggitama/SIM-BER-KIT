	<div class="row">
        <div class="col-md-8">

          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <?php echo form_open_multipart('','class="form-horizontal"');?>
              <div class="box-body">
              	<?php echo validation_errors();?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_peru_nama;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_peru_nama;?>" value="<?php echo $content->nama_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_peru_alamat;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_peru_alamat;?>" value="<?php echo $content->alamat_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_name_perukate?></label>
                 <div class="col-sm-8">
                  <select class="form-control" name="perusahaan_kategori">
                  <?php foreach ($peru_cate as $val):?>
                  <option><?php echo $lang_without_parent?></option>
                    <option value="<?php echo $val->id_perusahaan_kategori?>"><?php echo $val->nama_perusahaan_kategori?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_status_perusahaan?></label>
                 <div class="col-sm-8">
                  <select class="form-control" name="status_perusahaan">
                    <option value="<?php echo $lang_aktiv_perusahaan?>"><?php echo $lang_aktiv_perusahaan?></option>
                    <option value="<?php echo $lang_nonaktiv_perusahaan?>"><?php echo $lang_nonaktiv_perusahaan?></option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_kota_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="kota" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_kota_perusahaan;?>" value="<?php echo $content->kota_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_luas_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="luas" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_luas_perusahaan;?>" value="<?php echo $content->luas_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_npwp_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="npwp" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_npwp_perusahaan;?>" value="<?php echo $content->npwp_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_pemilik_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="pemilik" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_pemilik_perusahaan;?>" value="<?php echo $content->pemilik_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jabatan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="jabatan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jabatan_perusahaan;?>" value="<?php echo $content->jabatan_pemilik_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_telp_pemilik_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="telp_pemilik" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_telp_pemilik_perusahaan;?>" value="<?php echo $content->telp_pemilik_perusahaan?>" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_ttl_perusahaan;?></label>
				 <div class="col-sm-4">
                    <input type="text" name="tempat_perusahaan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_ttl_perusahaan;?>" value="<?php echo $content->ttl_pemilik_perusahaan ?>" required>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="tggl_perusahaan" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo date('Y-m-d')?>" value="<?php echo $content->tl_pemilik_perusahaan?>" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_email_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="email_pemilik" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_email_perusahaan;?>" value="<?php echo $content->email_pemilik_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_skep_penetapan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_penetapan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_skep_penetapan_perusahaan;?>" value="<?php echo $content->skep_penetapan_perusahaan?>" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_skep_penetapan_tgl_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_tgl_penetapan" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_skep_penetapan_tgl_perusahaan;?>" value="<?php echo $content->tgl_skep_penetapan_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_skep_perubahan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_peru_penetapan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_skep_perubahan_perusahaan;?>" value="<?php echo $content->skep_perubahan_perusahaan?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_tgl_skep_perubahan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_tgl_peru_penetapan" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_tgl_skep_perubahan_perusahaan;?>" value="<?php echo $content->tgl_skep_perubahan_perusahaan?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jangka_ijin_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_jangka" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_jangka_ijin_perusahaan;?>" value="<?php echo $content->jangka_ijin_perusahaan?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_perpanjangan_ijin_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="skep_perpanjangan" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo $lang_perpanjangan_ijin_perusahaan;?>" value="<?php echo $content->perpanjangan_ijin_perusahaan?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jenis_lokasi_perusahaan;?></label>
				 <div class="col-sm-8">
                    <select class="form-control" name="lokasi">
                    <option value="<?php echo $lang_industri_perusahaan?>"><?php echo $lang_industri_perusahaan?></option>
                    <option value="<?php echo $lang_luar_perusahaan?>"><?php echo $lang_luar_perusahaan?></option>
                  </select>
                  
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nama_kawasan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="kawasan" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_nama_kawasan_perusahaan;?>" value="<?php echo $content->nama_kawasan_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_hasil_produksi_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="hasil_produk" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hasil_produksi_perusahaan;?>" value="<?php echo $content->hasil_produksi_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nppbkc_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="nppbkc" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_hasil_produksi_perusahaan;?>" value="<?php echo $content->nppbkc_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_peru_latitude;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="latitude" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_peru_latitude;?>" value="<?php echo $content->latitude_perusahaan?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_peru_longitude;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="longitude" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_peru_longitude;?>" value="<?php echo $content->longitude_perusahaan?>" required>
                  </div>
                </div>
             <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/'.$this->uri->rsegment(3));?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
    
</div>   