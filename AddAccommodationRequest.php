<html>
<head>
<title>Add Accommodation</title>
<center><h2>Online Travel Management System </h2></center><hr>
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
<body bgcolor=pink oncontextmenu="return false">
<center>
<h4>Add Accommodation Request</h4></center>
<table>
<tr><td width=150>
<a align=left href="Welcome.php">Welcome Page</a></td><td width=1300 ><a align=left href="UpdateProfile.php">Update Profile</a></td><td width=170><a  align=right href="ChangePassword.php">Change Password</a></td><td><a align=right href="Logout.php">Logout</a></td></tr>
</table>
<hr>
<center>
<form method=POST>
<table border=1>
<?php
session_start();
$rid=$_SESSION['rid'];
$loc=$_SESSION['loc'];
$traveldate=$_SESSION['traveldate'];
echo"
<tr><td>RequestID</td><td><input type=text name=rid value=$rid readonly></td></tr>
<tr><td>Location</td><td><input type=text name=loc value=$loc></td></tr>
<tr><td>CheckIn Date<span style=color:red;>*</span></td><td><select name=day required >";
for($i=1;$i<=31;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
<select name=mon >
<option value=01>Jan</option>
<option value=02>Feb</option>
<option value=03>Mar</option>
<option value=04>Apr</option>
<option value=05>May</option>
<option value=06>Jun</option>
<option value=07>Jul</option>
<option value=08>Aug</option>
<option value=09>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
<select name=year >
<?php
for($i=1900;$i<=2020;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
</td>
<tr>
<tr><td>CheckOut Date<span style=color:red;>*</span></td><td><select name=day1 >
<?php
for($i=1;$i<=31;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
<select name=mon1>
<option value=01>Jan</option>
<option value=02>Feb</option>
<option value=03>Mar</option>
<option value=04>Apr</option>
<option value=05>May</option>
<option value=06>Jun</option>
<option value=07>Jul</option>
<option value=08>Aug</option>
<option value=09>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
<select name=year1>
<?php
for($i=1990;$i<=2020;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
</td>
</tr>
<tr><td>Room Type<span style=color:red;>*</span></td>
<td><select name=roomtype>
<option value=S>Single</option>
<option value=D>Shared</option>
<option value=G>Guest House</option>
</td></tr>
</table>
<br>
<input type=submit name=submit value=Submit>&nbsp;<input type=Submit name=reset value=Cancel>
<form>
</center>
</body>
</html>
<?php
date_default_timezone_set("Asia/Calcutta");
if(isset($_POST['submit']))
{
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}
else
{
$rid=$_POST['rid'];
$roomtype=$_POST['roomtype'];
$day=$_POST['day'];
$mon=$_POST['mon'];
$year=$_POST['year'];
$checkindate=$year.'-'.$mon.'-'.$day;
$day1=$_POST['day1'];
$mon1=$_POST['mon1'];
$year1=$_POST['year1'];
$checkoutdate=$year1.'-'.$mon1.'-'.$day1;
if( (strtotime($checkindate)> strtotime(date('Y-m-d') )) && (strtotime($checkindate) > strtotime($traveldate)))
{
if( strtotime($checkoutdate) > strtotime($checkindate) )
{
#$con=mysqli_connect("localhost","tr688398","#infy123","osd2");
$BookingID="AB1001";

$res=mysqli_query($con,"select * from 8_ACCOMMODATION_DETAILS");
while($data=mysqli_fetch_row($res))
{
$BookingID=++$data[0];
}
mysqli_query($con,"insert into 8_ACCOMMODATION_DETAILS values('$BookingID','$rid','$checkindate','$checkoutdate','$roomtype','S','')");
echo "<script>document.location='EmployeeHomePage.php'</script>";
}
else
{
echo "<script>alert('Checkouttime should be greaterthan Checkintime')</script>";
}
}
else
{
echo "<script>alert('checkintime should be greaterthan currenttime and Traveltime')</script>";
}
}
mysqli_close($con);
}
if(isset($_POST['reset']))
{
echo "<script>document.location='EmployeeHomePage.php'</script>";
}
?>
