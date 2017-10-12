<html>
<head><title>OTMS Delegate Booking</title>
<form method=POST>
<h1 align=center>Online Travel Management System<h1>
<hr>
<h3 align=center>Delegate Booking</h3>
<table align=left><tr>
<td><a href="Welcome.php">Welcome Page</a></td>
<td></td>
<td><a href="UpdateProfile.php">Update Profile</a></td></tr>
</table>
<table align=right>
<tr>
<td>
<a href="ChangePassword.php">Change Password</a></td>
<td></td>
<td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<hr>
<br>
<body bgcolor=pink oncontextmenu="return false">
<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
window.onpageshow = function(evt) {
if (evt.persisted) noBack() }
window.onunload = function() { void (0) }
</script>
</body>
</form>
</head>
</html>
<?php
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$stmt="select AgentID,AgentName,Address,TypeOfService,PhoneNo,AgentStatus,Remarks from 8_AGENT_DETAILS where AgentStatus='A'";
if($result=mysqli_query($con,$stmt))
{
echo"

<form method=post>
<table border=1>
<tr><td>Select</td><td>Agent ID</td><td>Agent Name</td><td>Address</td><td>Type of Service</td>
<td>Telephone no</td><td>Status</td><td>Remarks to Accomodate request </td></tr>";
while($row=mysqli_fetch_row($result))
{
echo"
<tr>
<td><input type=radio value=$row[0] name=option></td>
<td><input type=text value=$row[0] disabled=true></td>
<td><input type=text value=$row[1] disabled=true></td>
<td><input type=text value=$row[2] disabled=true></td>
<td><input type=text value=$row[3] disabled=true></td>
<td><input type=text value=$row[4] disabled=true></td>
<td><input type=text value=$row[5] disabled=true ></td>
<td><textarea rows=3 cols=15 value=$row[6] ></textarea></td>
</tr>
";
}
echo"</table>";
echo"
<table align=center>
<tr><td><input type=submit name=change value=DelegateBooking></td>
<td><input type=submit name=submit value=OK></td></tr>
</table>
</form>";
mysqli_free_result($result);
}
if(isset($_POST['change']))
{
if(isset($_POST['option']))
{
$agentid=$_POST['option'];
$stmt=mysqli_prepare($con,"update 8_REQUEST_DETAILS set AgentID=?");
mysqli_stmt_bind_param($stmt,"s",$agentid);
mysqli_stmt_execute($stmt);
}
}
mysqli_close($con);

if(isset($_POST['submit']))
{
Header("Location:TravelAgentHomePage.php");
}
?>

