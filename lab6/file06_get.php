<?php
session_start();
 $link = mysqli_connect("localhost", "Scott", "tiger", "instytut");
 if (!$link) {
 printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
 }
 
 if(isset($_SESSION["success"]) && $_SESSION["success"]==1){
	 echo '<p style="color:green;"> ' . $_SESSION["komunikat"] . '</p><br>';
	 unset($_SESSION["success"]);
	 unset($_SESSION["komunikat"]);
	 $sql = "SELECT * FROM pracownicy";
	 $result = $link->query($sql);
	 foreach ($result as $v) {
	 echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
	 }
	 $result->free();
	 $link->close();
 }
?>