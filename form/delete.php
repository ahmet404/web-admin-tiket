<?php
include('../conn.php');
$id = $_GET['id'];
$del = $conn->query("DELETE FROM penumpang WHERE id_penumpang='$id'");
if($del){
	header('location:../admin.php?form=3');
} else {
	echo "<script>alert('Gagal hapus data');document.location.href='admin.php?form=3;</script>";
}
?>