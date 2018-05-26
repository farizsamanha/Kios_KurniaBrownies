<?php 
include 'config.php';
$nama=$_POST['nama'];
$suplier=$_POST['suplier'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$lead=$_POST['lead'];
$sd=$_POST['sd'];
$sl=$_POST['sl'];

mysql_query("insert into bahanbaku values('','$nama','$suplier','$harga','$jumlah','$lead','8.4','0.75', '1.645', '', '', '')");
header("location:rop.php");

//insert into bahanbaku values('','10','10','10','10','10','10','10')
 ?>