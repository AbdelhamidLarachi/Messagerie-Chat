<!DOCTYPE HTML>
<html>
<head>
<title>Messagerie</title>
</head>
<body>
	<div id="loginDiv">
		<form id="form1" method="POST" action="userLogin.php">
			<h2>Login</h2>
			<table>
				<tr>
					<td><input type="Email" name="userEmailLogin" placeholder="Email" required></td>
				</tr>
				<tr>
					<td><input type="password" name="userPassLogin" placeholder="Password" required></td>
				</tr>
				<tr>
					<td><input type="Submit"  value="Login"></td>
				</tr>
				<?php
			if(isset($_GET['error'])){
			?>
			<tr>
			<td></td><td><span style="color: red;">Please Check your Email & Password!</span></td>
		</tr>
					<tr>
			<td></td><td><a href="http://localhost/chat/pages/signup.php">You are not registered yet?</a></td>
		</tr>
		<script type="text/javascript" name="Alert"> alert("Please Check your Email & Password!");</script>
		<?php
	}
		?>
		<tr></tr>
		<?php
			if(isset($_GET['success'])){
			
			?>
			<tr>
			<td><span style="color: green;">Welcome! Thanks for joining us.</span></td>
		</tr>
		<?php
	}
		?>
			</table>
		</form>
	</div>
</body>
</html>