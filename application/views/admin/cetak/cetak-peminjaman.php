<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-UA-Compatible" content="IE=edge">
  <title>Cetak</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url()."logo/"; ?>favicon.png"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
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
</style>
</head>

<body onload="window.print();" style="margin-top: 10px;">

   <?php foreach($data as $a){ ?> 
   <center>  
  <table cellspacing="0"  width="50%">
   <tr><td colspan="3"><center><h4><b>Tanda Terima Peminjaman Buku</b></h4></center></td></tr>
    <tr>
      <td width="50%"><h5><b> Nis</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php echo $a->nis ?></b></h5>
        </td>
    </tr>
   <tr>
      <td width="50%"><h5><b>Kode Anggota</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php echo $a->id_anggota ?></b></h5>
        </td>
    </tr>
    <tr>
      <td width="50%"><h5><b>Nama Anggota</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php echo $a->nama ?></b></h5>
        </td>
    </tr>  
      <tr>
      <td width="50%"><h5><b> Tanggal Pinjam</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php $date=date("d-M-Y",strtotime($a->tgl_pinjam));
                echo $date;
              ?>
      </b></h5>
        </td>
    </tr>  
    <tr>
      <td width="25%"><h5><b> Tanggal Harus Kembali</b> </h5></td>
      <td> <h5><b>:</b></h5></td>
      <td><h5><b><?php
                $date=date("d-M-Y",strtotime($a->tgl_kembali));
                echo $date;
              ?>
      </b></h5>
        </td>
    </tr>  
   </table>
 <?php } ?>
 <center><h4><b>Buku Yang Dipinjam</b></h4></center>
   <table width="50%" class="buku">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
            </tr>
        </thead>
 
        <tbody>
         <?php
  $no = 1;
    foreach($buku  as $op)
    {
    ?>
            <tr>
                <td><?php echo $no++ ;?></td>
                <td><?php echo $op->judul; ?>
                </td>
          
             </tr>
   <?php }
  ?>            
         </tbody>
    </table>
  </center>

</body>
</html>


