<?php
//memulai session
session_start();
session_destroy();
setcookie('ingat','',time()-3600,'/tiket');
header('location:login.php?msg=1');
?>