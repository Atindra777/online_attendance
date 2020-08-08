<?php
ob_start();
session_start();

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){

$conn = mysqli_connect('localhost' , 'root', '', 'test');

date_default_timezone_set('Asia/Kolkata');
				
$time = date("H:i:sa");
$date = date("Y-m-d");
?>
<!doctype html>
<html>
<head>
<style>
		a{
	text-decoration: none;
	color: #2471A3;
}

	a:hover{
	text-decoration: underline;
	color: #0052cc;
}
</style>
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
var month=x.getMonth()+1;
var day=x.getDate();
var year=x.getFullYear();
if (month <10 ){month='0' + month;}
if (day <10 ){day='0' + day;}
var x3= month+'-'+day+'-'+year;

// time part //
var hour=x.getHours();
var minute=x.getMinutes();
var second=x.getSeconds();
if(hour <10 ){hour='0'+hour;}
if(minute <10 ) {minute='0' + minute; }
if(second<10){second='0' + second;}
var x3 = x3 + ' ' +  hour+':'+minute+':'+second;

document.getElementById('ct').innerHTML = x3;
display_c();
 }
</script>
</head>
<body onload=display_ct();>
[ <a href="home.php">Home</a> ] | [ <a href="display.php">View Previous data</a> ] | [ <a href="logout.php">Log Out</a> ]<br><br>
<span id='ct' ></span><br><br>
<b><u>Class: 3rd Year</u></b><br><br>
<form action="" method="post">
Select Class Code:<select name="class">
<option value="">--Select--</option>
<option value="EI-501">EI-501</option>
<option value="EI-502">EI-502</option>
<option value="EI-503">EI-503</option>
<option value="EI-504">EI-504</option>
</select>
<br><br>
<input type="checkbox" name="student[]" value="11705518051">Neel Dey<br><br>
<input type="checkbox" name="student[]" value="11705518052">Sajal Saha<br><br>
<input type="checkbox" name="student[]" value="11705518053">Pramita Dubey<br><br>
<input type="checkbox" name="student[]" value="11705518054">Atin Sarkar<br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php

if(isset($_POST['submit'])){
	if(isset($_POST['student']) && isset($_POST['class'])){
		if(!empty($_POST['student']) && !empty($_POST['class'])){
			$student = $_POST['student'];
			$class = $_POST['class'];
			
			foreach( $student as $stud){
			$q = "insert into attendence(roll, mark, date, code) values('".$stud."', 'P', '".$date."', '".$class."')";
			$r = mysqli_query($conn, $q);
			
			if($r){ $flag = 1;}
			}
			
			if($flag == 1)
			{
				echo '<font color="green">Attendence taken done!!!</font>';
			}
		}
	}
}
?>
</body>
</html>
<?php
}else{
	header("Location: index.php");
	ob_end_flush();
}
?>