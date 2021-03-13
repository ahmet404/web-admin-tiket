<!DOCTYPE html> 	
<html lang="id-ID">
<head>
	<title>Login - Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" href="img/icon.png">
</head>

<body>
		<form action="" method="POST">
			<p class="judul">Login</p>
			<?php if(isset($_GET['msg'])){
				if($_GET['msg'] == 1){
					echo "<p class='halo'>Anda telah keluar! Terima kasih sudah mampir!</p>";
				} else if($_GET['msg'] == 2){
					echo "<p class='pesan'>Maaf, email / password anda salah</p>";
				} else if($_GET['msg'] == 3){
					echo "<p class='pesan'> Anda harus masuk terlebih dahulu!</p>";
				} else if($_GET['msg'] == 4){
					echo "<p class='halo'>Katasandi berhasil diubah!</p>";
				} 
			}
			?>
			
			<table>
				<tr>
					<td class="right">Username</td>
					<td class="left">
						<input type="text" name="username" placeholder="Username" required/>
					</td>
				</tr>
				<tr>
					<td class="right">Password</td>
					<td class="left"><input type="password" name="pass" placeholder="Password" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><label class="ingat"><input type="checkbox" name="remember"> Remember me</label></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Login"> </td>
				</tr>
			</table>
		</form>
</body>
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
$res = $conn->query("SELECT * FROM petugas JOIN level ON petugas.id_level = level.id_level WHERE username='$user' and  password='$pass'");
	if($res->num_rows > 0 || isset($_COOKIE['ingat'])){
		$row = $res->fetch_assoc();
		if($row['id_level'] == 1){
			$_SESSION['user1'] = $row['username'];
			$_SESSION['nama1'] = $row['nama_petugas'];
			$_SESSION['level1'] = $row['nama_level'];
			header('location:admin.php');
		} else if($row['id_level'] == 2){
			$_SESSION['user2'] = $row['username'];
			$_SESSION['nama2'] = $row['nama_petugas'];
			$_SESSION['level2'] = $row['nama_level'];
			header('location:petugas.php');
		} else {
			header('location:login.php?msg=2');
		}
	} else{
		header('location:login.php?msg=2');
	}
}
$conn->close();
?>
</html>