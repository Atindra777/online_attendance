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
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 7.5px;
  text-align: left;
}
</style>
[ <a href="home.php">Home</a> ] | [ <a href="display.php"><b>View Previous data</b></a> ] | [ <a href="logout.php">Log Out</a> ]<br><br>
<span id='ct' ></span><br><br>
<b><u>Search for Previous Attendence Records:</b></u><br><br>
<form action="" method="post">
Enter Class Code <select name="code">
<option value="">--Select--</option>
<option value="EI-101">EI-101</option>
<option value="EI-102">EI-102</option>
<option value="EI-103">EI-103</option>
<option value="EI-104">EI-104</option>
<option value="EI-301">EI-301</option>
<option value="EI-302">EI-302</option>
<option value="EI-303">EI-303</option>
<option value="EI-304">EI-304</option>
<option value="EI-501">EI-501</option>
<option value="EI-502">EI-502</option>
<option value="EI-503">EI-503</option>
<option value="EI-504">EI-504</option>
<option value="EI-701">EI-701</option>
<option value="EI-702">EI-702</option>
<option value="EI-703">EI-703</option>
<option value="EI-704">EI-704</option>
</select> & Date <input type="date" name="c_date">
<input type="submit" name="submit" value="SEARCH">
</form>

<?php

$conn = mysqli_connect('localhost' , 'root', '', 'test');

if(isset($_POST['submit'])){
	if(isset($_POST['code']) && isset($_POST['c_date'])){
		if(!empty($_POST['code']) && !empty($_POST['c_date'])){
			
			$code = $_POST['code'];
			$c_date = $_POST['c_date'];
			
			$q = "select * from attendence where date = '".$c_date."' and code = '".$code."'";
			$r = mysqli_query($conn, $q);
			$num = mysqli_num_rows($r);
			if($num != 0)
			{
				echo '<br><b>Date (yyyy-mm-dd):</b> '.$c_date.' | ';
				echo '<b>Class Code:</b> '.$code.'<br><br>';
				echo '<b>Attendence Table:</b><br><table>
					<tr>
					<th>Roll</th>
					<th>Mark</th>
					</tr>';
					
				while($row = mysqli_fetch_assoc($r)){
					
					echo '<tr><td>'.$row['roll'].'</td>';
					echo '<td>'.$row['mark'].'</td></tr>';
					
				}
				echo '</table>';
				
			}else{
				echo '<font color="red">Enter correct details please.</font>';
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