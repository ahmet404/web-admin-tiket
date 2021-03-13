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
		$row = $conn->query("SELECT count(*) as total FROM pemesanan");
		$res = $row->fetch_assoc();
		echo $res['total'];
		?>
	</h5>

	<table class="t-read">
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
		$res = $conn->query("SELECT * FROM pemesanan");
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
				<a onclick="updateFunction()" href="form/updateTkt.php?id=<?php echo $row['id_tiket']; ?>" class="update">UPDATE</a></span>
			</td>
			<td style="text-align: center;"><span class="button"><a onclick="return confirm('Yakin untuk menghapus ?')" href="form/deleteTkt.php?id=<?php echo $row['id_tiket'];?>" class="delete">DELETE</a></span>
			</td>
			<td >
				<span class="button"><a href="#" class="kirim">Kirim</a></span>
			</td>

		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>