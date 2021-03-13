	<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Jadwal Rute</li>
	</ul>
</section>
<section class="content">
	<form style="width:1000px;margin:auto;border:1px solid #3c8dbc;" method="POST">
		<h3 style="color:#eee;padding:8px 10px;background-color: #3c8dbc;margin-top:0px;font-weight:lighter;font-size:18px;">Jadwal Rute</h3>
		<table style="width:100%;margin:auto;">
			<tr>
				<td><strong>Transportasi</strong><br>
					<select name="transportasi" class="input-field">
						<option value="1">Putri Deli</option>
						<option value="2">Sribilah</option>
					</select>
				</td>
				<td><strong>Dari</strong><br>
					<select name="dari" class="input-field">
						<option value="Medan">Medan</option>
						<option value="Lubuk Pakam">Lubuk Pakam</option>
						<option value="Tanjung Balai">Tanjung Balai</option>
						<option value="Batang Kuis">Batang Kuis</option>
					</select>
				</td>
				<td><strong>Ke</strong><br>
					<select name="ke" class="input-field">
						<option value="Medan">Medan</option>
						<option value="Lubuk Pakam">Lubuk Pakam</option>
						<option value="Tanjung Balai">Tanjung Balai</option>
						<option value="Batang Kuis">Batang Kuis</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><strong>Tipe</strong>
					<select name="tipe" class="input-field" id="gender" >
						<option value="Pergi">Pergi</option>
						<option value="Pergi-Pulang" onselect="testing()">Pergi-Pulang</option>
					</select>
				</td>
				<td><strong>Tanggal Berangkat</strong><br>
					<input type="datetime-local" name="berangkat" class="input-field">
				</td>
				<td><strong>Tanggal Pulang</strong>
					<input type="date" name="pulang" class="input-field"disabled id="pulang"></td>
			</tr>
			<tr>
				

				<td><strong>Durasi</strong>
					<input type="text" name="durasi" class="input-field" placeholder="ex:1h 30m">
				</td>
				<td><strong>Harga</strong>
					<input type="number" name="harga" min="20000" max="1000000" step = "10000" class="input-field">
				</td>
				<td style="vertical-align:bottom;text-align: right;">
					<input type="submit" name="tambah" class="btn add" value="Tambahkan">
				</td>
			</tr>
		</table>
	</form>
	<?php
	require('conn.php');
	if(!empty($_POST['tambah'])){
		$tipe = $_POST['tipe'];
		$transportasi = $_POST['transportasi'];
		$asal = $_POST['dari'];
		$tujuan = $_POST['ke'];
		$berangkat = $_POST['berangkat'];
		$durasi = $_POST['durasi'];
		$harga = $_POST['harga'];
		$sql = $conn->query("INSERT INTO rute VALUES (NULL, '$tujuan', '$asal', '$tujuan','$tipe','$berangkat','$durasi', '$harga', '$transportasi');");
		if($sql){
			echo "<script>alert('Berhasil menambahkan!');document.location.href='./admin.php?form=6';</script>";
		} else{
			echo "<script>alert('Gagal menambahkan!');</script>";
		}
	}
	?>
	<br>
	<table class="t-read">
		<tr>
			<th>Transportasi</th>
			<th>Tipe</th>
			<th>Asal</th>
			<th>Tujuan</th>
			<th>Berangkat</th>
			<th>Pulang</th>
			<th>Durasi</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
		$res = $conn->query("SELECT * FROM transportasi JOIN rute ON transportasi.id_transportasi = rute.id_transportasi");
		while($row = $res->fetch_assoc())
		{
		?>
		<tr>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['tipe'];?></td>
			<td><?php echo $row['rute_awal'];?></td>
			<td><?php echo $row['rute_akhir'];?></td>
			<td><?php echo $row['tgl_berangkat'];?></td>
			<td><?php echo $row['tgl_pulang'];?></td>
			<td><?php echo $row['durasi'];?></td>
			<td style="text-align: right;"><span class="button"><a onclick="updateFunction()" href="form/updateJadwal.php?id=<?php echo $row['id_rute']; ?>" class="update">UPDATE</a></span></td>
			<td style="text-align: left;"><span class="button"><a onclick="return confirm('Yakin untuk menghapus ?')" href="form/deleteJadwal.php?id=<?php echo $row['id_rute'];?>" class="delete">DELETE</a></span></td>
		</tr>
		<?php 
		$i++;
		}
		?>
	</table>
</section>