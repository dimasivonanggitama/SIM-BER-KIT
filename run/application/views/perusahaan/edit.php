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
                  <select require class="form-control" name="perusahaan_kategori">
                  <option disabled selected>Pilih</option>
                  <option><?php echo $lang_without_parent?></option>
                  <?php foreach ($peru_cate as $val):?>
                    <option value="<?php echo $val->id_perusahaan_kategori?>" <?php echo $val->id_perusahaan_kategori==$content->id_perusahaan_kategori?'selected':'';?>><?php echo $val->nama_perusahaan_kategori?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_status_perusahaan?></label>
                 <div class="col-sm-8">
                  <select require class="form-control" name="status_perusahaan">
                  <option disabled selected>Pilih</option>
                    <option value="<?php echo $lang_aktiv_perusahaan?>" <?php echo $content->status_perusahaan==$lang_aktiv_perusahaan?'selected':'';?>><?php echo $lang_aktiv_perusahaan?></option>
                    <option value="<?php echo $lang_nonaktiv_perusahaan?>" <?php echo $content->status_perusahaan==$lang_nonaktiv_perusahaan?'selected':'';?>><?php echo $lang_nonaktiv_perusahaan?></option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_kota_perusahaan;?></label>
				 <div class="col-sm-8">
                   <select require  id="getFname" class="form-control" onchange="admSelectCheck(this.value);" name="kota">
                   <option disabled selected>Pilih</option>
                   	<option value="0">Lain-lain</option>
                    <option value="Surabaya" <?php echo $content->kota_perusahaan=='Surabaya' ? 'selected':'';?>>Surabaya</option>
                    <option value="Sidoarjo" <?php echo $content->kota_perusahaan=='Sidoarjo' ? 'selected':'';?>>Sidoarjo</option>
                    <option value="Mojokerto" <?php echo $content->kota_perusahaan=='Mojokerto' ? 'selected':'';?>>Mojokerto</option>
                   
                  </select>
                  </div>
                  </div>
                  
                  <div id="admDivCheck" style="display:none;">
                   		<div class="form-group">
                          <label for="inputEmail3" class="col-sm-4 control-label"></label>
        				 <div class="col-sm-8">
                            <input type="text" name="ket" class="form-control" id="inputEmail3" placeholder="Diisi dengan nama kota yang tidak ada di list atas" value="<?php echo $content->kota_perusahaan?>">
                          </div>
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
                <?php if ($content->file_skep_perusahaan!=''){?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'File SKEP';?></label>
				  <div class="col-sm-8">
                    <a class="btn btn-xs btn-warning" target="_blank" download href="<?php echo base_url('uploads/'.$content->file_skep_perusahaan);?>"><i class="fa fa-download"></i> <?php echo $lang_download;?></a>
                    <a class="btn btn-xs btn-info" target="_blank" href="<?php echo base_url('uploads/'.$content->file_skep_perusahaan);?>"><i class="fa fa-eye"></i> <?php echo $lang_view;?></a>
                  </div>
                </div>
                <?php }?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'File SKEP';?></label>
				<div class="col-sm-8">
                    <input type="file" name="file_skep" class="form-control" id="exampleInputFile" accept=".pdf">
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
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jenis_lokasi_perusahaan;?></label>
				 <div class="col-sm-8">
                    <select  required class="form-control" id="lokasi" onchange="perusahaan(this.value);" class="form-control" name="lokasi">
                    <option disabled selected>Pilih</option>
                    <option value="<?php echo $lang_industri_perusahaan?>" <?php echo $content->jenis_lokasi_perusahaan==$lang_industri_perusahaan ? 'selected':'';?>><?php echo $lang_industri_perusahaan?></option>
                    <option value="<?php echo $lang_luar_perusahaan?>" <?php echo $content->jenis_lokasi_perusahaan==$lang_luar_perusahaan ? 'selected':'';?>><?php echo $lang_luar_perusahaan?></option>
                  </select>
                  
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_nama_kawasan_perusahaan;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="kawasan" class="form-control" id="kawasan" placeholder="<?php echo $lang_nama_kawasan_perusahaan;?>" value="<?php echo $content->nama_kawasan_perusahaan?>">
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
                  <label for="inputEmail3" class="col-sm-4 control-label">Tanggal NPPBKC</label>
				 <div class="col-sm-8">
                    <input type="text" name="nppbkc_tgl" class="form-control datepicker" id="inputEmail3" placeholder="<?php echo date('Y-m-d')?>" value="<?php echo $content->nppbkc_tgl_perusahaan?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $lang_jenis_gol;?></label>
				 <div class="col-sm-8">
                    <input type="text" name="i_c_jenis_gol" class="form-control" id="inputEmail3" placeholder="<?php echo $lang_jenis_gol;?>" value="<?php echo $content->c_jenis_gol?>" required>
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
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo 'Pembekuan';?></label>
				 <div class="col-sm-8">
                    <select  class="form-control" id="pembekuan" class="form-control" name="pembekuan">
                    <option value="">-- Pilih --</option>
                    <option value="<?php echo 'BEKU'?>" <?php echo $content->pembekuan_perusahaan=='BEKU' ? 'selected':'';?>><?php echo 'BEKU'?></option>
                    <option value="<?php echo 'CABUT'?>" <?php echo $content->pembekuan_perusahaan=='CABUT' ? 'selected':'';?>><?php echo 'CABUT'?></option>
                  </select>
                  
                  </div>
                </div>
             <div class="box-footer">
                <button type="button" onclick="location.href='<?php echo base_url($this->uri->rsegment(1).'/index/');?>';" class="btn btn-default"><?php echo $lang_cancel;?></button>
                <button type="submit" class="btn btn-info pull-right"><?php echo $lang_save;?></button>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
            
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>   