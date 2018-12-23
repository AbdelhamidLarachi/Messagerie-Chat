<!DOCTYPE HTML>
<html>
<head>
<title>Groupe Chat</title>
</head>
<body>
	<div id="signUp"></div>
	<form id='form2' method='post' action="insertUser.php">
		<h2>Sign Up</h2>
		<table>
			<tr>
				<td><input type="text" name="userName" placeholder="UserName" required></td>
			</tr>
			<tr>
				<td><input type="email" name="userEmail" placeholder="Email" required></td>
			</tr>
			<tr>
				<td><input type="password" name="userPass" placeholder="Password" required></td>
			</tr>
			<tr>
                <td><input type="submit" value="Submit"></td>
			</tr>	
			<td></td><td><a href="http://localhost/chat/pages/index.php">Already a member?</a></td>

			<?php
			if(isset($_GET['success'])){
			
			?>
			<tr>
			<td><span style="color: green;">You </span></td>
		</tr>
		<?php
	}
		?>
		</table>
</form>
</body>
</html>