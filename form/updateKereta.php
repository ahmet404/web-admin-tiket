<!DOCTYPE html>
<html lang="id-ID">
<head>
	<title>Update - Kereta</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<?php
include('../conn.php');
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM transportasi WHERE id_transportasi='$id'");
$row = $data->fetch_assoc();
?>
<body>
<div class="hide-update">
	<div class="modal-update"></div>
	<center>
	<form action="" method="POST" class="fm-update">
	<h3>Edit Kereta</h3>
	<table class="t-update">
		<tr>
			<td>Nama :<br><input type="text" name="nama" class="input-field" value="<?php echo $row['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Kode :<br><input type="text" name="kode" class="input-field" value="<?php echo $row['kode']; ?>"></td>
		</tr>
		<tr>
			<td>Harga :<br><input type="text" name="harga" class="input-field" value="<?php echo $row['harga']; ?>"></td>
		</tr>
		<tr>
			<td>Jumlah Kursi :<br><input type="number" min="0" max="500" name="jumlah" class="input-field" value="<?php echo $row['jumlah_kursi']; ?>"></td>
		</tr>
		<tr>
			<td>Keterangan :<br><input type="text" name="keterangan" class="input-field" value="<?php echo $row['keterangan']; ?>"></td>
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
$kode = $_POST['kode'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];

$update = $conn->query("UPDATE transportasi SET nama = '$nama', kode = '$kode', harga = '$harga', jumlah_kursi = '$jumlah', keterangan = '$keterangan' WHERE transportasi. id_transportasi = '$id'");
	if($update){
		echo "<script>alert('Berhasil Update data');document.location.href='../admin.php?form=5';</script>";
	} else{
		echo "<script>alert('Gagal update');document.location.href='../admin.php?form=5';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("../admin.php?form=3");
	}
</script>
</body>
</html>