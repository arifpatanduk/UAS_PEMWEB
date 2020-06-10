<?php  
ob_start();

include "../koneksi.php";

$databuku = mysqli_query($conn, "SELECT * FROM buku INNER JOIN rak ON buku.idbuku = rak.idbuku");

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
<h1 style='text-align: center;'>Data Buku Perpustakaan</h1>
<table border='1' style='width:595pt;border:1px solid #000;'>
    <tr align='center'>
      <th width='50'>Kode</th>
      <th width='50'>Gambar</th>
      <th width='150'>Judul Buku</th>
      <th width='90'>Kategori</th>
      <th width='90'>Penulis</th>
      <th width='90'>Penerbit</th>
      <th width='30'>Stok</th>
      <th width='70'>Nama Rak</th>
      <th width='70'>Lokasi Rak</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($databuku)) { ?>
      <tr>
        <td width='50' align='center'><?= $row['idbuku']; ?></td>
        <td width='50'><img src='../image/<?= $row['gambar']; ?>' width='50' height='50'></td>
        <td width='150'><?= $row['judulbuku']; ?></td>
        <td width='90'><?= $row['kategori']; ?></td>
        <td width='90'><?= $row['penulis']; ?></td>
        <td width='90'><?= $row['penerbit']; ?></td> 
        <td width='30' align='center'><?= $row['stok']; ?></td> 
        <td width='60' align='center'><?= $row['nama_rak']; ?></td>   
        <td width='70' align='center'><?= $row['lokasi_rak']; ?></td>                
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
  $pdf->Output('Data Buku '.$tgl.'.pdf');

?>