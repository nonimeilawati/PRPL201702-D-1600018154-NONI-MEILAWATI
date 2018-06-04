<?php 
include 'connect.php';
$id_customer=$_GET['id_customer'];
mysql_query("delete from customer where id_customer='$id_customer'");
header("location:customer.php");

?>