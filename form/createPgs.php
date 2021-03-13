<div class="hide" id="hide-create">
	<div id="modal"></div>
	<form action="" method="POST" class="fm-create">
		<h3>Add Petugas</h3>
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
$res = $conn->query("INSERT INTO petugas VALUES('','$nama','$user','$pass','2')");
	if($res){
		echo "<script>alert('Berhasil Register');document.location.href='admin.php?form=2';</script>";
	} else{
		echo "<script>alert('Gagal Register');document.location.href='admin.php?form=2';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("admin.php?form=2");
	}
</script>