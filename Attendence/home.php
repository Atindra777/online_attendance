<?php
ob_start();
session_start();

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
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
<div id="main">	
<b>Welcome Professor Arko Roy</b> | [ <a href="home.php"><b>Home</b></a> ] | [ <a href="display.php">View Previous data</a> ] | [ <a href="logout.php">Log Out</a> ]<br><br>
<span id='ct' ></span><br><br>
<u><b>Your classes</b></u><br><br>

<a href="year_first.php">AEIE First Year</a><br><br>
<a href="year_second.php">AEIE Second Year</a><br><br>
<a href="year_third.php">AEIE Third Year</a><br><br>
<a href="year_fourth.php">AEIE Fourth Year</a><br><br>

</body>
</div>
<?php
}else{
	header("Location: index.php");
	ob_end_flush();
}
?>