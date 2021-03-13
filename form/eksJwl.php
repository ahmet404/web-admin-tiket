<center>
<span style="font-size:24px;font-weight:bold;font-family: trebuchet MS;">Data Penumpang</span>
<table border="1" bordercolor="white" width="100%;" style="font-family:trebuchet MS;border-collapse:collapse;border-bottom:1px solid white;">
<?php
include('../conn.php');
$i = 1;
$res = $conn->query("SELECT * FROM transportasi JOIN rute ON transportasi.id_transportasi = rute.id_transportasi");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Penumpang.doc");
while($row = $res->fetch_assoc()){
	echo '
	<tr style="border-bottom:1px solid white;">
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Nama</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["nama"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Tipe</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["tipe"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Asal</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["rute_awal"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Tujuan</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["tujuan"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Berangkat</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row['tgl_berangkat'].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Pulang</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row['tgl_pulang'].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Durasi</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row['durasi'].'</td>
	</tr>
	<tr>
		<td colspan="2" style="background-color:#999;color:#fff;padding:8px 10px;width:100%;">'.date("D, d-m-y").'</td>
	</tr>
	<tr style="height:30px;"><td></td></tr>

';

$i++;
}
echo '
	
	';
?>
</table>
</center>