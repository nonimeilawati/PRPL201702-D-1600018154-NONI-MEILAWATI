<?php 
include 'connect.php';
$tg_checkin = date_create($_POST['checkin']);
$tg_checkout = date_create($_POST['checkout']);
$jumlahinap = date_diff($tg_checkin,$tg_checkout)->format('%a');

$id_customer = $_POST['id_customer'];
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

mysql_query("update customer set nik='$nik', nama='$nama', alamat='$alamat', noHP='$noHP', checkin='$checkin', checkout='$checkout', jenis_kelamin='$jenis_kelamin', type_kamar='$type_kamar', harga_kamar='$harga_kamar', total='$total' where id_customer='$id_customer'");
header("location:customer.php");

?>