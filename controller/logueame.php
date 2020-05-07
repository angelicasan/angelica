<?php

session_start();
$connect = mysqli_connect("localhost","root","","envios");

if(isset($_POST["user"]) && isset($_POST["clave"])){

	$user = mysqli_real_escape_string($connect, $_POST["user"]);
	$user = mysqli_real_escape_string($connect, $_POST["clave"]);

	$sql= "SELECT user from usuarios where (user ='$user' OR email='$user')
	AND clave='$pass'";

	$result = mysqli_query($connect, $sql);
	$num_row = mysqli_num_rows($result);
	if($num_row=="1"){
		$data=mysqli_fetch_array($result);
		$_SESSION["user"] = $data["user"];
		echo "1";
	}else{
		echo "error";
	}

} else {
	echo "error";
}

?>