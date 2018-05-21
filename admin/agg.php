<?php 
include 'header.php';
?>


<div class="col-md-10">
	<h3>Perencanaan Agregat </h3>
    <br>
</div>
<?php 
$per_hal=20;
$jumlah_record=mysql_query("SELECT COUNT(*) from barang");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class='container'>
	<div class='row'>
		<div class='col-md-6'>
			<form action="#" method="get">
				<div class="input-group col-md-6">
					<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
					<input type="text" class="form-control" placeholder="Input Tahun disini.. (2018)" aria-describedby="basic-addon1" name="cari">	
				</div>
			</form>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-4'>
			<!-- level bulanan -->
			<table class="table table-hover">
				<tr>
					<h3>Level (Dalam Bulanan)</h3>
				</tr>
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-1">Minggu</th>
					<th class="col-md-1">Forecast</th>
					<th class="col-md-1">Production</th>
					<th class="col-md-1">Pekerja</th>
					<!-- <th class="col-md-1">Sisa</th>		 -->
					<!-- <th class="col-md-3">Nilai ROP</th> -->
				</tr>
				<?php 
				// (total pekerja x 1.500.000) + (sisa stock x )

				if(isset($_GET['cari'])){
					$cari=mysql_real_escape_string($_GET['cari']);
					$brg=mysql_query("select * from barang where nama like '$cari' or jenis like '$cari'");
				}else{
					$brg=mysql_query("select * from agregatbulanan limit $start, $per_hal");
				}
				$no=1;
				while($b=mysql_fetch_array($brg)){

					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b['bulan'] ?></td>
						<td><?php echo ($b['demand']) ?></td>
						<td><?php echo $b['production'] ?></td>
						<td><?php echo $b['workers'] ?></td>
						
					</tr>		
					<?php 
				}
				?>
				<tr>
				<td colspan="4">Total Biaya</td>
				<?php
				$brownies = mysql_query('select sum(production) from `agregatbulanan`');
				$browniessisa = mysql_result($brownies, 0); 
				$hargasisa = mysql_query('SELECT sum(sisa) as test FROM (select sisa from `agregatbulanan` WHERE sisa>0) as test1')or die(mysql_error());
				$hasilsisa = mysql_result($hargasisa, 0); 
				$pekerja = mysql_query('select sum(workers) from `agregatbulanan`');
				$hasilpekerja = mysql_result($pekerja, 0);

				echo "<td><b> Rp.". number_format(($hasilpekerja*1500000)+($hasilsisa*1000)+($browniessisa*30000)).",-</b></td>";
				?>
				</tr>
			</table>
		<!-- pembatas 2 tabel -->
		</div>	
		<div class='col-sm-2'>
		</div>

		<div class='col-md-4'>
			<!-- chase bulanan-->
			<table class="table table-hover">
				<tr>
					<h3>Chase (Dalam Bulanan)</h3>
				</tr>
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-1">Minggu</th>
					<th class="col-md-1">Forecast</th>
					<th class="col-md-1">Production</th>
					<th class="col-md-1">Pekerja</th>
					<!-- <th class="col-md-1">Sisa</th>		 -->
					<!-- <th class="col-md-3">Nilai ROP</th> -->
				</tr>
				<?php 
				if(isset($_GET['cari'])){
					$cari=mysql_real_escape_string($_GET['cari']);
					$brg=mysql_query("select * from barang where nama like '$cari' or jenis like '$cari'");
				}else{
					$brg=mysql_query("select * from agregatbulanan limit $start, $per_hal");
				}
				$no=1;
				while($b=mysql_fetch_array($brg)){

					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b['bulan'] ?></td>
						<td><?php echo $b['demand'] ?></td>
						<td><?php echo $b['demand'] ?></td>
						<td><?php echo $b['workers'] ?></td>
						
					</tr>		
					<?php 
				}
				?>
				<tr>
				<td colspan="4">Total Biaya</td>
				<?php
				$brownies = mysql_query('select sum(production) from `agregatbulanan`');
				$browniessisa = mysql_result($brownies, 0); 
				$hargasisa = mysql_query('SELECT sum(sisa) as test FROM (select sisa from `agregatbulanan` WHERE sisa>0) as test1')or die(mysql_error());
				$hasilsisa = mysql_result($hargasisa, 0); 
				$pekerja = mysql_query('select sum(workers) from `agregatbulanan`');
				$hasilpekerja = mysql_result($pekerja, 0);

				echo "<td><b> Rp.". number_format(($hasilpekerja*1500000)+($browniessisa*30000)).",-</b></td>";
				?>
				</tr>
			</table>
		</div>
	</div>
	<div class='row'>
		<div class='col-md-4'>
			<!-- level mingguan -->
			<table class="table table-hover">
				<tr>
					<h3>Level (Dalam Mingguan)</h3>
				</tr>
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-1">Minggu</th>
					<th class="col-md-1">Forecast</th>
					<th class="col-md-1">Production</th>
					<th class="col-md-1">Pekerja</th>
					<!-- <th class="col-md-1">Sisa</th>		 -->
					<!-- <th class="col-md-3">Nilai ROP</th> -->
				</tr>
				<?php 
				if(isset($_GET['cari'])){
					$cari=mysql_real_escape_string($_GET['cari']);
					$brg=mysql_query("select * from barang where nama like '$cari' or jenis like '$cari'");
				}else{
					$brg=mysql_query("select * from agregat limit $start, $per_hal");
				}
				$no=1;
				while($b=mysql_fetch_array($brg)){

					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b['bulan'] ?></td>
						<td><?php echo ($b['demand']) ?></td>
						<td><?php echo $b['productionlvl'] ?></td>
						<td><?php echo $b['workers'] ?></td>
						
					</tr>		
					<?php 
				}
				?>
				<tr>
				<td colspan="4">Total Biaya</td>
				<?php 
				$brownies = mysql_query('select sum(productionlvl) from `agregat`');
				$browniessisa = mysql_result($brownies, 0); 
				$hargasisa = mysql_query('SELECT sum(sisa) as test FROM (select sisa from `agregat` WHERE sisa>0) as test1')or die(mysql_error());
				$hasilsisa = mysql_result($hargasisa, 0); 
				$pekerja = mysql_query('select sum(workers) from `agregat`');
				$hasilpekerja = mysql_result($pekerja, 0);

				echo "<td><b> Rp.". number_format(($hasilpekerja*375000)+($browniessisa*30000)+($hasilsisa*1000)).",-</b></td>";
				?>
				</tr>
			</table>
		<!-- pembatas 2 tabel -->
		</div>	
		<div class='col-sm-2'>
		</div>

		<div class='col-md-4'>
			<!-- chase mingguan-->
			<table class="table table-hover">
				<tr>
					<h3>Chase (Dalam Mingguan)</h3>
				</tr>
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-1">Minggu</th>
					<th class="col-md-1">Forecast</th>
					<th class="col-md-1">Production</th>
					<th class="col-md-1">Pekerja</th>
					<!-- <th class="col-md-1">Sisa</th>		 -->
					<!-- <th class="col-md-3">Nilai ROP</th> -->
				</tr>
				<?php 
				if(isset($_GET['cari'])){
					$cari=mysql_real_escape_string($_GET['cari']);
					$brg=mysql_query("select * from barang where nama like '$cari' or jenis like '$cari'");
				}else{
					$brg=mysql_query("select * from agregat limit $start, $per_hal");
				}
				$no=1;
				while($b=mysql_fetch_array($brg)){

					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b['bulan'] ?></td>
						<td><?php echo $b['demand'] ?></td>
						<td><?php echo $b['demand'] ?></td>
						<td><?php echo $b['workers'] ?></td>
						
					</tr>		
					<?php 
				}
				?>
				<tr>
				<td colspan="4">Total Biaya</td>
				<?php 
				$brownies = mysql_query('select sum(productionlvl) from `agregat`');
				$browniessisa = mysql_result($brownies, 0); 
				$hargasisa = mysql_query('SELECT sum(sisa) as test FROM (select sisa from `agregat` WHERE sisa>0) as test1')or die(mysql_error());
				$hasilsisa = mysql_result($hargasisa, 0); 
				$pekerja = mysql_query('select sum(workers) from `agregat`');
				$hasilpekerja = mysql_result($pekerja, 0);

				echo "<td><b> Rp.". number_format(($hasilpekerja*375000)+($browniessisa*30000)).",-</b></td>";
				?>
				</tr>
			</table>
		</div>
	</div>
</div>

<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>