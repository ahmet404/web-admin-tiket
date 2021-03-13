<section class="content-header">
	<ul>
		<li><a href="admin.php">Home</a></li>
		<li class="active">Dashboard</li>
	</ul>
</section>
<section class="content">
	<div class="tb-penumpang">
		<h3>
			<?php
			$res = $conn->query("SELECT count(*) as total from penumpang");
			$row = $res->fetch_assoc();
			echo $row['total'];
			?>
		</h3>
		<p>Penumpang</p>
		<a href="admin.php?form=3">More info</a>
	</div>
	<div class="tb-jadwal">
		<h3>
			<?php
			$res = $conn->query("SELECT count(*) as total from rute");
			$row = $res->fetch_assoc();
			echo $row['total'];
			?>
		</h3>
		<p>Jadwal Rute</p>
		<a href="admin.php?form=6">More info</a>
	</div>
	<div class="tb-tiket">
		<h3>
			<?php
			$res = $conn->query("SELECT count(*) as total from pemesanan");
			$row = $res->fetch_assoc();
			echo $row['total'];
			?>
		</h3>
		<p>Pemesanan</p>
		<a href="admin.php?form=4">More info</a>
	</div>
</section>
<div class="clear"></div>