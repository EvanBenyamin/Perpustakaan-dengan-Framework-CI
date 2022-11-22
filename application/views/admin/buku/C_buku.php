
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-plus"></i> <i class="fa fa-book"></i> Tambah Buku</h3>
    <div class="box-tools pull-right">
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
   <div class="box-body">

   	<?php if(!empty(validation_errors())){
   			echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <p>Inputan tidak terisi dengan benar. Cek kembali</p>';
                echo validation_errors();
             echo '</div>';

   	}?>
    <!--show error message here -->
    <div class="form-group"></div>
   
<?php echo form_open_multipart("admin/Buku/tambah_buku",array('class' => 'form-horizontal')); ?>

              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Buku</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_buku" placeholder="ID Buku" >
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">ISBN</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="ISBN" placeholder="ISBN">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="judul" placeholder="Judul Buku" required="required">
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-2 control-label">Kategori</label>
                 <div class="col-sm-5">
		               <select name="kategori" class="js-example-basic-single form-control" data-placeholder="Klik untuk memilih">
		  				<option value="">&nbsp;</option>
		  				<?php	foreach($data_kategori->result_array() as $op)
						{
						?>
						<option value="<?php echo $op['id_kategori'];?>"><?php echo $op['kategori'];?></option>
						<?php
						}
						?>
						</select>
		      		</div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-label">Penerbit</label>
                 <div class="col-sm-5">
		            <input type="text" name="penerbit" class="form-control">
		      		</div>
              </div>
              <div class="form-group">
                 <label class="col-sm-2 control-label">Pengarang</label>
                 <div class="col-sm-5">
		               <input type="text" name="pengarang" class="form-control">
		      		</div>
              </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Terbit</label>
                  <div class="col-sm-3">
                   <input name="thn_terbit" class="date-own form-control" maxlength="4" type="text" placeholder="Tahun terbit">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" name="keterangan" rows="4" placeholder="Keterangan"></textarea>
                  </div>
                </div>
                   <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Stok</label>
                  <div class="col-sm-3">
                   <input name="stok" class="form-control" type="text" placeholder="Stok">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i>Reset</button>
				</div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
  <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>admin/Buku/buku"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Menambah Data Buku Perpustakaan, isi form diatas untuk menambahkan data buku. 
  </div><!-- box-footer -->
</div><!-- /.box -->


