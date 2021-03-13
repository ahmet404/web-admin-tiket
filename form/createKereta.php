<div class="hide" id="hide-create">
	<div id="modal"></div>
	<form action="" method="POST" class="fm-create">
		<h3>Add Kereta</h3>
	<table class="t-create">
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field"></td>
		</tr>
		<tr>
			<td>Kode :<br><input type="text" name="kode" class="input-field"></td>
		</tr>
		<tr>
			<td>Harga :<br><input type="text" name="harga" class="input-field"></td>
		</tr>
		<tr>
			<td>Jumlah Kursi :<br><input type="number" min="0" max="500" name="jumlah" class="input-field"></td>
		</tr>
		<tr>
			<td>Tipe :<br>
				<select name="tipe">
					<option selected="selected">- Pilih -</option>
					<option value="1">Ekonomi</option>
					<option value="2">Bisnis</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Keterangan :<br><input type="text" name="keterangan" class="input-field"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="create" value="CREATE" class="btn add">
				<a href="javascript:void(0)" onclick="closeUp()" class="btn">Batal</a>
			</td>
		</tr>
	</table>
	</form>
<?php
global $conn;
if(isset($_POST['create'])){
$nama = $_POST['nama'];
$kode = $_POST['kode'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$tipe = $_POST['tipe'];
$keterangan = $_POST['keterangan'];

$res = $conn->query("INSERT INTO transportasi VALUES (NULL, '$kode', '$nama', '$harga', '$jumlah', '$keterangan', '$tipe')");
	if($res){
		echo "<script>alert('Berhasil Register');document.location.href='admin.php?form=5';</script>";
	} else{
		echo "<script>alert('Gagal Register');document.location.href='admin.php?form=5';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("admin.php?form=5");
	}
</script>