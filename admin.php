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
<center>||<a href="tambah_form.html">Tambah Data</a>||</center>
<br>
<a href="index.php"> home </a>
<a href="admin.php"> admin </a>
<a href="pengadaan.php"> pengadaan </a>
<br>
<form method="GET" action="index.php" style="text-align: center;">
<label>Kata Pencarian : </label>
<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo
$_GET['kata_cari']; } ?>" />
<button type="submit">Cari</button>
</form>
<table>
<thead>
<tr>
<th>Id_Buku</th>
<th>kategori</th>
<th>Nama_Buku</th>
<th>Harga</th>
<th>Stok</th>
<th>penerbit</th>
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
$query = "SELECT * FROM tb_azis WHERE id_buku like '%".$kata_cari."%' OR
nama_buku like '%".$kata_cari."%' ORDER BY id_buku ASC";
} else {
//jika tidak ada pencarian, default yang dijalankan query ini
$query = "SELECT * FROM tb_azis ORDER BY id_buku ASC";
}
$result = mysqli_query($koneksi, $query);
if(!$result) {
die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
}
//kalau ini melakukan foreach atau perulangan
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $row['id_buku']; ?></td>
<td><?php echo $row['kategori']; ?></td>
<td><?php echo $row['nama_buku']; ?></td>
<td><?php echo $row['harga']; ?></td>
<td><?php echo $row['stok']; ?></td>
<td><?php echo $row['penerbit']; ?></td>
<!--Tambahan untuk opsi edit dan hapus-->
<td>
<a href="edit_from.php?id_buku=<?php echo $row['id_buku']; ?>">EDIT</a>
<a href="delete.php?id_buku=<?php echo $row['id_buku']; ?>">HAPUS</a>
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