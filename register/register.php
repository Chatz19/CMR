<html>
	<head>
		<title>Registration</title>
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
			input[type=submit]{margin: 30px auto; border: 2px black solid; color: black; background-color: transparent; padding: 6px 10px;
				font-weight: bolder; border-radius: 10px; font-size: 20px; outline: none;}
			input[type=submit]:hover{border-color: blue; color: blue;}
			a{text-align: center; margin: 30px auto; text-decoration: none; color: blue; font-size: 18px; font-weight: bold;}
		</style>
	</head>
	<body>
		<article>
			<form action = "registerphp.php" method = "post" enctype = "multipart/form-data">
				<center>
					<label class = "image">
						<img alt = "Click here to upload Driver's Passport" id = "pass1">
						<input type = "file" onchange = "pas1()" accept = "image/*"  name = "DriverPass" required>
					</label>
					<label class = "image">
						<img alt = "Click here to upload Owner's Passport" id = "pass2">
						<input type = "file" onchange = "pas2()" accept = "image/*"  name = "OwnerPass" required>
					</label>
				</center>
				<fieldset class = "name">
					<legend>Personal Details</legend>
					<label>
						Owner's Surname:
						<input type = "text" name = "OwnerSurname" required>
					</label>
					<label>
						Owner's First Name:
						<input type = "text" name = "OwnerFirstName" required>
					</label>
					<label>
						Owner's Middle Name:
						<input type = "text" name = "OwnerMiddleName" required>
					</label>
					<label>
						Driver's Surname:
						<input type = "text" name = "DriverSurname" required>
					</label>
					<label>
						Driver's First Name:
						<input type = "text" name = "DriverFirstName" required>
					</label>
					<label>
						Driver's Middle Name:
						<input type = "text" name = "DriverMiddleName" required>
					</label>
				</fieldset><br>
				<fieldset class = "car">
					<legend>Car Details</legend>
					<label>
						Plate No:
						<input type = "text" name = "PlateNo" required>
					</label>
					<label>
						Vehicle Identification Number(VIN):
						<input type = "text" name = "VIN" required>
					</label>
					<label>
						Company:
						<input type = "text" name = "Company" required>
					</label>
					<label>
						Model:
						<input type = "text" name = "Model" required>
					</label>
					<label>
						Year:
						<input type = "year" name = "Year" required>
					</label>
					<label>
						Color:
						<input type = "color" name = "Color" value = "#ffffff">
					</label>
					<label>
						Color In Word:
						<input type = "text" name = "ColorText" placeholder = "E.g. Blue">
					</label>
					<label>
						Licence No:
						<input type = "text" name = "LicenceNo" required>
					</label>
				</fieldset>
					<center>
						<input type = "submit" value = "submit">
					</center>
			</form>
		</article>
		<center>
			<a href="../index.php">Home</a>
		</center>
	</body>
	<script type="text/javascript">
		var pass1 = document.getElementById('pass1');
		var pass2 = document.getElementById('pass2');
		function pas1() {
			pass1.src = URL.createObjectURL(event.target.files[0]);
		}
		function pas2() {
			pass2.src = URL.createObjectURL(event.target.files[0]);
		}
	</script>
</html>