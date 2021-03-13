<!DOCTYPE html>
<html lang="id-ID">
<head>
	<title>Update - Petugas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<?php
include('../conn.php');
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM petugas WHERE id_petugas='$id'");
$row = $data->fetch_assoc();
?>
<body>
<div class="hide-update">
	<div class="modal-update"></div>
	<center>
	<form action="" method="POST" class="fm-update">
	<h3>Edit Petugas</h3>
	<table class="t-update">
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field" value="<?php echo $row['nama_petugas']; ?>"></td>
		</tr>
		<tr>
			<td>User :<br><input type="text" name="user" class="input-field" value="<?php echo $row['username']; ?>"></td>
		</tr>
		<tr>
			<td>Password :<br><input type="password" name="pass" class="input-field" value="<?php echo $row['password']; ?>"></td>
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

$update = $conn->query("UPDATE petugas SET username = '$user', password = '$pass', nama_petugas = '$nama' WHERE petugas.id_petugas  = '$id'");

	if($update){
		echo "<script>alert('Berhasil Update data');document.location.href='../admin.php?form=2';</script>";
	} else{
		echo "<script>alert('Gagal update');document.location.href='../admin.php?form=2';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("../admin.php?form=2");
	}
</script>
</body>
</html>