<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<head>
<title>Tampil Data</title>
<style>
fieldset {
width: 400px;
margin:auto;
}
</style>
</head>
<body>
<fieldset >
<!--Judul pada fieldset-->
<legend align="center">Data Produk</legend>
<center><h1>Pencarian Produk</h1></center>
<center>||<a href="tambah_from1.html">Tambah Data</a>||</center>
<br>
<a href="index.php"> home </a>
<a href="admin.php"> admin </a>
<a href="pengadaan.php"> pengadaan </a>
<br>
<form method="GET" action="pengadaan.php" style="text-align: center;">
<label>Kata Pencarian : </label>
<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo
$_GET['kata_cari']; } ?>" />
<button type="submit">Cari</button>
</form>
<table>
<thead>
<tr>
<th>Id_penerbit</th>
<th>nama</th>
<th>alamat</th>
<th>kota</th>
<th>telepon</th>

<!--Tambahan untuk opsi Update & Delete-->
<th>OPSI</th>
</tr>
</thead>
<tbody>
<?php
//untuk meinclude kan koneksi
include 'koneksi.php';
//jika kita klik cari, maka yang tampil query cari ini
if(isset($_GET['kata_cari'])) {
//menampung variabel kata_cari dari form pencarian
$kata_cari = $_GET['kata_cari'];
$query = "SELECT * FROM tb_keluarga WHERE id_penerbit like '%".$kata_cari."%' OR
nama like '%".$kata_cari."%' ORDER BY id_penerbit ASC";
} else {
//jika tidak ada pencarian, default yang dijalankan query ini
$query = "SELECT * FROM tb_keluarga ORDER BY id_penerbit ASC";
}
$result = mysqli_query($koneksi, $query);
if(!$result) {
die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
}
//kalau ini melakukan foreach atau perulangan
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id_penerbit']; ?></td>
<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['alamat']; ?></td>
<td><?php echo $row['kota']; ?></td>
<td><?php echo $row['telepon']; ?></td>
<!--Tambahan untuk opsi edit dan hapus-->
<td>
<a href="edit_from1.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">EDIT</a>
<a href="delete1.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">HAPUS</a>
</td>
</tr>

<?php
}
?>
</tbody>
</table>
</fieldset>
</body>
</html>