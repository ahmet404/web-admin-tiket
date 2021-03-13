<?php
//koneksi sql
require('conn.php');
//tampung value and memfilter inputan user
$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
$lahir= $_POST['lahir'];
$gender = $_POST['gender'];
$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);
$tel = filter_var($_POST['telepon'], FILTER_SANITIZE_STRING);
$pass = md5($_POST['pass']);
$conf = md5($_POST['pass1']);
if(empty($gender)){
	header('location:register.php?msg=4');
} else {
	if($pass != $conf){
	header('location:register.php?msg=2');
} else {
	$sql = $conn->query("INSERT INTO penumpang VALUES(NULL,'$user','$pass','$nama','$alamat','$lahir','$gender','$tel')");
	if($sql){
		header('location:register.php?msg=1');
	} else {
		header('location:register.php?msg=3');
	}
}
}

?>