<?php 
try {
	$db=new PDO("mysql:host=localhost;dbname=tabloadi;charset=utf8",'veritabanı adı','veritabanı şifre');

}
catch (PDOExpception $e) {
	echo $e->getMessage();
}
 ?>