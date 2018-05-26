<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span> ROP Bahan Baku</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from bahanbaku where jumlah <= ROP");
while($q=mysql_fetch_array($periksa)){	
	if($q['jumlah']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>

		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
<?php 
$per_hal=20;
$jumlah_record=mysql_query("SELECT COUNT(*) from barang");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Nama Barang</th>
		<th class="col-md-1">Harga</th>
		<th class="col-md-1">Penjualan</th>
		<th class="col-md-1">Standar Deviasi Demand</th>
		<th class="col-md-1">Lead Time</th>
		<th class="col-md-1">Standar Deviasi Lead Time</th>
		<th class="col-md-1">Safety Stock</th>
		<th class="col-md-1">ROP</th>
		<th class="col-md-2">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from bahanbaku where nama like '$cari' or jenis like '$cari'");
	}else{
		$brg=mysql_query("select * from bahanbaku limit $start, $per_hal");
		$brgbaru=mysql_query("select sum(jumlah) from barang_laku");
		$x = mysql_result($brgbaru, 0);	
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		//teta = sqrt((power((jumlah),2)*power(sl,2))+power(lead,2)*power(sd,2))
		//ss = z*(sqrt((power((jumlah),2)*power(sl,2))+power(lead,2)*power(sd,2)))
		// rop (jumlah)*lead+(z*(sqrt((power((jumlah),2)*power(sl,2))+power(lead,2)*power(sd,2))))

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['jumlah'] ?></td>

			<td><?php echo $b['sd'] ?></td>
			<td><?php echo $b['lead'] ?></td>
			<td><?php echo $b['sl'] ?></td>
			<td><?php echo $b['ss'] ?></td>
			<td><?php echo $b['ROP'] ?></td>
			<td>
					
				<a href="editbahanbaku.php?id=<?php echo $b['id']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusbahanbaku.php?id=<?php echo $b['id']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4"></td>
		<td>			
		<?php 
		
			// $x=mysql_query("select sum(modal) as total from barang");	
			// $xx=mysql_fetch_array($x);			
			// echo "<b> Rp.". number_format($xx['total']).",-</b>";		
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmbh_brg_baku.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga">
					</div>	
					
					<div class="form-group">
						<label>Penjualan</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Demand">
					</div>		

					<div class="form-group">
						<label>Waktu Pengiriman</label>
						<input name="lead" type="text" class="form-control" placeholder="waktu kirim...">
					</div>
					<!-- <div class="form-group">
						<label>Standar Deviasi Demand</label>
						<input name="sd" type="text" class="form-control" placeholder="Standar Deviasi Demand">
					</div>	
					<div class="form-group">
						<label>Standar Deviasi Lead Time</label>
						<input name="sl" type="text" class="form-control" placeholder="Standar Deviasi Lead Time">
					</div>	 -->



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';
?>