<center>
<h3>Data Petugas</h3>
<table border="1" bordercolor="white" style="font-family:trebuchet MS;width:100%;border-collapse:collapse;">
	<tr style="background-color:#f9c52b;color:#eee;padding:10px;">
		<th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
	</tr>

<?php
include('../conn.php');
$i = 1;
$res = $conn->query("SELECT * FROM petugas ORDER BY id_petugas ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_data_petugas.doc");
while($row = $res->fetch_assoc()){
	echo '
	<tr style="color:#eee;background-color:#333;text-align:center;padding:10px;text-align:center;">
		<td>'.$i.'</td>
		<td>'.$row["nama_petugas"].'</td>
		<td>'.$row["username"].'</td>
		<td>'.$row["password"].'</td>
	</tr>
';

$i++;
}
echo '
	<tr>
		<td colspan="4" style="background-color:#999;color:#eee;padding:8px;">'.date("D, d-m-y").'</td>
	</tr>
	';
?>
</table>
</center>