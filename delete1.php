<?php
include 'koneksi.php';
// menyimpan data id_penerbit kedalam variabel
$id_penerbit = $_GET['id_penerbit'];
// query SQL untuk insert data
$query="DELETE FROM tb_keluarga WHERE id_penerbit='$id_penerbit'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:pengadaan.php");

?>