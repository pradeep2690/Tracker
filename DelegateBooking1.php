<html>
<head><title>OTMS Delegate Booking</title>
<form method=POST>
<h1 align=center>Online Travel Management System<h1>
<hr>
<h3 align=center>Delegate Booking</h3>
<table align=left><tr>
<td><a href="Welcome.php">Welcome Page</a></td>
<td><a href="UpdateProfile.php">Update Profile</a></td></tr>
</table>
<table align=right>
<tr>
<td>
<a href="ChangePassword.php">Change Password</a></td>
<td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<hr>
<br>
<body bgcolor=pink oncontextmenu="return false" >
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
<script>
var delegate=confirm("Do you want to Set Delegate Access to any Agent");
if (delegate==true)
{
window.location="DelegateBooking.php";
    }
else {
window.location="TravelAgentHomePage.php";
    }

</script>
</body>
</form>
</head>
</html>
