<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_brg=mysql_real_escape_string($_GET['id']);

//(select transaksi harian -7 dari hari ini ditambahkan dibagi)
//(SELECT SUM(jumlah) as test FROM (SELECT jumlah FROM `barang_laku` ORDER BY tanggal DESC LIMIT 4) as test1)
//SELECT SUM(jumlah) as test FROM (SELECT jumlah FROM `barang_laku` where nama like '%almond kecil%' ORDER BY tanggal DESC LIMIT 4) as test1
$nama = mysql_query("select nama from barang where id='$id_brg'");
$fc=mysql_query("select sum(jumlah) as test from (select jumlah from `barang_laku` where nama like '%$nama%' 
	order by tanggal desc limit 4) as test1 ")or die(mysql_error());

$det=mysql_query("select * from barang where id='$id_brg'")or die(mysql_error());

while($d=mysql_fetch_array($det)){
	?>
	<h3><?php echo $fc ?></h3>					
	<table class="table">
		<tr>
			<td>Nama</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td><?php echo $d['jenis'] ?></td>
		</tr>
	<!-- 	<tr>
			<td>Suplier</td>
			<td><?php echo $d['suplier'] ?></td>
		</tr> -->
		<!-- <tr>
			<td>Modal</td>
			<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
		</tr> -->
		<tr>
			<td>Harga</td>
			<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $d['jumlah'] ?></td>

		</tr>
		<!-- <tr>
			<td>Sisa</td>
			<td><?php echo $d['sisa'] ?></td>
		</tr> -->
	</table>
<?php 
	}
?>







<?php include 'footer.php'; ?>