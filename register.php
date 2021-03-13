<!DOCTYPE html>
<html lang="id-ID">
<head>
	<meta charset="UTF-8">
	<title>Register - OPTRAVEL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
	<form action="authRegister.php" method="POST">
		<p class="judul">Register</p>
		<?php
		if(isset($_GET['msg'])){
			if($_GET['msg'] == 1){
				echo "<p class='halo'>Registration success!</p>";
			} else if($_GET['msg'] == 2){
				echo "<p class='pesan'>Password do not match!</p>";
			} else if($_GET['msg'] == 3){
				echo "<p class='pesan'>Registration failed!</p>";
			} else if($_GET['msg'] == 4){
				echo "<p class='pesan'>Cannot be empty!</p>";
			}
		}
		?>

		<table>
			<tr>
				<td colspan="2">Name<br><input type="text" name="nama" class="input-field" placeholder="Nama lengkap" required></td>
			</tr>
			<tr>
				<td colspan="2">Username<br><input type="text" name="user" class="input-field" placeholder="Nama pengguna" required></td>
			</tr>
			<tr>
				<td colspan="2">Tanggal Lahir<br><input type="date" name="lahir" class="input-field" required></td>
			</tr>
			<tr>
				<td>Jenis kelamin  <br><label><input type="radio" name="gender" value="Laki-laki" class="gender" checked> Laki-laki</label></td>
				<td style="vertical-align:bottom;"><label><input type="radio" name="gender" value="Perempuan" class="gender"> Perempuan</label></td>
			</tr>
			<tr>
				<td colspan="2">Alamat<br><textarea name="alamat" cols="56" rows="5"></textarea></td>
			</tr>
			<tr>
				<td colspan="2">Telepon<br><input type="text" name="telepon" placeholder="0888xxxxxxxx" class="input-field"></td>
			</tr>
			<tr>
				<td>Kata sandi<br><input type="password" name="pass" class="pass" placeholder="Katasandi" required></td>
				<td>Konfirmasi<br><input type="password" name="pass1" class="pass" placeholder="Konfirmasi" required></td>
			</tr>
			<tr>
				<td><input type="submit" name="register" value="Daftar"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">Sudah punya akun? <a href="login.php"> login disini!</a></td>
			</tr>
	</form>
</body>
</html>