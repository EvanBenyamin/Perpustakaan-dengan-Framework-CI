<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-UA-Compatible" content="IE=edge">
  <title>Cetak</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url()."logo/"; ?>icon.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- <style>
.buku, td, th {
  border: 1px solid black;
  padding: 5px;
  text-align: left;
}

.buku {
  border-collapse: collapse;
}

th {
  height: 50px;
}
</style> -->
</head>

<body onload="window.print();" style="margin-top: 10px;">
   <center> 
        <h3>SMA PGRI 2 PADANG</h3>
            <p>JL. ANYELIR RAYA NO.68 DEPOK<br>
            
            </p>     
      <b><?php echo $filter; ?></b><br>
      <b><?php echo $data_filter; ?></b>
  </center>
    <br>
    
      <table class="table table-condensed table-bordered">
   <thead>
            <tr>
                <th>No</th>
                <th>ID Peminjaman</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Harus Dikembalikan</th>
                <th>Tanggal Dikembalikan</th>
                <th>Denda</th>
            </tr>
        </thead>
        
        <tbody>
         <?php
  $no = 1;
     foreach($data as $a){ ?> 
            <tr>
                <td><?php echo $no++ ;?></td>
                
                <td><?php echo $a->id_pinjam;?></td>

                <td><?php echo $a->nama; ?></td>
                <td><?php echo $a->judul;?></td>
                <td><?php echo date('d F Y',strtotime($a->tgl_pinjam));?></td>
                <td><?php echo date('d F Y',strtotime($a->tgl_kembali));?></td>
                <td><?php echo date('d F Y',strtotime($a->tgl_dikembalikan));?></td>
                <td>Rp <?php echo number_format($a->denda);?></td>
              </tr>
<?php
    }
  ?>            
         </tbody>
    </table>
<table width="100%" border="0">
  <tr>
    <td width="20%">&nbsp;</td>
    <td width="60%">&nbsp;</td>
    <td width="20%">Depok, <?php echo date('d F Y'); ?></td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>Mengetahui,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Kepala Sekolah</td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>

</body>
</html>


