<?php  
ob_start();

include "../koneksi.php";

$dataanggota = mysqli_query($conn, "SELECT * FROM anggota");

?>
<html>
<head>
  <title>Cetak</title>
   <style>
   table {border-collapse:collapse; table-layout:fixed;width: 630px;}
   table td {word-wrap:break-word;width: 34%;}
   th{background-color: blue; color:white; height:20;}
   </style>
</head>
<body>
<h1 style='text-align: center;'>Data Anggota Perpustakaan</h1>
<table border='1' style='width:595pt;border:1px solid #000;'>
    <tr align='center'>
      <th width='40'>Kode</th>
      <th width='170'>Nama Anggota</th>
      <th width='100'>Jenis Kelamin</th>
      <th width='110'>Pekerjaan</th>
      <th width='120'>Nomor Telepon</th>
      <th width='170'>Alamat</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($dataanggota)) { ?>
      <tr>
        <td width='40'><?= $row['kode_anggota']; ?></td>
        <td width='170'><?= $row['nama_anggota']; ?></td>
        <td width='100'><?= $row['jk_anggota']; ?></td>
        <td width='110'><?= $row['pekerjaan_anggota']; ?></td>
        <td width='120'><?= $row['no_telp_anggota']; ?></td>
        <td width='170'><?= $row['alamat_anggota']; ?></td>               
      </tr>
    <?php } ?>

</table>
</body>
</html>

<?php
  $html = ob_get_contents();
  ob_end_clean();

  $tgl = date('Y-m-d');
  require_once('../html2pdf/html2pdf.class.php');
  $pdf = new HTML2PDF('P','A4','en');
  $pdf->WriteHTML($html);
  $pdf->Output('Data Anggota '.$tgl.'.pdf');

?>