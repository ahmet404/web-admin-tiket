<?php
	$conn = new mysqli("localhost","fsociety","an0n7","tiket");
		if($conn->connect_error){
			die("Connection Failed!: ". $conn->connect_error);
		}
?>