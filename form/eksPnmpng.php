<center>
<span style="font-size:24px;font-weight:bold;font-family: trebuchet MS;">Data Penumpang</span>
<table border="1" bordercolor="white" width="100%;" style="font-family:trebuchet MS;border-collapse:collapse;border-bottom:1px solid white;">
<?php
include('../conn.php');
$i = 1;
$res = $conn->query("SELECT * FROM penumpang ORDER BY id_penumpang ASC");
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Laporan_Data_Penumpang.doc");
while($row = $res->fetch_assoc()){
	echo '
	<tr style="border-bottom:1px solid white;">
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Name</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["nama_penumpang"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Address</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["alamat_penumpang"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Gender</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["jenis_kelamin"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Username</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row["username"].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Password</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row['password'].'</td>
	</tr>
	<tr>
		<td style="background-color:gold;color:#333;padding:8px 10px;width:20%;">Telepon</td>
		<td style="background-color:#333;color:white;padding:8px 10px;width:80%;">'.$row['telepon'].'</td>
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