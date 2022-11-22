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
        <h3>SMA SEJAHTERA 1 DEPOK</h3>
            <p>JL. ANYELIR RAYA NO.68 DEPOK<br>
            
            </p>     
      <b>Laporan Data Buku</b>
  </center>
    <br>
    
      <table class="table table-condensed table-bordered">
   <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penerbit</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
            </tr>
        </thead>
        
        <tbody>
         <?php
  $no = 1;
     foreach($data as $a){ ?> 
            <tr>
                <td><?php echo $no++ ;?></td>
                
                <td><?php echo $a->judul;?></td>
                <td><?php echo $a->kategori; ?></td>
                <td><?php echo $a->id_pengarang; ?></td>
                <td><?php echo $a->id_penerbit;?></td>
                <td><?php echo $a->thn_terbit;?></td>
                <td><?php echo $a->stok;?></td>
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


