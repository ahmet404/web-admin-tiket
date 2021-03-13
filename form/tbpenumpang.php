<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Penumpang</li>
	</ul>

</section>


<section class="content">
	<h3>Data Penumpang</h3>
	<?php include_once('create.php'); ?>
	<span class="button"><a class="create" onclick="createFunction()">CREATE</a></span>
	<h5>Jumlah Record :
		<?php
		$row = $conn->query("SELECT count(*) as total FROM penumpang");
		$res = $row->fetch_assoc();
		echo $res['total'];
		?>
	</h5>

	<table class="t-read">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kelahiran</th>
			<th>Alamat</th>
			<th>Gender</th>
			<th>Username</th>
			<th>Password</th>
			<th>Telepon</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		$i = 1;
		$res = $conn->query("SELECT * FROM penumpang");
		while($row = $res->fetch_assoc())
		{
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['nama_penumpang'];?></td>
			<td><?php echo $row['tgl_lahir'];?></td>
			<td><?php echo $row['alamat'];?></td>
			<td><?php echo $row['gender'];?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['password'];?></td>
			<td><?php echo $row['telepon'];?></td>
			<td><span class="button"><a onclick="updateFunction()" href="form/update.php?id=<?php echo $row['id_penumpang']; ?>" class="update">UPDATE</a></span></td>
			<td><span class="button"><a onclick="return confirm('Yakin untuk menghapus ?')" href="form/delete.php?id=<?php echo $row['id_penumpang'];?>" class="delete">DELETE</a></span></td>
		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>