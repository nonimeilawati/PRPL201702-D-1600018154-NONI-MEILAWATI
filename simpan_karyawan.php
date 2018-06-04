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

$idkaryawan = $_POST ['idkaryawan'];
$namadepan = $_POST ['namadepan'];     
$namabelakang = $_POST ['namabelakang'];
$tgl = $_POST ['tgl'];
$jabatan = $_POST ['jabatan'];
$jk = $_POST ['jk'];
$nohp = $_POST ['nohp'];
$alamat = $_POST ['alamat'];
$email = $_POST ['email'];

$sql = "INSERT INTO karyawan(idkaryawan, namadepan, namabelakang, tgl, jabatan, jk, nohp, alamat, email) VALUES ('$idkaryawan', '$namadepan', '$namabelakang', '$tgl','$jabatan', '$jk', '$nohp', '$alamat', '$email' )";

if($konek->query($sql)){
	header("location:customer.php");
}
else{
	echo "Data Gagal Di Tambah : ".$konek->error."<br/>";
}
$konek->close();
?>