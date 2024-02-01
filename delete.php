<?php
include 'koneksi.php';
// menyimpan data id_buku kedalam variabel
$id_buku = $_GET['id_buku'];
// query SQL untuk insert data
$query="DELETE FROM tb_azis WHERE id_buku='$id_buku'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:admin.php");

?>