<html>
<title>
OTMS Accommodation Request
</title>
<head>
<script "type=text/javascript">
function noBack()
{
  window.history.forward()

}
noBack();
window.onLoad=noBack;
window.onpageshow=function(evt)
{
 if(evt.persisted) noBack()
}
window.onunload=function()
{
 void(0)
}
</script>
<center>
<h2>Online Travel Management System</h2></head>
</center>
<body bgcolor=pink oncontextmenu="return false">
<form method=POST>
<center>
<hr>
<br>
<h4>View Accommodation Request</h4>
<br>
</center>
<table>
<tr>
<td width=150><a href="Welcome.php">Welcome Page</a></td>
<td width=1300><a href="UpdateProfile.php">Update Profile</a></td>
<td width=170><a href="ChangePassword.php">Change Password</a></td>
<td><a href="Logout.php">Logout</a></td></tr>
</table>
<hr>
<br>
 <table border=1 align=center>
<tr><th>RequestID</th><th>Location</th><th>TripName</th><th>CheckIn Date</th><th>CheckOut Date</th><th>Room Type</th><th>Accommodation Status</th></tr>
<?php
session_start();
$userid=$_SESSION["uid"];

$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
 echo "The server is down,Please try after some time:".mysqli_error();
}
else
{
 $val=mysqli_query($con,"select r.RequestID,r.DCLocation,r.TripName,a.CheckInDate,a.CheckOutDate,a.RoomType,a.RoomBookingStatus from 8_REQUEST_DETAILS r inner join 8_ACCOMMODATION_DETAILS a ON r.RequestID=a.RequestID  inner join 8_EMPLOYEE_DETAILS e ON e.EmployeeID=r.EmployeeID inner join 8_LOGIN_DETAILS l ON e.UserID=l.UserID where l.UserID='$userid'");

while($row=mysqli_fetch_row($val))
{

echo "<tr><td><input value=$row[0] disabled></td><td><input value=$row[1] disabled ></td><td><input value=$row[2] disabled ></td>
<td><input value=$row[3] disabled></td>
<td><input value=$row[4] disabled></td><td><input value=$row[5] disabled></td><td><input value=$row[6] disabled></td></tr>";
}
mysqli_close($con);
}
?>
</table>
</br>
<center><input type=submit name=ok value=OK /></center>
</form>
<body>
</html>
<?php
if(isset($_POST['ok']))
{
 header("location:EmployeeHomePage.php");
}
?>
