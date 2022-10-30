<?php
try{
		//buat koneksi dengan database
		$dbh = new PDO ('mysql:host=localhost;
						dbname=sepeda',
						 "root", 
						 "");

		//set eror mode
		$dbh ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch (PDOException $e){
		//tampilan	Pesan Kesalahan jika koneksi gagal
		print "koneksi Gagal  :" . $e->getMessage() . "<br>";
		die();
}

$server = "localhost";
$username = "root";
$passowrd = "";
$db_name = "sepeda";

$db = new mysqli($server, $username, $passowrd, $db_name);
if(!$db){
    die();
}
?>

