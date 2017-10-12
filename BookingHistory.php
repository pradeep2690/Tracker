<html>
<head><title>OTMS Booking history</title>
<script type="text/javascript">
function noBack()
{
window.history.forward()
}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted) noBack()}
window.onunload=function(){void (0) }
</script>
</head>
<h1 align=center>Online Travel management System<h1>
<hr>
<h2 align=center>Booking History<h2>
<table align=left><tr>
<td><a href="Welcome.php">Welcome Page</a></td>
<td></td><td><a href="UpdateProfile.php">Update Profile</a></td></tr>
</table>
<table align=right>
<tr>
<td>
<a href="ChangePassword.php">Change Password</a></td>
<td></td><td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<hr>
<body bgcolor=pink oncontextmenu="return false" >
<form method=POST>
<table align=center>
<tr>
<td>START DATE<span style=color:red >*</span> <input type=date name=sdate value=yyyy-mm-dd></td>
<td></td>
<td>END DATE<span style=color:red >*</span> <input type=date name=edate value=yyyy-mm-dd></td>
</tr>
</table>
<table align=center>
<tr>
<td><input type=submit name=view value='view booking history'></td>
</tr>
<html>
<head><title>OTMS Booking history</title>
<script type="text/javascript">
function noBack()
{
window.history.forward()
}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted) noBack()}
window.onunload=function(){void (0) }
</script>
</head>
<h1 align=center>Online Travel management System<h1>
<hr>
<h2 align=center>Booking History<h2>
<table align=left><tr>
<td><a href="Welcome.php">Welcome Page</a></td>
<td></td><td><a href="UpdateProfile.php">Update Profile</a></td></tr>
</table>
<table align=right>
<tr>
<td>
<a href="ChangePassword.php">Change Password</a></td>
<td></td><td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<hr>
<body bgcolor=pink oncontextmenu="return false" >
<form method=POST>
<table align=center>
<tr>
<td>START DATE<span style=color:red >*</span> <input type=date name=sdate value=yyyy-mm-dd></td>
<td></td>
<td>END DATE<span style=color:red >*</span> <input type=date name=edate value=yyyy-mm-dd></td>
</tr>
</table>
<table align=center>
<tr>
<td><input type=submit name=view value='view booking history'></td>
</tr><?php
if (isset($_POST['view']))
{
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
if((preg_match("/\d{4}-\d{2}-\d{2}/",$sdate)) && (preg_match("/\d{4}-\d{2}-\d{2}/",$edate)))
{
if($sdate<$edate)
{
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$stmt=mysqli_query($con,"select RequestID,TravelDate,SourceSecurity,DestinationCity from 8_REQUEST_DETAILS  where TravelDate between '$sdate' and '$edate'");
echo "<table border=2><tr><th>RequestID</th><th>TravelDate</th><th>Source</th><th>Destination</th></tr>";
while($row=mysqli_fetch_row($stmt))
{
echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td</tr>";
}
echo "</table>";
}
else
{
echo "<script>
 alert('startdate year should be smaller than enddate year');
</script>";
}
}
else
{
echo "<script>
alert ('Invalid entry');
</script>";
}
}
?>
</table>
</form>
</body>
</html>

