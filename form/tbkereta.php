<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Kereta Api</li>
	</ul>
</section>
<section class="content">
	<h3>Daftar Kereta</h3>
	<?php include_once('createKereta.php'); ?>
	<span class="button"><a class="create" onclick="createFunction()">CREATE</a></span>

	<h5>Jumlah Record :
		<?php
		$row = $conn->query("SELECT count(*) as total FROM transportasi");
		$res = $row->fetch_assoc();
		echo $res['total'];
		?>
	</h5>

	<table class="t-read">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kode</th>
			<th>Harga</th>
			<th>Jumlah Kursi</th>
			<th>Keterangan</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		$i = 1;
		$res = $conn->query("SELECT * FROM transportasi");
		while($row = $res->fetch_assoc())
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['kode'];?></td>
			<td><?php echo $row['harga'];?></td>
			<td><?php echo $row['jumlah_kursi'];?></td>
			<td><?php echo $row['keterangan'];?></td>
			<td style="text-align:right;"><span class="button"><a onclick="updateFunction()" href="form/updateKereta.php?id=<?php echo $row['id_transportasi']; ?>" class="update">UPDATE</a></span></td>
			<td style="text-align:left;"><span class="button"><a onclick="return confirm('Yakin untuk menghapus ?')" href="form/deleteKereta.php?id=<?php echo $row['id_transportasi'];?>" class="delete">DELETE</a></span></td>
		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>