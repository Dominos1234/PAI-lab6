<?php
session_start();
 $link = mysqli_connect("localhost", "Scott", "tiger", "instytut");
 if (!$link) {
 printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
 }
 $success=true;
 if (isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko']))
 {
	 $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
	 $stmt = $link->prepare($sql);
	 $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
	 $result = $stmt->execute();
	 if (!$result) {
		$success = false;
	 }
	 $stmt->close();
 }
 else{
	 $success = false;
 }

if($success==true){
	 header("Location: file06_get.php");
	 $_SESSION["success"] = 1;
	 $_SESSION["komunikat"] = "Udało się dodać pracownika!";
}
else{
	 header("Location: file06_post.php");
	 $_SESSION["success"] = 0;
	 $_SESSION["komunikat"] = "Dodawanie pracownika nie powiodło się :(";
}

 ?>