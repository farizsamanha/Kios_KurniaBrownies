<?php include 'header.php'; ?>
<!-- your html form -->
<form action="POST">
    <input type='text' name='username' >
    <input type='submit' value='submit' >
</form>



<?php 

// your php code

if($_POST && isset($_POST['username'])){
	$id_brg=mysql_real_escape_string($_GET['id']);
	$nama = mysql_query("select nama from barang where id='$id_brg'");
	$fc=mysql_query("select sum(jumlah) as test from (select jumlah from `barang_laku` where nama like '%$nama%' 
	order by tanggal desc limit 4) as test1 ")or die(mysql_error());

    // $db = new \PDO('......'); // enter your db details

    // $stmt = $db->prepare("INSERT INTO table (username) VALUES (?)");
    // $result = $stmt->execute(array($_POST['username']);

    echo $fc; 

}