<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Tiket</li>
	</ul>
</section>
<section class="content">
	<h3>Daftar Tiket</h3>
	<h5>Jumlah Record :
		<?php
		$row = $conn->query("SELECT count(*) as total FROM tiket");
		$res = $row->fetch_assoc();
		echo $res['total'];
		?>
	</h5>

	<table class="t-read" id="tiket">
		<tr>
			<th>No</th>
			<th>Kode</th>
			<th>Telepon</th>
			<th>Tanggal</th>
			<th>Dari</th>
			<th>Ke</th>
			<th>Penumpang</th>
			<th>Total</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php
		$i = 1;
		$res = $conn->query("SELECT * FROM tiket");
		while($row = $res->fetch_assoc())
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['kode'];?></td>
			<td><?php echo $row['telepon'];?></td>
			<td><?php echo $row['tanggal'];?></td>
			<td><?php echo $row['dari'];?></td>
			<td><?php echo $row['ke'];?></td>
			<td><?php echo $row['penumpang'];?></td>
			<td><?php echo $row['total'];?></td>
			<td><span class="button">
				<a onclick="cetakFunction('tiket')" class="update">LIHAT & CETAK</a></span>
			</td>
		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>
<script type="text/javascript">
	function cetakFunction(el){
		var restore = document.body.innerHTML;
		var cetak = document.getElementById(el).innerHTML;
		document.body.innerHTML = cetak;
		window.print();
		document.body.innerHTML = restore;
	}
</script>
