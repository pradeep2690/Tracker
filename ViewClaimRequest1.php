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
<form method=POST>
<center>
Request Type<select name=requesttype>
<option value=Approved>Approved</option>
<option value=Submitted>Submitted</option>
<option value=Rejected>Rejected</option>
<option value=Settled>Settled</option>
<option value=Clarification>Clarification</option>
</select>
<?php
session_start();
$radio=$_SESSION['radio'];
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}
else
{
$res=mysqli_query($con,"select ClaimID,RequestID,ClaimAmount from 8_CLAIM_DETAILS where ClaimID='$radio'");
while($data=mysqli_fetch_row($res))
{
echo "<table border=1>
<tr><th>Select</th><th>ClaimID</th><th>RequestID</th><th>Claim Amount</th><tr>
<tr><td><input type=radio value='$data[0]' checked ></td>
<td><input name=claimid value='$data[0]' readonly ></td>
<td><input name=reqid value='$data[1]' readonly ></td>
<td>$data[2]</td>";
}

echo "</table>";
$res1=mysqli_query($con,"select r.EmployeeID,c.ClaimID,c.RequestID,c.ClaimAmount,c.SettledAmount,c.EmployeeRemarks,c.Remarks,c.ClaimStatus,c.AdminID from 8_REQUEST_DETAILS r JOIN 8_CLAIM_DETAILS c on r.RequestID=c.RequestID where c.ClaimID='$radio'");
While($data1=mysqli_fetch_row($res1))
{
if($data1[7]=='A')
{
$data1[7]='Approved';
}
elseif($data1[7]=='S')
{ $data1[7]='Submitted';}
elseif($data1[7]=='P')
{ $data1[7]='Settled'; }
elseif($data1[7]=='R')
{ $data1[7]='Rejected'; }
elseif($data1[7]=='C')
{ $data1[7]='Clarification'; }
echo"
<table border=1>
<tr><td>EmployeeID</td><td><input name=eid value='$data1[0]'></td></tr>
<tr><td>ClaimID</td><td><input name=cid value='$data1[1]'></td></tr>
<tr><td>RequestID</td><td><input name=rid value='$data1[2]'></td></tr>
<tr><td>Claim Amount</td><td><input name=ca value='$data1[3]'></td></tr>
<tr><td>Settled Amount</td><td><input name=sa value='$data1[4]'></td></tr>
<tr><td>Employee Remarks</td><td><textarea name=employeeremarks value='$data1[5]'>$data1[5]</textarea></td></tr>
<tr><td>Admin Remarks</td><td><textarea name=adminremarks value='$data1[6]'>$data1[6]</textarea></td></tr>
<tr><td>Claim Status</td><td><input name=claimstatus value=$data1[7]></td></tr>
<tr><td>AdminID</td><td><input name=adminid value='$data1[8]'></td></tr>";
}
}
mysqli_close($con);
?>
</table>
<input type=submit name=ok value=ok>
</center>
</form>
</body>
</html>

<?php
if(isset($_POST['ok']))
{
echo "<script>alert('Data inserted Successfully')</script>";
echo "<script>document.location='EmployeeHomePage.php'</script>";
}
?>
