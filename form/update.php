<!DOCTYPE html>
<html lang="id-ID">
<head>
	<title>Update - Penumpang</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<?php
include('../conn.php');
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM penumpang WHERE id_penumpang='$id'");
$row = $data->fetch_assoc();
?>
<body>
<div class="hide-update">
	<div class="modal-update"></div>
	<center>
	<form action="" method="POST" class="fm-update">
	<h3>Edit Penumpang</h3>
	<table class="t-update">
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field" value="<?php echo $row['nama_penumpang']; ?>"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" class="input-field" value="<?php echo $row['username']; ?>"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" class="input-field" value="<?php echo $row['password']; ?>"></td>
		</tr>
		<tr>
			<td>Kelahiran :<br><input type="date" name="kelahiran" class="input-field" value="<?php echo $row['tanggal_lahir']; ?>"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin :<br>
				<label><input type="radio" name="gender" value="Laki-laki" <?php if($row['jenis_kelamin'] == "Laki-laki"){echo 'checked';}?>/> Laki-laki</label><label> <input type="radio" name="gender" value="Perempuan" <?php if($row['jenis_kelamin'] == "Perempuan"){echo 'checked';} ?>/> Perempuan</label>
			</td>
		</tr>
		<tr>
			<td>Telp :<br><input type="telepon" name="telepon" class="input-field" value="<?php echo $row['telepon']; ?>"></td>
		</tr>
		<tr>
			<td>Alamat :<br><input type="text" name="alamat" class="input-field" value="<?php echo $row['alamat_penumpang']; ?>"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="update" value="UPDATE" class="btn add">
				<a href="javascript:void(0)" onclick="closeUp()" class="btn">close</a>
			</td>
		</tr>
	</table>
	</form>
</center>
<?php
include ('../conn.php');
$id = $_GET['id'];
if(isset($_POST['update'])){
$nama = $_POST['nama'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$lahir = $_POST['kelahiran'];
$gender = $_POST['gender'];
$telp = $_POST['telepon'];
$alamat = $_POST['alamat'];

$update = $conn->query("UPDATE `penumpang` SET `username` = '$user', `password` = '$pass', `nama_penumpang` = '$nama', `alamat_penumpang` = '$alamat', `tanggal_lahir` = '$lahir', `jenis_kelamin` = '$gender', `telepon` = '$telp' WHERE `penumpang`.`id_penumpang` = '$id'");
	if($update){
		echo "<script>alert('Berhasil Update data');document.location.href='../admin.php?form=3';</script>";
	} else{
		echo "<script>alert('Gagal update');document.location.href='../admin.php?form=3';</script>";
	}
}
?>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("../admin.php?form=3");
	}
</script>
</div>
</body>
</html>