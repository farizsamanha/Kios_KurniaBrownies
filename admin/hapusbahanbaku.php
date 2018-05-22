<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from bahanbaku where id='$id'");
header("location:rop.php");

?>