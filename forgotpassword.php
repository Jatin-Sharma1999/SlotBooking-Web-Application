<html>
	<title>forgot password</title>
	<head>
		<style type="text/css">
			.forgotPass{
				width: 420px;
				height: 350px;
				background: black;
				color: white;
				opacity: 0.8;
				top: 50%;
				left: 50%;
				position: absolute;
				transform: translate(-50%, -50%);
				box-sizing: border-box;
				padding: 18px 20px;
				border-radius: 10px;
			}

			.forgotPass input[type="text"], input[type="password"]{
				background: none;
				outline: none;
				border: none;
				border-bottom: 1px solid blue;
				height: 25px;
				color: white;
				font-size: 13px;
			}

			.forgotPass input[type="date"]{
				background: none;
				color: white;
				border: 1px solid;
				height: 25px;
				border-color: blue;
				font-size: 13px;
			}

			.forgotPass input[type="submit"]{
				width: 60%;
				border: none;
				outline: none;
				height: 35px;
				background: #0040ff;
				color: white;
				font-size: 13px;
				border-radius: 20px;
			}

			.forgotPass input[type="submit"]:hover{
				background: #00bfff;
			}
			#label{
				color: white;
			}
		</style>
	</head>
	<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url(visa.jpg) no-repeat; background-size: cover">
	<?php include('passwordphp.php');?>
		<a href="login.php" style="float:right; font-weight:bold; color: white">&lt&ltBack to Previous</a>
		<div class="forgotPass">
			<h1 align="center" style="color:white">Enter details</h1>
			<form action="" method="POST">
				<table cellpadding="6"  align="center">					
					<tr>
						<td id="label">Username/E-mail:&nbsp<sup style="color:red">*</sup></td>
						<td><input type="text" name="email" placeholder="Enter username/email-id" required></td>
					</tr>
					</table><br><br>
					<p align="center"><input type="submit" name="submitbt" value="Submit"></p>
			</form>
		</div>
	</body>
</html>