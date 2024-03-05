<?php
 session_start();
require_once '../database/connect.php';
$username = $_SESSION['username'];
$password = $_SESSION['password'];

if(!isset($username) && !isset($password)){
	if (empty($username) && empty($password)) {
		if ($username != "unilorin" && $password != "usu001") {
			header('location: login.php');
		}
	}
}

$PlateNo = htmlentities(mysqli_real_escape_string($connection, $_POST['PlateNo']));
$Move = htmlentities(mysqli_real_escape_string($connection, $_POST['Move']));

if(isset($_FILES) && !empty($_FILES)){
	$fileName = $_FILES['Image']['name'];
	$fileType = $_FILES['Image']['type'];
	$fileTmp = $_FILES['Image']['tmp_name'];

	$fileExtension = strtoupper(substr($fileName, strripos($fileName, '.') + 1));
	$fileType = substr_replace($fileType, '', stripos($fileType, '/'));

	if($fileType == "image" && ($fileExtension == "PNG" || $fileExtension == "JPG")){
		$location = '../image/';
		move_uploaded_file($fileTmp, $location.$fileName);
		$sql = "INSERT INTO move_record (Plate_No, Movement, Driver_Passport) VALUES ('$PlateNo', '$Move', '$fileName')";
		$result = mysqli_query($connection, $sql);
		if($result){
			$msg = '<script>alert("Uploaded"); window.location.assign("http:home.php"); </script>';
			echo $msg;
		}
		else{
			$msg = '<script>//alert("Fail to upload"); window.location.assign("http:home.php"); </script>';
			echo $msg;
		}
	}
	else{
		$msg = '<script>alert("The file must be image with PNG or JPG extention"); window.location.assign("http:home.php"); </script>';
		echo $msg;
	}
}
else{
	$msg = '<script>alert("Pls, select a file"); window.location.assign("http:home.php"); </script>';
			echo $msg;
}
?>