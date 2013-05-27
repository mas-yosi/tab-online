<?php
	session_start();
	include "koneksi.php";
	$nominal=(int)trim($_POST['jum_debit']);
	$keterangan=$_POST['ket_debit'];
	date_default_timezone_set("Asia/Jakarta");
	$toDay=date('Y-m-d');
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$queryId=mysql_query("SELECT id_user FROM user WHERE nama='$username' AND password='$password'");
	$rowId=mysql_fetch_array($queryId);
	$id_user=$rowId['id_user'];
	$queryCek=mysql_query("SELECT * FROM tabungan WHERE id_user='$id_user' ORDER BY id_tab DESC LIMIT 0,1");
	$rowCek=mysql_fetch_array($queryCek);
	$total=(int)$rowCek['total'];
	$total=$total+$nominal;
	$querySetDebit=mysql_query("INSERT INTO tabungan (id_user, data, nominal, debit_kredit, total, tanggal) VALUE('$id_user','$keterangan','$nominal','debit','$total','$toDay')");
	if($querySetDebit){
		echo "<script language='javascript'>alert('Debit $nominal Berhasil')</script>"; 
		echo "<script language='javascript'>document.location.href='index.php'</script>";
	} else {
		echo "<script language='javascript'>alert('Input Gagal')</script>"; 
		echo "<script language='javascript'>document.location.href='index.php'</script>";
	}
?>