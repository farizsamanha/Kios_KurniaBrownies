<?php 
include 'config.php';
$id = $_POST['id'];
$nama=$_POST['nama'];

$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
$lead=$_POST['lead'];
$sd=$_POST['sd'];
$sl=$_POST['sl'];

mysql_query("update bahanbaku set nama='$nama', harga='$harga', jumlah='$jumlah', lead='$lead', sd='$sd', sl='$sl' where id='$id'")or die(mysql_error());
header("location:rop.php");

//'','$nama','$suplier','$harga','$jumlah','$lead','$sd','$sl', '', '', '', ''
//update bahanbaku set nama='$nama', supplier='$suplier', harga='$harga', jumlah='$jumlah', lead='$lead', sd='$sd', sl='$sl' where id='$id'
//update bahanbaku set nama='10', supplier='10', harga='10', jumlah='10', lead='10', sd='10', sl='10' where id='1'

?>