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
$data = $conn->query("SELECT * FROM tiket WHERE id_tiket='$id'");
$row = $data->fetch_assoc();
?>
<body>
<div class="hide-update">
	<div class="modal-update"></div>
	<center>
	<form action="" method="POST" class="fm-update">
	<h3>Edit Tiket</h3>
	<table class="t-update">
		<tr>
			<td>Kode :<br><input type="text" name="kode" class="input-field" value="<?php echo $row['kode']; ?>"></td>
		</tr>
		<tr>
			<td>Telepon :<br><input type="text" name="telp" class="input-field" value="<?php echo $row['telepon']; ?>"></td>
		</tr>
		<tr>
			<td>Tanggal :<br><input type="date" name="date" class="input-field" value="<?php echo $row['tanggal']; ?>"></td>
		</tr>
		<tr>
			<td>Dari :<br><input type="text" name="dari" class="input-field" value="<?php echo $row['dari']; ?>"></td>
		</tr>
		<tr>
			<td>Ke :<br><input type="text" name="ke" class="input-field" value="<?php echo $row['ke']; ?>"></td>
		</tr>
		<tr>
			<td>Penumpang :<br><input type="text" name="penumpang" class="input-field" value="<?php echo $row['penumpang']; ?>"></td>
		</tr>
		<tr>
			<td>Total :<br><input type="text" name="total" class="input-field" value="<?php echo $row['total']; ?>"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="update" value="UPDATE" class="btn add">
				<a href="javascript:void(0)" onclick="closeUp()" class="btn">batal</a>
			</td>
		</tr>
	</table>
	</form>
</center>
<?php
include ('../conn.php');
$id = $_GET['id'];
if(isset($_POST['update'])){
$kode = $_POST['kode'];
$telp = $_POST['telp'];
$date = $_POST['date'];
$dari = $_POST['dari'];
$ke = $_POST['ke'];
$penumpang = $_POST['penumpang'];
$total = $_POST['total'];

$update = $conn->query("UPDATE `tiket` SET `kode` = '$kode', `telepon` = '$telp', `tanggal` = '$date', `dari` = '$dari', `ke` = '$ke', `penumpang` = '$penumpang', `total` = '$total' WHERE `tiket`.`id_tiket` = '$id'");
	if($update){
		echo "<script>alert('Berhasil Update data');document.location.href='../admin.php?form=4';</script>";
	} else{
		echo "<script>alert('Gagal update');document.location.href='../admin.php?form=4';</script>";
	}
}
?>
</div>
<script type="text/javascript">
	function closeUp(){
		window.location.assign("../admin.php?form=3");
	}
</script>
</bodytiket