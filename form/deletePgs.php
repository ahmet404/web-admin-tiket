<?php
include('../conn.php');
$id = $_GET['id'];
$del = $conn->query("DELETE FROM petugas WHERE id_petugas='$id'");
if($del){
	header('location:../admin.php?form=2');
} else {
	echo "<script>alert('Gagal hapus data');document.location.href='admin.php?form=2;</script>";
}
?>