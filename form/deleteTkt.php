<?php
include('../conn.php');
$id = $_GET['id'];
$del = $conn->query("DELETE FROM tiket WHERE id_tiket='$id'");
if($del){
	header('location:../admin.php?form=4');
} else {
	echo "<script>alert('Gagal hapus data');document.location.href='admin.php?form=4;</script>";
}
?>