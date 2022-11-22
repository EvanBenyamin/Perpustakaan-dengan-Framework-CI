
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-pencil"></i> <i class="fa fa-book"></i>Edit Petugas</h3>
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
     <?php if($_SERVER['REQUEST_METHOD'] == "POST")
    { 
      
      }?>
    <!--show error message here -->
    <div class="form-group"></div>
  <form class="form-horizontal" method="post" <?php echo form_open_multipart('admin/Petugas/Update');?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ID Petugas</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $petugas['id_petugas'];?>"  disabled=disabled class="form-control" name="id_petugas" placeholder="id Lengkap" >
                     <input type="hidden" value="<?php echo $petugas['id_petugas'];?>"  name="id_petugas" >
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $petugas['password'];?>" class="form-control" name="pass" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $petugas['nama'];?>"  class="form-control" name="nama" placeholder="Nama Lengkap" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $petugas['alamat'];?>"  class="form-control" name="alamat" placeholder="alamat" >
                  </div>
                </div> <div class="form-group">
                  <label class="col-sm-2 control-label">Gender</label>
                  <div class="col-sm-3">
                    <div class="col-sm-10">
                    <!--input type="radio" class="form-control" name="gender" id="inputEmail3" placeholder="Jenis Kelamin"-->
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($petugas['jenis_kelamin']=="L")?'checked':''?> id="inlineRadio1" value="L"> Laki - Laki
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="jk" <?php echo ($petugas['jenis_kelamin']=="A")?'checked':''?> id="inlineRadio2" value="P"> Perempuan
                      </label>
                    </div>
                  </div>
                  </div>
                </div>

              <div class="form-group">
                 <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-5">
                 <select name="agama" class="form-control">
                     <option value="">Pilih</option>
                     <option value="Islam" <?php echo $petugas['agama']=="Islam" ? 'Selected':''; ?>>Islam</option>
                     <option value="Kristen" <?php echo $petugas['agama']=="Kristen" ? 'Selected':''; ?>>Kristen</option>
                     <option value="Khatolik" <?php echo $petugas['agama']=="Khatolik" ? 'Selected':''; ?>>Khatolik</option>
                    
                   </select>
                </div>
              </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Status Petugas</label>
                  <div class="col-sm-3">
                    <div class="col-sm-10">
                    <!--input type="radio" class="form-control" name="gender" id="inputEmail3" placeholder="Jenis Kelamin"-->
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="stts" <?php echo ($login['stts']=="admin")?'checked':''?> id="inlineRadio1" value="admin"> Admin
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="stts" <?php echo ($login['stts']=="petugas")?'checked':''?> id="inlineRadio2" value="petugas"> Petugas
                      </label>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-4">
                  <img style="width:64px;height:64px" src="<?php echo base_url();?>gambar_petugas/<?php echo $petugas['img'];?>">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-sm-2 control-label">Hp</label>
                  <div class="col-sm-4">
                    <input type="text" value="<?php echo $petugas['hp'];?>"  class="form-control" name="hp" placeholder="No HP" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                   <textarea class="form-control" name="ket" rows="4" placeholder="Keterangan"><?php echo $petugas['ket']; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-4">
                  <div class="btn-group">
                   <button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Reset</button>
                </div>
                   <div class="btn-group">
                   <button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Update</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
  </div>
  <div class="box-footer">
  <td>
    <div align ="Right"> <a  href="<?php echo base_url(); ?>admin/Petugas"  class="btn btn-danger" role="button" data-toggle="tooltip" title="Kembali"></i>Back</a></div>
  </td>
  </div>
  <div class="box-footer">
    Update Data Petugas Perpustakaan, edit form diatas untuk mengubah data Petugas. 
  </div><!-- box-footer -->
</div><!-- /.box -->


