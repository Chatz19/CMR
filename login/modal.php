<?php 
require_once '../database/connect.php';
$PlateNo = $_GET['PlateNo'];
?>
<html>
	<head>
		<style type="text/css">
			section{width: auto; max-width: 600px; border-radius: 10px; box-shadow: 4px 4px 8px black; margin: auto; user-select: none;
					 background-color: white; height: auto; padding: 10px; padding-bottom: 0; font-family: courier;  font-size: 20px;}
			section div{display: inline-block; width: 49%; margin-bottom: 10px;}
			section div font{font-weight: bold; font-family: calibri;}
			button{width: 30px; height: 18px; border-width: 1px; outline: none;}
			header{margin: 100px auto; text-align: center; font-size: 18px;}
		</style>
	</head>
	<body>
		<?php 
			$sql = "SELECT * FROM car_info WHERE Plate_No = '$PlateNo'";
			$result = mysqli_query($connection, $sql);
			if($r = mysqli_fetch_assoc($result)){
				$sql = "SELECT * FROM move_record WHERE Plate_No = '$PlateNo' ORDER BY Time_ID DESC";
				$result = mysqli_query($connection, $sql);
				if($h = mysqli_fetch_assoc($result)){ }
		?>
		<section>
			<div><font>Plate No: </font> <?php echo $r['Plate_No']; ?></div>
			<div title = "Vehicle Identification Number(VIN)"><font>VIN: </font> <?php echo $r['VIN']; ?></div>
			<div><font>Company: </font> <?php echo $r['Company']; ?></div>
			<div><font>Model: </font> <?php echo $r['Model']; ?></div>
			<div><font>Year: </font> <?php echo $r['Year']; ?></div>
			<div><font>Licence No: </font> <?php echo $r['Licence_No']; ?></div>
			<div><font>Color: </font> <button style = "background: <?php echo $r['Color']; ?>" disabled = "disabled"></button></div>
			<div><font>Color in word: </font> <?php echo $r['Color_Text']; ?></div>
			<div><font>Last Movement: </font> <?php echo $h['Movement']; ?></div>
			<div><font>Time: </font> <?php echo $h['Move_Time']; ?></div>
		</section>
		<input type = "hidden" value = "1" id = "span">
		<?php } else{?>
		<header><?php echo "Result not Found<br>Plate number has not been registered"; ?></header>
		<input type = "hidden" value = "0" id = "span">
		<?php } ?>
	</body>
</html>