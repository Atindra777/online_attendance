<?php
ob_start();
session_start();
?>
<style>
	a{
	text-decoration: none;
}

	a:hover{
	text-decoration: underline;
}
</style>
<h3>Online Attendence:</h3>
<b>Login</b><br><br>
<form action="" method="post">
<input type="text" name="user" placeholder="User-Id"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>
<input type="submit" name="submit" value="ENTER">
</form>

<?php

if(isset($_POST['submit'])){
	if(isset($_POST['user']) && isset($_POST['password'])){
		if(!empty($_POST['user']) && !empty($_POST['password'])){
			$user = $_POST['user'];
			$password = $_POST['password'];
			
			if(($user == 'Arko') && ($password == '1234')){
				$_SESSION['user'] = $user;
				header("Location: home.php");
				ob_end_flush();
			}else{
				echo '<br><font color="red"><b>**Enter Correct Details.</b></font>';
			}
		}
		else{
			echo '<br><font color="red"><b>**Enter Details.</b></font>';
		}
	}
}

?>
