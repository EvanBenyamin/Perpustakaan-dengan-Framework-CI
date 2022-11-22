
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Filter Tanggal</h3>
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
    <form class="form-horizontal" method="post"  action="<?php echo base_url(); ?>admin/Report/cetak_dikembalikan_tahun" role="form" target="_blank">
     <div class="form-group">
        <label class="col-sm-2 control-label">Filter Bulan</label>
        <div class="col-sm-3">
         <select name="tahun" class="form-control">
          <?php for($i = date("Y")-10; $i <=date("Y"); $i++){
              echo '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
          } ?>
          </select>
        </div>
        <button class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
      </div>
      
    </form>
  </div>
  <div class="box-footer">
    Silahkan pilih tanggal yang ingin dicetak.
  </div><!-- box-footer -->
</div><!-- /.box -->


