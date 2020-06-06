<?php  
ob_start();

$id = $_GET['id'];

include "../koneksi.php";

$dataanggota = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id' ");

?>
<html>
<head>
  <title>Cetak</title>
   <style>
   table {border-collapse:collapse; table-layout:fixed;margin: 0px;}
   table td {word-wrap:break-word}
   </style>
</head>
<body>
<?php while ($row = mysqli_fetch_assoc($dataanggota)) { ?>
<table border='1' style='border:1px solid #000;'>
    <tr>
        <td width="65" height="40" align="center">Logo</td>
        <td width="230" align="center" colspan="3">
          PERPUSTAKAAN<br>
          Jl. Slamet Riyadi No 200          
        </td>
    </tr>
    <tr>
      <td width="65" height="10"></td>
      <td width="230" align="center" colspan="3"><b>KARTU ANGGOTA</b></td>
    </tr>
    <tr>
      <td width="65" rowspan="6" align="center">Foto</td>
      <td width="110" height="10">Kode Anggota</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10"><?= $row['kode_anggota']; ?></td>
    </tr>
    <tr>
      <td width="110" height="10">Nama Anggota</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10"><?= $row['nama_anggota']; ?></td>
    </tr>
    <tr>
      <td width="110" height="10">Jenis Kelamin</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10">
        <?php 
          if($row['jk_anggota'] == 'L'){
            echo "Laki-laki";
          }else{
            echo "Perempuan";
          }
        ?>
      </td>
    </tr>
    <tr>
      <td width="110" height="10">Pekerjaan</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10"><?= $row['pekerjaan_anggota']; ?></td>
    </tr>
    <tr>
      <td width="110" height="10">Nomor Telepon</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10"><?= $row['no_telp_anggota']; ?></td>
    </tr>
    <tr>
      <td width="110" height="10">Alamat</td>
      <td width="10"  height="10" align="center"> : </td>
      <td width="110" height="10"><?= $row['alamat_anggota']; ?></td>
    </tr>
</table>
<?php } ?>
</body>
</html>

<?php
  $html = ob_get_contents();
  ob_end_clean();

  $tgl = date('Y-m-d');
  require_once('../html2pdf/html2pdf.class.php');
  $pdf = new HTML2PDF('L', array(95.6, 63.98),'en');
  $pdf->WriteHTML($html);
  $pdf->Output('Data Anggota '.$tgl.'.pdf');

?>