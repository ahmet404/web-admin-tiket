<!DOCTYPE html>
<html lang="id-ID">
<head>
	<title>Update - Jadwal Rute</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<?php
include('../conn.php');
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM rute WHERE id_rute='$id'");
$data1 = $conn->query("SELECT * FROM transportasi JOIN rute ON transportasi.id_transportasi = rute.id_transportasi WHERE id_rute = '$id'");
$row = $data->fetch_assoc();
$row1 = $data1->fetch_assoc();
?>
<body>
<div class="hide-update">
	<div class="modal-update"></div>
	<center>
	<form action="" method="POST" class="fm-update">
	<h3>Edit Jadwal</h3>
	<table class="t-update">
		<tr>
			<td>Transportasi :<br><input type="text" name="transportasi" class="input-field" value="<?php echo $row1['nama']; ?>"></td>
		</tr>
		<tr>
			<td>Tipe :<br><input type="text" name="tipe" class="input-field" value="<?php echo $row1['tipe']; ?>"></td>
		</tr>
		<tr>
			<td>Asal :<br><input type="text" name="asal" class="input-field" value="<?php echo $row1['rute_awal']; ?>"></td>
		</tr>
		<tr>
			<td>Tujuan :<br><input type="text" name="tujuan" class="input-field" value="<?php echo $row1['tujuan']; ?>"></td>
		</tr>
		<tr>
			<td>Berangkat :<br><input type="datetime-local" name="waktu" class="input-field" value="<?php echo $row1['tgl_berangkat'];?>"></td>
		</tr>
		<tr>
			<td>Pulang :<br><input type="date" name="pulang" class="input-field" value="<?php echo $row1['tgl_pulang']; ?>"></td>
		</tr>
		<tr>
			<td>Durasi :<br><input type="text" name="durasi" class="input-field" value="<?php echo $row1['durasi']; ?>"></td>
		</tr>
		<tr>
			<td>Harga : <br><input type="number" name="harga" class="input-field" min="20000" max="700000" step="10000" value="<?php echo $row1['harga']; ?>"></td>
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
$transportasi = $_POST['transportasi'];
$tipe = $_POST['tipe'];
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$waktu = $_POST['waktu'];
$pulang = $_POST['pulang'];
$durasi = $_POST['durasi'];
$harga = 

$update = $conn->query("UPDATE `rute` SET `tujuan` = '$tujuan', `rute_awal` = '$asal', `rute_akhir` = '$tujuan', `tipe` = '$tipe', `tgl_berangkat` = '$waktu', `tgl_pulang` = '$pulang', `durasi` = '$durasi' WHERE `rute`.`id_rute` = '$id'");
	if($update){
		echo "<script>alert('Berhasil Update data');document.location.href='../admin.php?form=6';</script>";
	} else{
		echo "<script>alert('Gagal update');document.location.href='../admin.php?form=6';</script>";
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