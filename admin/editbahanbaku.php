<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="rop.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysql_query("select * from bahanbaku where id='$id_brg'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="updatebahanbaku.php" method="post">
		<table class="table">
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" value="<?php echo $d['id'] ?>" disabled></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			
			
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>

			<tr>
				<td>sd</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['sd'] ?>"></td>
			</tr>

			<tr>
				<td>lead</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['lead'] ?>"></td>
			</tr>

			<tr>
				<td>sl</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['sl'] ?>"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>