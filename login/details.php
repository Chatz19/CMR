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

$PlateNo = htmlentities(mysqli_real_escape_string($connection, $_GET['PlateNo']));
$timeId = htmlentities(mysqli_real_escape_string($connection, $_GET['timeId']));
?>
<html>
	<head>
		<title>Details</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
		<style type="text/css">
			body{width: 100%; height: auto; margin: auto; padding-bottom: 20px;}
			article{width: 100%; max-width: 800px; background-color: rgb(204, 204, 204, 0.4); height: auto; margin: auto; margin-top: 10vh; margin-bottom: 30px;}
			form{margin: auto; width: 96%;}
			label{margin: 10px; font-weight: bold; font-family: calibri; font-size: 18px; display: inline-block; width: 90%; max-width: 200px;}
			label input{margin: 10px auto; outline: none; border: none; padding: 5px; width: 90%; max-width: 200px;}
			.image{all: initial;}
			.image input{display: none;}
			.image img{margin: 20px; width: 110px; height: 110px; object-fit: cover;}
			a{text-align: center; margin: 30px auto; text-decoration: none; color: blue; font-size: 18px; font-weight: bold;}
			input[disabled]{background: white;}
			#image{width: 110px; height: 110px; object-fit: cover; object-position: 50% 0%; margin-bottom: 30px; vertical-align: middle;}
			font{font-size: 18px; font-weight: bold; font-style: italic; font-family: arial;}
		</style>
	</head>
	<body onload = "load1()">
		<article>
			<?php 
				$sql = "SELECT * FROM Car_info WHERE Plate_No = '$PlateNo'";
				$result = mysqli_query($connection, $sql);
				if($r = mysqli_fetch_assoc($result)){
					$sqli = "SELECT * FROM move_record WHERE Time_ID = '$timeId'";
					$resulti = mysqli_query($connection, $sqli);
					if($h = mysqli_fetch_assoc($resulti)){ }
			?>
			<form>
				<center>
					<label class = "image">
						<img src = "../image/<?php echo $r['Driver_Passport'];?>" alt = "<?php echo $r['Driver_Passport'];?>" title = "Driver's Passport" >
					</label>
					<label class = "image">
						<img src = "../image/<?php echo $r['Owner_Passport'];?>" alt = "<?php echo $r['Owner_Passport'];?>" title = "Owner's Passport">
					</label>
				</center>
				<fieldset class = "name">
					<legend>Personal Details</legend>
					<label>
						Owner's Surname:
						<input type = "text" value = "<?php echo $r['Owner_Surname'];?>" disabled name = "OwnerSurname" required>
					</label>
					<label>
						Owner's First Name:
						<input type = "text" value = "<?php echo $r['Owner_Firstname'];?>" disabled name = "OwnerFirstName" required>
					</label>
					<label>
						Owner's Middle Name:
						<input type = "text" value = "<?php echo $r['Owner_Middlename'];?>" disabled name = "OwnerMiddleName" required>
					</label>
					<label>
						Driver's Surname:
						<input type = "text" value = "<?php echo $r['Driver_Surname'];?>" disabled name = "DriverSurname" required>
					</label>
					<label>
						Driver's First Name:
						<input type = "text" value = "<?php echo $r['Driver_Firstname'];?>" disabled name = "DriverFirstName" required>
					</label>
					<label>
						Driver's Middle Name:
						<input type = "text" value = "<?php echo $r['Driver_Middlename'];?>" disabled name = "DriverMiddleName" required>
					</label>
				</fieldset><br>
				<fieldset class = "car">
					<legend>Car Details</legend>
					<label>
						Plate No:
						<input type = "text" value = "<?php echo $r['Plate_No'];?>" disabled name = "PlateNo" required>
					</label>
					<label>
						Vehicle Identification Number(VIN):
						<input type = "text" value = "<?php echo $r['VIN'];?>" disabled name = "VIN" required>
					</label>
					<label>
						Company:
						<input type = "text" value = "<?php echo $r['Company'];?>" disabled name = "Company" required>
					</label>
					<label>
						Model:
						<input type = "text" value = "<?php echo $r['Model'];?>" disabled name = "Model" required>
					</label>
					<label>
						Year:
						<input type = "year" value = "<?php echo $r['Year'];?>" disabled name = "Year" required>
					</label>
					<label>
						Color:
						<input type = "text" style = "background-color:<?php echo $r['Color'];?>" disabled name = "Color">
					</label>
					<label>
						Color In Word:
						<input type = "text" value = "<?php echo $r['Color_Text'];?>" disabled name = "ColorText">
					</label>
					<label>
						Licence No:
						<input type = "text" value = "<?php echo $r['Licence_No'];?>" disabled name = "LicenceNo" required>
					</label>
					<label>
						Movement:
						<input type = "text" value = "<?php echo $h['Movement'];?>" disabled name = "LicenceNo" required>
					</label>
				</fieldset><br>
				<center>
					<img src="../image/<?php echo $h['Driver_Passport'];?>" id = "image"> 
					<font>:Drives this vehicle with the above information @ <?php echo $h['Move_Time']; ?></font>
				</center>
			</form>
			<?php } ?>
		</article>
		<center>
			<a href="home.php">Home</a>
		</center>
	</body>
</html>