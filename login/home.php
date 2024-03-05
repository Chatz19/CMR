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
?>
<html>
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
		<style type="text/css">
			body{width: 100%; height: auto; margin: 0px auto; overflow: auto; background-color: #ccc;}
			article{height: auto; width: 100vw; margin: 0 auto; margin-top: 15%; overflow: auto;}
			.input-sec{width: auto; float: auto; margin: auto; height: auto; max-width: 100%; display: -webkit-flex;}
			form{margin: auto;}
			label{margin-right: 30px; font-weight: bold; font-size: 20px; font-family: calibri;}
			input{outline: none; border: none; font-family: courier; font-weight: bold; margin-bottom: 20px; display: inline-block;}
			label input{padding: 8px 10px; border-bottom: #ccc 1px solid; width: 250px; font-size: 16px;}
			select{outline: none; border: none; border-bottom: #ccc 1px solid; font-size: 16px; font-family: courier;}
			input[type=submit]{background-color: orange; padding: 8px 10px; color: white; font-size: 16px; font-weight: bold;}
			font{display: inline-block;}
			.list{width: 100%;}
			table{margin: 30px auto; margin-top: 10px; border-spacing: 0;}
			th{font-size: 20px; font-weight: bold; font-family: calibri; padding: 10px;}
			tr:nth-child(odd){background-color: #999; border: none; padding: 10px; color: white;}
			tr:nth-child(even){background-color: white; border: none; padding: 10px;}
			tr:nth-child(odd) td{border: 0px solid #999; border-width: 1px 0px;}
			td{padding: 10px; font-family: arial; font-size: 18px; text-align: center;}
			#demo{top: 0; width: 100vw; margin-top: 30px;}
			a{text-decoration: none; color: blue; font-weight: bold; font-family: calibri; font-size: 18px;}
			#form{margin: 0 20%;}
			#form input{font-size: 16px;}
			#form input[type=submit]{width: 100px; margin-left: 20px;}
		</style>
	</head>
	<body>
		<div id = "demo"></div>
		<article>
			<div class = "input-sec">
				<form action = "submit.php" method = "post" enctype = "multipart/form-data">
					<label>
						<font>Plate Number: </font>
						<input type = "text" name = "PlateNo" placeholder = "Enter the car's plate No." name = "PlateNo" onkeyup = "bender1(this)" required>
					</label>
					<label>
						</font>Movement: </font>
						<select name = "Move" required>
							<option></option>
							<option>IN</option>
							<option>OUT</option>
						</select>
					</label>
					<input type = "submit" Value = "Verify" id = "submit"><br>
					<input type = "file" name = "Image" required>
				</form>
			</div>

			<script type="text/javascript">
			var verify = document.getElementById('submit');
				function bender1 (textbox){
					var ajax;

					var data = textbox.value;

					if(data == ""){
						document.getElementById('demo').style.display = "none";
					}
					else{
						document.getElementById('demo').style.display = "block";
					}

				if(window.XMLHttpRequest){
					
					ajax = new XMLHttpRequest();
					
				}
				else{
					
					ajax = new ActiveXObject("Microsoft.XMLHTTP");
					
				}
				ajax.onreadystatechange = function(){
					if(ajax.readyState == 4 && ajax.status == 200){
						document.getElementById('demo').innerHTML = ajax.responseText;
						var span = document.getElementById('span').value;
						if(span == 0){
							verify.disabled = true;
						}
						else{
							verify.disabled = false;
						}
					}
					
				}

				ajax.open("GET", "modal.php?PlateNo="+data, true);
				ajax.send();
				}
			</script>
			<form id = "form" method = "post">
				<label>
					Date: <input type = "date" name = "date" required> <input type = "submit" value = "check">
				</label>
			</form>
			<div class = "list">
				<table>
					<tr>
						<th>Plate No.</th>
						<th>VIN</th>
						<th>Company</th>
						<th>Model</th>
						<th>Year</th>
						<th>Color</th>
						<th>Color in Word</th>
						<th>Licence No.</th>
						<th>Movement</th>
						<th>Time</th>
						<th><a href="cars.php">View All</a></th>
					</tr>
					<?php 
						if(!isset($_POST['date']) && empty($_POST['date'])){
							$date = date('Y-m-d');
						}
						else{
							$date = $_POST['date'];
						}
						$sql = "SELECT * FROM move_record WHERE Move_Time like '$date%' ORDER BY Time_ID DESC";
						$result = mysqli_query($connection, $sql);
						while($r = mysqli_fetch_assoc($result)){
							$plate = $r['Plate_No'];
					?>
					<tr>
						<?php
						$sqli = "SELECT * FROM car_info WHERE Plate_No = '$plate'";
						$resulti = mysqli_query($connection, $sqli);
						if($h = mysqli_fetch_assoc($resulti)){
						?>
						<td><?php echo $h['Plate_No'] ?></td>
						<td><?php echo $h['VIN'] ?></td>
						<td><?php echo $h['Company'] ?></td>
						<td><?php echo $h['Model'] ?></td>
						<td><?php echo $h['Year'] ?></td>
						<td style = "background-color:<?php echo $h['Color']; ?>"></td>
						<td><?php echo $h['Color_Text'] ?></td>
						<td><?php echo $h['Licence_No'] ?></td>
						<td><?php echo $r['Movement'] ?></td>
						<td><?php echo $r['Move_Time'] ?></td>
						<td><a href="details.php?timeId=<?php echo $r['Time_ID']; ?>&PlateNo=<?php echo $h['Plate_No']; ?>">Details</a></td>
					<?php } ?>	
					</tr>
					<?php } ?>
				</table>
			</div>
			<center><a href="logout.php">Home</a></center>
		</article>
	</body>
</html>

