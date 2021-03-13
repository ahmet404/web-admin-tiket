<?php
require('../conn.php');
$res = $conn->query("SELECT * FROM tiket ORDER BY id_tiket ASC");
while($row = $res->fetch_assoc()){
echo '
<style>
	*{font-size:xx-small;}
	.box{border:1px solid #000;width:100%;height:200px;}
</style>
<table border="0" align="center" cellpadding="2">
	<td width="50%">
		<div class="box">
		<table border="0" align="center">
			<tr>
				<td>NAMA/ NO. KA</td>
				<td>:</td>
				<td>ACHMAD FAUZI/71</td>
			</tr>
			<tr>
				<td>TANGGAL</td>
				<td>:</td>
				<td>'.date("d M y").'</td>
			</tr>
			<tr>
				<td>NO. KURSI</td>
				<td>:</td>
				<td>72</td>
			</tr>
			<tr>
				<td>BERANGKAT</td>
				<td>:</td>
				<td>'.$row["dari"].', '.$' WIB</td>
			</tr>
			<tr>
				<td>TIBA</td>
				<td>:</td>
				<td>BINJAI (BIJ), 15.20 WIB</td>
			</tr>
			<tr>
				<td>HARGA</td>
				<td>:</td>
				<td>IDR 10.000</td>
			</tr>
		</table>
		</div>
</td>
</table>
';
}
?>