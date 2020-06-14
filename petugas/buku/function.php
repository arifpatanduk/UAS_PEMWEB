<?php
session_start();

if($_SESSION["role"] != 'petugas') {
  header("Location: ../homepage/login/");
}


require "../koneksi.php";

function tambah($data)
{
    global $conn;

    $kode       = $data['kode'];
    $judul      = $data['judul'];
    $kategori   = $data['kategori'];
    $penulis    = $data['penulis'];
    $penerbit   = $data['penerbit'];
    $stok       = $data['stok'];
    $nama_rak   = $data['nama_rak'];
    $lokasi     = $data['lokasi'];

    $imgFile = $_FILES['gambar']['name'];
    $tmp_dir = $_FILES['gambar']['tmp_name'];
    $imgSize = $_FILES['gambar']['size'];
     
    //upload image                  
    if($imgFile)
    {
        $upload_dir = '../../image/'; // upload directory 
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $gambar = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions))
        {           
            if($imgSize < 5000000)
            {
                move_uploaded_file($tmp_dir,$upload_dir.$gambar);
            }
            else
            {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        }
        else
        {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
        }   
    }
    else
    {
        // if no image selected the defauly image remain as it is.
        $gambar = "default.png";
    }   


    //upload data
    $scan = mysqli_query($conn, "SELECT * FROM buku WHERE idbuku = '$kode' ");
        if($scan -> num_rows == 0){
            $add_buku    = "INSERT INTO buku VALUES ('$kode', '$judul', '$kategori', '$penulis', '$penerbit', '$stok', '$gambar')";
            mysqli_query($conn, $add_buku);

            $add_rak    = "INSERT INTO rak VALUES('', '$nama_rak', '$lokasi', '$kode')";
            mysqli_query($conn, $add_rak);

            return mysqli_affected_rows($conn);
        }
        else{
            echo "<script>alert('Kode buku sudah ada')</script>";
            echo "<script>window.location=('tambah_buku.php');</script>";
        }

}

function update($data)
{
    global $conn;

    $id       = $data['id'];
    $judul      = $data['judul'];
    $kategori   = $data['kategori'];
    $penulis    = $data['penulis'];
    $penerbit   = $data['penerbit'];
    $stok       = $data['stok'];
    $nama_rak   = $data['nama_rak'];
    $lokasi     = $data['lokasi'];

    $imgFile = $_FILES['gambar']['name'];
    $tmp_dir = $_FILES['gambar']['tmp_name'];
    $imgSize = $_FILES['gambar']['size'];

    //upload image                   
    if($imgFile)
    {
        $upload_dir = '../../image/'; // upload directory 
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $gambar = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions))
        {           
            if($imgSize < 5000000)
            {
                move_uploaded_file($tmp_dir,$upload_dir.$gambar);
            }
            else
            {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        }
        else
        {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
        }   
    }
    else
    {
        // if no image selected the old image remain as it is.
        $ambil  = mysqli_query($conn, "SELECT * FROM buku WHERE idbuku = '$id' ");
        while ($row = mysqli_fetch_assoc($ambil) ){
            $gambar = $row['gambar'];
        }
        
    }   

    $update_buku = "UPDATE buku SET judulbuku = '$judul', kategori = '$kategori', penulis = '$penulis', penerbit = '$penerbit', stok = '$stok', gambar = '$gambar' WHERE idbuku = '$id' ";
    mysqli_query($conn, $update_buku);
    //mengecek gagal atau tidak
    $hasilA = mysqli_affected_rows($conn);

    $update_rak  = "UPDATE rak SET nama_rak = '$nama_rak', lokasi_rak = '$lokasi' WHERE idbuku = '$id' ";
    mysqli_query($conn, $update_rak);
    //mengecek gagal atau tidak
    $hasilB = mysqli_affected_rows($conn);

    return $hasilA+$hasilB;

}