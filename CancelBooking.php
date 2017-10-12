<html>
<head><title>OTMS Cancel Booking</title>
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
<form method=POST>
<h1 align=center>Online Travel Management System<h1>
<hr>
<h3 align=center>Cancel Booking<h3>
<table align=left>
<tr><td><a href="Welcome.php"><u>WelcomePage</u></a></td>
<td></td><td><a href="UpdateProfile.php"><u>UpdateProfile</u></a></td></tr>
</table>
<table align=right>
<tr><td><a href="ChangePassword.php"><u>ChangePassword</u></a></td>
<td></td><td><a href="Logout.php"></u>Logout</u></a></td>
</table>
<br>
<br>
<hr>
<br>
<body bgcolor=pink oncontextmenu="return false">
<center>
<table align=center border=1 >
<tr>
<th>Select</th>
<th>BookingID</th>
<th>RequestID</th>
<th>TicketDetails</th>
<th>BookingStatus</th>
<th>EmployeeRemarks</th>
<?php

$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$result=mysqli_query($con,"(select t.BookingID,t.RequestID,t.TicketDetails,t.BookingStatus,c.EmployeeRemarks from 8_TRAVEL_BOOKING t
inner join 8_CLAIM_DETAILS c on t.RequestID=c.RequestID where t.BookingStatus='B')");
while($row=mysqli_fetch_array($result))
{
echo "<tr><td><input type=radio name=BookingID value=$row[0] ></td>
<td><input type=text name=bookid value=$row[0] disabled=true ></td>
<td><input type=text value=$row[1] disabled=true ></td>
<td>$row[2]</td>
<td>$row[3]</td>
<td><textarea disabled=true>$row[4]</textarea></td>
</tr>";
}


if(isset($_POST['cancel']))
{
if(isset($_POST['BookingID']))
{
$bookid=$_POST['BookingID'];
$stmt=mysqli_prepare($con,"update 8_TRAVEL_BOOKING set BookingStatus='C' where BookingID=?");
mysqli_stmt_bind_param($stmt,"s",$bookid);
mysqli_stmt_execute($stmt);

mysqli_close($con);
}}
if(isset($_POST['submit']))
{
header ("Location:agenthome.php");
}
?>
</table>
<tr><input type=submit name=cancel value="Cancel Booking" > &nbsp;&nbsp;<input type=submit name=submit value=OK ></tr>
</center>
</body>
</form>
</head>
</html>
