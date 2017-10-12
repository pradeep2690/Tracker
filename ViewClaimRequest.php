<html>
<head>
<title>View Claim Request</title>
<center><h2>Online Travel Management System</h2></center><hr>
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
<h4 align=center>View Claim Request</h4>
<table>
<tr><td width=150>
<a align=left href="Welcome.php">Welcome Page</a></td><td width=1300><a href="UpdateProfile.php">Update Profile</a></td><td width=170><a href="ChangePassword.php">Change Password</a></td><td><a href="Logout.php">Logout</a></td></tr>
</table>
<hr>
<center>
<form  method=POST>
Request Type<span style=color:red;>*</span><select name=requesttype onchange='submit()' >
<option value=opt>---Select---</option>
<option value=Approved>Approved</option>
<option value=Submitted>Submitted</option>
<option value=Rejected>Rejected</option>
<option value=P>Settled</option>
<option value=Clarification>Clarification</option>
</select>
<?php
session_start();
if(isset($_POST['requesttype']))
{
echo"
<table border=1>
<tr><th>Select</th><th>ClaimID</th><th>RequestID</th><th>Claim Amount</th><th>Status</th>";
$rt=$_POST['requesttype'];
$_SESSION['reqtype']=$rt;
$rtype=substr($rt,0,1);
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}
else
{
if($res=mysqli_query($con,"select ClaimID,RequestID,ClaimAmount,ClaimStatus from 8_CLAIM_DETAILS"))
{
while($data=mysqli_fetch_row($res))
{
if($rtype=='P'){ $rt='Settled'; }
if($rtype==$data[3])
{
echo "<tr><td><input type=radio name =radio  value=$data[0] ></td><td><input name=claimid value=$data[0] readonly></td><td><input name=reqid value=$data[1] readonly ></td><td>$data[2]</td><td>$rt </td></tr>";
}
}
}
}
mysqli_close($con);
echo" </table>
<input type=submit name=sub value=view >";
}
if(isset($_POST['sub']))
{
$radio=$_POST['radio'];
$_SESSION['radio']=$radio;
header("Location:ViewClaimRequest1.php");
}
?>
</form>
</center>
</body>
</html>

