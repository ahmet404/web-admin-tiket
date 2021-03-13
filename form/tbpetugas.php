<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Petugas</li>
	</ul>
</section>
<section class="content">
	<h3>Data Petugas</h3>
	<?php include_once('createPgs.php'); ?>
	<span class="button"><a class="create" onclick="createFunction()">CREATE</a></span>
	<h5>Jumlah Record :
		<?php
		$row = $conn->query("SELECT count(*) as total FROM petugas");
		$res = $row->fetch_assoc();
		echo $res['total'];
		?>
	</h5>

	<table class="t-read">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		$i = 1;
		$res = $conn->query("SELECT * FROM petugas JOIN level ON petugas.id_level = level.id_level");
		while($row = $res->fetch_assoc())
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['nama_petugas'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['password'];?></td>
			<td><?php echo $row['nama_level'];?></td>
			<td style="text-align:right;"><span class="button"><a onclick="updateFunction()" href="form/updatePgs.php?id=<?php echo $row['id_petugas']; ?>" class="update">UPDATE</a></span></td>
			<td style="text-align:left;"><span class="button"><a onclick="return confirm('Yakin untuk menghapus ?')" href="form/deletePgs.php?id=<?php echo $row['id_petugas'];?>" class="delete">DELETE</a></span></td>
		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>