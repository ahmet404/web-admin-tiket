<?php
include('../conn.php');
$id = $_GET['id'];
$data = $conn->query("DELETE FROM transportasi WHERE id_transportasi = '$id'");
if($data){
	header('location:../admin.php?form=5');
} else {
	echo "<script>alert('Gagal hapus data');";
}
?>