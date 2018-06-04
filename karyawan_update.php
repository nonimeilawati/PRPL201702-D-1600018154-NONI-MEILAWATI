<?php 
include 'connect.php';

$idkaryawan = $_POST ['idkaryawan'];
$namadepan = $_POST ['namadepan'];     
$namabelakang = $_POST ['namabelakang'];
$tgl = $_POST ['tgl'];
$jabatan = $_POST ['jabatan'];
$jk = $_POST ['jk'];
$nohp = $_POST ['nohp'];
$alamat = $_POST ['alamat'];
$email = $_POST ['email'];

mysql_query("update karyawan set idkaryawan='$idkaryawan', namadepan='$namadepan', namabelakang='$namabelakang','tgl='$tgl', jabatan='$jabatan', jk='$jk', nohp='nohp', alamat='$alamat', email='$email' where idkaryawan='$idkaryawan'");
header("location:karyawan.php");
