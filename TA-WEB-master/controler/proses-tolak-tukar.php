<?php 
include "koneksi.php";
$id_buku = $_POST['id_buku'];
$id_pengguna = $_POST['id_pengguna'];
$status = 0;
$perintahtukar = mysqli_query($koneksi,"UPDATE tukar_buku SET status=$status where id_buku=$id_buku");
if ($perintahtukar) {
	header("location:../view/pegawai/home-pegawai.php");
}
?>