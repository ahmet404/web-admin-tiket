<?php
require('conn.php');
session_start();
if(isset($_POST['login'])){
$user = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$pass = $_POST['pass'];
$remember = isset($_POST['remember'])? TRUE : FALSE;
if($remember == TRUE)
{
	setcookie('ingat','login',time()+3600,'/tiket');
}
$res = $conn->query("SELECT * FROM petugas WHERE username='$user' and  password='$pass'");
	if($res->num_rows > 0 || isset($_COOKIE['ingat'])){
		$row = $res->fetch_assoc();
		if($row['id_level'] == 1){
			$_SESSION['user1'] = $user;
			$_SESSION['nama1'] = $row['nama_petugas'];
			$_SESSION['level1'] = "Admin";
			header('location:admin.php');
		} else if($row['id_level'] == 2){
			$_SESSION['user2'] = $user;
			$_SESSION['nama2'] = $row['nama_petugas'];
			$_SESSION['level2'] = "Petugas";
			header('location:petugas.php');
		} else {
			header('location:admin.php?msg=2');
		}
	} else{
		header('location:admin.php?msg=2');
	}
}
$conn->close();
?>