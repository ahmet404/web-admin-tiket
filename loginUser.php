<!DOCTYPE html> 	
<html lang="id-ID">
<head>
	<title>Login - Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" href="img/icon.png">
</head>
	<?php
	session_start();
	if(isset($_SESSION['user'])){
		header('location:penumpang.php');
	}
	else{
	?>
<body>
		<form action="" method="POST">
			<p class="judul">Login</p>
			<?php			if(isset($_GET['msg'])){
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
						<input type="text" name="user" placeholder="Username" required/>
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
</html>
<?php
}
?>
<?php
require('conn.php');
if(isset($_POST['login'])){
$user = trim(filter_var($_POST['user'], FILTER_SANITIZE_STRING));
$pass = $_POST['pass'];
$remember = isset($_POST['remember'])? TRUE : FALSE;
if($remember == TRUE)
{
	setcookie('ingat2','login',time()+3600,'/tiket');
}
	$res = $conn->query("SELECT * FROM penumpang WHERE username='$user' and password='$pass'");
	$row = $res->fetch_assoc();
	if($res->num_rows > 0 || isset($_COOKIE['ingat2'])){
		session_start();
		$_SESSION['user1'] = $row['username'];
		header('location:penumpang.php'); 
	} else {
		header('location:login.php?msg=2');
	}
		
}
$conn->close();
?>