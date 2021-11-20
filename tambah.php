<?php

include 'koneksi.php';

	
  $judul_buku   = $_POST['judul'];
  $penulis     = $_POST['penulis'];
  $jenis    = $_POST['jenis'];
  $sinopsis    = $_POST['sinopsis'];
  $gambar = $_FILES['gambar']['name'];
  $file_buku = $_FILES['file']['name'];


if($gambar != "") {
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
                  $query = "INSERT INTO data_buku (judul, penulis, jenis, gambar, sinopsis, file_buku) VALUES ('$judul_buku', '$penulis', '$jenis', '$nama_gambar_baru' , '$sinopsis' , '$nama_file_baru')";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Berhasil disimpan');window.location='jelajah.php';</script>";
                  }
            } else {     
                echo "<script>alert('Gambar yang didukung hanya jpg png jpeg.');window.location='berbagi.php';</script>";
            }
} else {
   echo "error";
}
$conn->close();