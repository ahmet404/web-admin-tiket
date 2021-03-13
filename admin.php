<!DOCTYPE html>
<html lang="id-ID">
<head>
	<title>Dashboard - Admin</title>
	<link rel="icon" type="image/png" href="img/icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
		<?php 
		require('conn.php');
		session_start();
		$form = isset($_GET['form']) ? $_GET['form'] : "1";
		if(isset($_SESSION['user1']) || isset($_COOKIE['ingat'])){ 
		?>
<body>
<div class="container">
	<!--HEADER-->
	<header class="header" id="header">
		<h1 class="judul">Qtravel</h1>
		
		<!--NAVIGASI-->
		<nav class="navigasi" id="navigasi">
			<!-- AKAN MUNCUL KETIKA LAYAR 768px -->
			<div class="bar" onclick="dropSide()">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>

			<span class="user"><?php echo $_SESSION['user1'];?></span>
			<div class="dropbtn" onclick="dropDown()"></div>
			<div id="drop" class="drop-content">
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<!--END NAVIGASI-->
	</header>
	<!--END HEADER-->
	
	<!--SIDEBAR-->
	<aside class="main-sidebar" id="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<span class="nama"><?php echo $_SESSION['nama1'];?> - </span>
				<span class="email"><?php echo $_SESSION['level1'];?></span>
			</div>
			<ul class="sidebar-menu">
				<p class="head-menu">MAIN NAVIGATION</p>
				<li <?php if($form==1){echo'class="active"';} else{echo'class=""';} ?>>
					<a href="admin.php?form=1">Dashboard</a>
				</li>
				<li <?php if($form==2){echo'class="active"';} else{echo'class=""';} ?>>
					<a href="admin.php?form=2">Petugas</a>
				</li>
				<li <?php if($form==3){echo 'class="active"';} else{echo'class=""';} ?>>
					<a href="admin.php?form=3"?>Penumpang</a>
				</li>
				<li <?php if($form==4){echo'class="active"';} else{echo'class=""';} ?>>
					<a href="admin.php?form=4">Tiket</a>
				</li>
				<li <?php if($form==5){echo'class="active"';}else{echo'class=""';}?>>
					<a href="admin.php?form=5">Kereta Api</a>
				</li>
				<li <?php if($form==6){echo'class="active"';}else{echo'class=""';} ?>>
					<a href="admin.php?form=6">Jadwal Rute</a>
				</li>
				<li>
					<a style="cursor:pointer;" onclick="dropSidenav()">Laporan</a>
				</li>	
					<ul id="content-sidenav" class="samping-sembunyi">
						<li><a href="form/eksPtgs.php" class="side-font"> => Petugas </a></li>
						<li><a href="form/eksPnmpng.php" class="side-font"> => Penumpang </a></li>
						<li><a href="form/eksTkt.php " class="side-font"> => Tiket </a></li>
						<li><a href="form/eksJwl.php" class="side-font"> => jadwal Rute </a></li>
					</ul>
				
			</ul>
		</section>
	</aside>
	<!--END SIDEBAR-->
	<content class="wrapper-content">
		<?php
			switch($form)
			{
				case('1'): include_once('form/dashboard.php'); break;
				case('2'): include_once('form/tbpetugas.php'); break;
				case('3'): include_once('form/tbpenumpang.php'); break;
				case('4'): include_once('form/tbtiket.php'); break;
				case('5'): include_once('form/tbkereta.php'); break;
				case('6'): include_once('form/tbjadwal.php'); break;
				default: include_once('form/dashboard.php'); break;
			}
		?>
	</content>
</div>

	<footer>
		<p class="copy"><strong>Copyright &copy 2019 <a href="https://www.smkakpgalang.sch.id">SMK AKP Galang.</a></strong> Allrights Reserved.</p>
	</footer>

<script type="text/javascript">
	function dropDown(){
		document.getElementById("drop").classList.toggle("unhide");
	}
	function dropSide(){
		document.getElementById("main-sidebar").classList.toggle("visible");
	}
	function createFunction(){
		document.getElementById("hide-create").style.marginTop="0";
		document.getElementById('modal').style.display="block";
	}
	function updateFunction(){
		document.getElementById('hide-update').style.marginTop="0";
		document.getElementById('modal').style.display="block";
	}
	function closeCreate(){
		document.getElementById("hide-update").style.marginTop="-700px";
		document.getElementById("modal").style.display="none";
	}
	function dropSidenav(){
		document.getElementById("content-sidenav").classList.toggle('samping');
	}
</script>

<?php } else{header('location:login.php?msg=3');}?>
</body>
</html>