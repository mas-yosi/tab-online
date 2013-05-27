<?php
session_start();
include "koneksi.php";
$username=htmlentities($_POST['username']);
$password=htmlentities($_POST['password']);

if(empty($username) || empty($password)){

	?><script language="javascript">document.location.href="error.php?a=3"</script><?php
	
}else{

	$query=mysql_query("SELECT * FROM user WHERE nama='$username' AND password='$password'");
	$row=mysql_fetch_array($query);
	$user=$row['nama'];
	$pass=$row['password'];
	$cek=mysql_num_rows($query);
	if($cek=='1'){
		$_SESSION['username']=$user;
		$_SESSION['password']=$pass;
		?><script language="javascript">document.location.href="index.php"</script><?php
	} else{
		echo "<script language='javascript'>document.location.href='error.php?a=2'</script>";
	}
}
?>