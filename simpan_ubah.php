<?php

include 'koneksi.php';

session_start();

if (!isset($_SESSION["username"])) {
	echo "<script>alert('Anda belum login');window.location='login.php';</script>";
	exit;
}

  $id_buku = $_POST['id'];
  $judul_buku   = $_POST['judul'];
  $penulis     = $_POST['penulis'];
  $jenis    = $_POST['jenis'];
  $sinopsis    = $_POST['sinopsis'];
  $gambar = $_FILES['gambar']['name'];
  $file_buku = $_FILES['file']['name'];


if($gambar != "" AND $file_buku !="") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];
  $file_tmplain = $_FILES['file']['tmp_name'];  
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar;
  $nama_file_baru = $angka_acak.'-'.$file_buku; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'images/'.$nama_gambar_baru);
                move_uploaded_file($file_tmplain, 'file/'.$nama_file_baru);
                  $query = "UPDATE `data_buku` SET `judul` = '$judul_buku', `penulis` = '$penulis', `jenis` = '$jenis', `gambar` = '$nama_gambar_baru', `sinopsis` = '$sinopsis', `file_buku` = '$nama_file_baru' WHERE id='$id_buku'";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='admin.php';</script>";
                  }
            } else {     
                echo "<script>alert('Gambar yang didukung hanya jpg png jpeg.');window.location='ubah.php';</script>";
            }
} elseif ($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg');
  $x = explode('.', $gambar);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar']['tmp_name'];  
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'images/'.$nama_gambar_baru);
                  $query = "UPDATE `data_buku` SET `judul` = '$judul_buku', `penulis` = '$penulis', `jenis` = '$jenis', `gambar` = '$nama_gambar_baru', `sinopsis` = '$sinopsis' WHERE id='$id_buku'";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='admin.php';</script>";
                  }
            } else {     
                echo "<script>alert('Gambar yang didukung hanya jpg png jpeg.');window.location='ubah.php';</script>";
            }
} elseif ($file_buku !="") {
  $ekstensi_diperbolehkan = array('rar','zip','pdf');
  $x = explode('.', $file_buku);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['file']['tmp_name']; 
  $angka_acak     = rand(1,999);
  $nama_file_baru = $angka_acak.'-'.$file_buku;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, 'file/'.$nama_file_baru);
                  $query = "UPDATE `data_buku` SET `judul` = '$judul_buku', `penulis` = '$penulis', `jenis` = '$jenis', `file_buku` = '$nama_file_baru', `sinopsis` = '$sinopsis' WHERE id='$id_buku'";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='admin.php';</script>";
                  }
            } else {     
                echo "<script>alert('File yang didukung hanya pdf rar zip.');window.location='ubah.php';</script>";
            }
        }else {
            $query = "UPDATE `data_buku` SET `judul` = '$judul_buku', `penulis` = '$penulis', `jenis` = '$jenis', `sinopsis` = '$sinopsis' WHERE id='$id_buku'";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='admin.php';</script>";
                  }
        }
$conn->close();