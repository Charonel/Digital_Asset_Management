<?php
    foreach($_GET as $key=>$val) {
	// read get request from web
	$SN = $val;
}

//connect database
$servername = "";
$username = "";
$password = "";
$dbname = "";

// creat connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `device` WHERE `SN` = '$SN'";
// echo ($sql);
if(!mysqli_query($conn, $sql)) {
	die('Error : ' . mysqli_error($conn));
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output db
	while($row = $result->fetch_assoc()) {
		$TAG = $row["TAG"];
		$TIME = $row["TIME"];
		$NOTE = $row["NOTE"];
		$N1 = $row["N1"];
		$N2= $row["N2"];
		echo"<body>";
		echo"<div style='text-align: center'>";
		echo"<h1>";
		print ("Wellcome to Charonel QR Service");
		echo"</h1>";
		echo"</br>";
		echo"<div style='border: 5px solid;'>";
		echo"<p style='font-size: 5vw; text-align: left; margin-left: 10%; width:80%;'>";
		print ("SN：".$SN);
		echo"</br>";
		print ("TAG：".$TAG);
		echo"</br>";
		if($TIME != NULL) {
			print ("Date：".$TIME);
		} else {
			print ("Date：Unknow");
		}
		if($NOTE != NULL) {
			echo"</br>";
			print ("INFO：");
			echo"<p style='font-size: 4vw; text-align: left; margin-left: 10%; width:80%; height: 30%; border: 5px inset;'>";
			print ($NOTE);
			echo"</p>";
		} else {
		}
		if($N1 != NULL) {
			echo"</br>";
			echo"<p style='font-size: 3vw; text-align: left; margin-left: 10%; width:80%; border: 5px inset;'>";
			print ($N1);
			echo"</p>";
		} else {
		}
		if($N2 != NULL) {
			echo"</br>";
			echo"<p style='font-size: 3vw; text-align: left; margin-left: 10%; width:80%; border: 5px inset;'>";
			print ($N2);
			echo"</p>";
		} else {
		}
		echo"</p>";
		echo"</div>";
		echo"</div>";
		echo"</body>";
	}
} else {
	echo "Not Found";
}
$conn->close();
?>
