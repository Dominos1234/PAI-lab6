<?php
session_start();
 if(isset($_SESSION["success"]) && $_SESSION["success"]==0){
	 echo '<p style="color:red;"> ' . $_SESSION["komunikat"] . '</p><br>';
	 unset($_SESSION["success"]);
	 unset($_SESSION["komunikat"]);
 }
print<<<KONIEC
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>
 <body>
 <form action="file06_redirect.php" method="POST">
 id_prac <input type="text" name="id_prac">
 nazwisko <input type="text" name="nazwisko">
 <input type="submit" value="Wstaw">
 <input type="reset" value="Wyczysc">
 </form>
KONIEC;
?>