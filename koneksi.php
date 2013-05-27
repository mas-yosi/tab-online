<?php
	$host="localhost";
	$user="root";
	$password="";
	$database="tab-online";
	$koneksi=mysql_connect($host,$user,$password);
	mysql_select_db($database,$koneksi);
	
	//cek koneksi
	if($koneksi){
	
	}else{
		echo "gagal koneksi";
	}
?>