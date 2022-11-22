<div class="row">
    <div class="col-md-12">
        <h4 class="page-head-line">Buku Tamu</h4>
     </div>

                      <div class="col-md-12">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                           <h4> <i class="fa fa-users"></i> Buku Tamu</h4>
                        </div>
                        <br>
  <form method="post"  action="<?php echo base_url(); ?>Buku/simpan_buku_tamu" role="form">
   <div class="form-group">
    <label class="col-sm-2 control-label">NIS/NIK/NIP</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="id" placeholder="ID Pengenal" required="required" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required="required" >
    </div>
  </div>
  <br>
  <br>
  <div class="row">
  <div class="col-md-2"></div>
   <div class="col-md-8">
      <button class="btn btn-success btn-linkedin" type="submit">Simpan</button>
    </div>
<div class="col-md-2"></div>
</div>
</form>
<hr>
<hr>

                                <div class="panel-body">

                      
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">


   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis/Nik/Nip</th>
                <th>Nama</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nis/Nik/Nip</th>
                <th>Nama</th>
                <th>Tanggal</th>
            </tr>
        </tfoot>
        <tbody>
         <?php
  $no = 1;
    foreach($data_tamu->result_array() as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op['nis'];?></td>
                <td><?php echo $op['nama'];?></td>
                <td><?php echo date('d F Y H:i:s',strtotime($op['tgl']));?></td>
            </tr>
<?php
    }
  ?>            
         </tbody>
    </table>
  </div>
  <div class="box-footer">
    Silahkan masukan id pengenal dan nama</b> .
  </div><!-- box-footer -->
</div><!-- /.box --></ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>