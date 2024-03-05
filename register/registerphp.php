<?php
require_once '../database/connect.php';

$OwnerSurname = htmlentities(mysqli_real_escape_string($connection, $_POST['OwnerSurname']));
$OwnerFirstName = htmlentities(mysqli_real_escape_string($connection, $_POST['OwnerFirstName']));
$OwnerMiddleName = htmlentities(mysqli_real_escape_string($connection, $_POST['OwnerMiddleName']));
$DriverSurname = htmlentities(mysqli_real_escape_string($connection, $_POST['DriverSurname']));
$DriverFirstName = htmlentities(mysqli_real_escape_string($connection, $_POST['DriverFirstName']));
$DriverMiddleName = htmlentities(mysqli_real_escape_string($connection, $_POST['DriverMiddleName']));
$PlateNo = htmlentities(mysqli_real_escape_string($connection, $_POST['PlateNo']));
$VIN = htmlentities(mysqli_real_escape_string($connection, $_POST['VIN']));
$Company = htmlentities(mysqli_real_escape_string($connection, $_POST['Company']));
$Model = htmlentities(mysqli_real_escape_string($connection, $_POST['Model']));
$Year = htmlentities(mysqli_real_escape_string($connection, $_POST['Year']));
$Color = htmlentities(mysqli_real_escape_string($connection, $_POST['Color']));
$ColorText = htmlentities(mysqli_real_escape_string($connection, $_POST['ColorText']));
$LicenceNo = htmlentities(mysqli_real_escape_string($connection, $_POST['LicenceNo']));

$sql = "SELECT * FROM car_info WHERE Plate_No = '$PlateNo'";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
if($count > 0){
	$msg = '<script>alert("The Plate No has been registered"); window.location.assign("http:register.php"); </script>';
	echo $msg;
	die();
}

$OwnerPass = $_FILES['OwnerPass']['name'];
$OwnerType = $_FILES['OwnerPass']['type'];
$OwnerTmp = $_FILES['OwnerPass']['tmp_name'];

$DriverPass = $_FILES['DriverPass']['name'];
$DriverType = $_FILES['DriverPass']['type'];
$DriverTmp = $_FILES['DriverPass']['tmp_name'];

$OwnerExt = strtoupper(substr($OwnerPass, stripos($OwnerPass, '.') + 1));
$OwnerType = substr_replace($OwnerType, '', stripos($OwnerType, '/'));

$DriverExt = strtoupper(substr($DriverPass, stripos($DriverPass, '.') + 1));
$DriverType = substr_replace($DriverType, '', stripos($DriverType, '/'));

if(isset($_FILES) && !empty($_FILES)){
	if($OwnerType == "image" && $DriverType == "image" && ($OwnerExt == "JPG" || $OwnerExt == "PNG") && ($DriverExt == "JPG" || $DriverExt == "PNG")){
		$location = '../image/';
		move_uploaded_file($OwnerTmp, $location.$OwnerPass);
		move_uploaded_file($DriverTmp, $location.$DriverPass);
		$sql = "INSERT INTO car_info (Owner_Surname, Owner_Firstname, Owner_Middlename, Driver_Surname, Driver_Firstname, Driver_Middlename, Plate_No, VIN, 
									Company, Model, Year, Color, Color_Text, Licence_No, Owner_Passport, Driver_Passport) 
				VALUES ('$OwnerSurname', '$OwnerFirstName', '$OwnerMiddleName', '$DriverSurname', '$DriverFirstName', '$DriverMiddleName', '$PlateNo', '$VIN', 
						'$Company', '$Model', '$Year', '$Color', '$ColorText', '$LicenceNo', '$OwnerPass', '$DriverPass')";

		$result = mysqli_query($connection, $sql);
		if($result){
			$msg = '<script>alert("Uploaded"); window.location.assign("http:../login/home.php"); </script>';
			echo $msg;
		}
		else{
			$msg = '<script>alert("Fail to upload"); window.location.assign("http:register.php"); </script>';
			echo $msg;
		}
	}
	else{
		$msg = '<script>alert("Upload image with JPG or PNG extension"); window.location.assign("http:register.php"); </script>';
		echo $msg;
	}
}
else{
	$msg = '<script>alert("Pls, select a file"); window.location.assign("http:register.php"); </script>';
	echo $msg;
}

?>