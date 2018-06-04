N<?php 
include 'connect.php';
$id_customer=$_GET['idkaryawan'];
mysql_query("delete from karyawan where idkaryawan='$idkaryawan'");
header("location:karyawan.php");

?>