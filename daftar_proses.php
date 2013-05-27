<?php
	session_start();
	include "koneksi.php";
	$username=htmlentities($_POST['username']);
	$password=htmlentities($_POST['password']);

	$query=mysql_query("INSERT INTO user (nama, password) VALUE('$username','$password')");
	if($query){
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		echo '<script language="javascript">document.location.href="home.php"</script>';
	} else{
		echo '<script language="javascript">alert("Terjadi kesalahan, silahkan daftar lagi")</script>';
		echo '<script language="javascript">document.location.href="daftar.php"</script>';
	}

?>