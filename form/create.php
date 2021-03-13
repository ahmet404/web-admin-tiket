<div class="hide" id="hide-create">
	<div id="modal"></div>
	<form action="" method="POST" class="fm-create">
		<h3>Add Penumpang</h3>
	<table class="t-create">
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" class="input-field"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" class="input-field"></td>
		</tr>
		<tr>
			<td>Kelahiran :<br><input type="date" name="kelahiran" class="input-field"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin :<br>
				<select name="gender" class="input-field">
					<option value="" selected="selected">Pilih</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Telp :<br><input type="telepon" name="telepon" class="input-field"></td>
		</tr>
		<tr>
			<td>Alamat :<br><input type="text" name="alamat" class="input-field"></td>
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
if(isset($_POST['create'])){
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$lahir = $_POST['kelahiran'];
$gender = $_POST['gender'];
$telp = $_POST['telepon'];
$alamat = $_POST['alamat'];

$res = $conn->query("INSERT INTO penumpang VALUES('','$nama','$user','$pass','$lahir','$gender','$alamat','$telp')");
	if($res){
		echo "<script>alert('Berhasil Register');document.location.href='admin.php?form=3';</script>";
	} else{
		echo "<script>alert('Gagal Register');document.location.href='admin.php?form=3';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("admin.php?form=3");
	}
</script>