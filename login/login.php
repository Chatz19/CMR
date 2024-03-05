<html>
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
		<style type="text/css">
			body{margin: 0%; width: 100%; height: auto; padding-top: 10vh; user-select:none;}

			article{width: 100%; max-width: 400px; height: auto; background-image: url(../image/wall1.jpg); background-blend-mode: darken; 
				background-repeat: no-repeat; background-position: 0% 0%; background-color: rgb(0,0,0,0.5); margin: auto;
				padding: 20px 0px; padding-bottom: 10px;}

			section{width: auto; height: auto; font-size: 40px; color: white; font-family: calibri;
					text-align: center; font-weight: bolder; margin-bottom: 10vh;}

			div{width: 100%; height: auto; margin: auto;}

			form{color: white; font-weight: bold; padding: 10px 30px;}

			label b{font-size: 20px; font-family: courier;}

			label input{margin: 10px 0; outline: none; width: 90%; height: 35px; border:none; padding: 0 10px; border-radius: 0 10px 0 10px;}

			aside{width: 100%; height: auto; margin: 15px 0; margin-top: 30px;}

			aside input{outline: none; border: white 2px solid; background-color: transparent; color: white; font-weight: bold; font-size: 20px;
				padding: 5px 10px; border-radius: 10px;}

			aside input:hover{border-color: yellow; color: yellow;}
		</style>
	</head>
	<body>
		<article>
			<section>Login</section>
			<div>
				<form action = "loginphp.php" method = "post">
					<label>
						<b>Username:</b><br>
						<input type = "text" name = "username" placeholder = "Enter your username" required>
					</label><br><br>
					<label>
						<b>Password:</b><br>
						<input type = "password" name = "password" placeholder = "********" required>
					</label><br><br>
					<aside>
						<center>
							<input type = "submit" value = "Login">
						</center>
					</aside>
				</form>
			</div>
		</article>
	</body>
</html>