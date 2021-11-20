<?php
include ('koneksi.php');

session_start();

if (!isset($_SESSION["username"])) {
	echo "<script>alert('Anda belum login');window.location='login.php';</script>";
	exit;
}

$id_buku = $_GET['id'];

$sql = "DELETE FROM data_buku WHERE id='$id_buku'";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Data berhasil dihapus');window.location='admin.php';</script>";
}else{
    echo "<script>alert('Error');window.location='admin.php';</script>";
}
$conn->clone();
?>