<!--css khusus halaman ini -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


<!--modal dialog untuk hapus -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h4>
                </div>
            
                <div class="modal-body">
                    <p>Anda akan menghapus Data Denda  ini</p>
                    <p><strong>Peringatan</strong>  Setelah data dihapus, data tidak dapat dikembalikan!</p>
                   
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<!--content -->
<div class="box box-solid box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Tamu</h3>
    <div class="box-tools pull-right">
    
    </div><!-- /.box-tools -->

  </div><!-- /.box-header -->
   <div class="box-body">
 
   <div class="form-group"></div>
   <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nis/Nik/Nip</th>
                <th width="50%">Nama</th>
                <th width="50%">Tanggal</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Nis/Nik/Nip</th>
                <th width="50%">Nama</th>
                <th width="50%">Tanggal</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_tamu->result_array() as $op)
    {
    ?>
            <tr>
                <td width="5%"><?php echo $no++ ;?></td>
                <td width="30%"><?php echo $op['nis'];?></td>
                <td width="40%"><?php echo $op['nama'];?></td>
                <td width="40%"><?php echo date('d F Y H:i',strtotime($op['tgl']));?></td>
               </tr>
<?php
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Tamu, untuk mengedit dan menghapus denda klik tombol pada kolom pilihan.
  </div><!-- box-footer -->
</div><!-- /.box -->


