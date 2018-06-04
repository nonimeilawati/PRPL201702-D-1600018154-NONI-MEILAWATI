<?php 
//membuat koneksi
$host = "localhost";
$username = "root";
$password = "";
$idb_name = "prplhotel";

$konek = new mysqli($host, $username, $password, $idb_name);

//cek koneksi
if($konek->connect_error){
	die("Koneksi Gagal Karena : ". $konek->connect_error);
}

$tg_checkin = date_create($_POST['checkin']);
$tg_checkout = date_create($_POST['checkout']);
$jumlahinap = date_diff($tg_checkin,$tg_checkout)->format('%a');

$nik = $_POST['nik'];
$nama = $_POST ['nama'];
$alamat = $_POST['alamat'];
$noHP = $_POST ['noHP'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$type_kamar = $_POST['type_kamar'];
$harga_kamar = $_POST['harga_kamar'];
$ppn = $_POST['harga_kamar'] * 0.10 * $jumlahinap;
$total = $_POST['harga_kamar'] * $jumlahinap + $ppn;

$sql = "INSERT INTO customer(nik, nama, alamat, noHP, checkin,checkout, jumlahinap, jenis_kelamin, type_kamar, harga_kamar, total) VALUES ('$nik', '$nama', '$alamat', '$noHP', '$checkin', '$checkout', '$jumlahinap', '$jenis_kelamin', '$type_kamar', '$harga_kamar', '$total')";
if($konek->query($sql)){
	header("location:customer.php");
}
else{
	echo "Data Gagal Di Tambah : ".$konek->error."<br/>";
}
$konek->close();
?>