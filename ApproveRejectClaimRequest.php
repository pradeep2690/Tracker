<html>
<head>
<title>OTMS Approve/Reject Claim Request</title>
<center><h2>Online Travel Management System</h2></center>
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
<center>
<hr>
<h3>Approve/Reject Claim Request </h3>
<table align=left>
<tr><td><a href="Welcome.php" >Welcome Page</a></td>
<td></td>
<td><a href="UpdateProfile.php">Update Profile</a></td></tr>
</table>
<table align=right>
<tr><td><a href="ChangePassword.php">Change Password</a></td>
<td></td>
<td><a href="Logout.php">Logout</a></td></tr>
</table>


<br>
<br>
<hr>

<body bgcolor=pink oncontextmenu="return false" >
<form  method=POST>
<table align=center  border=2>
<th>Select</th><th>RequestID</th><th>ClaimID</th><th>AdminID</th><th>CheckOutDate</th><th>RoomType</th><th>Approver Remarks</th>
<tr>
<?php
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select rd.RequestID,cd.ClaimID,cd.AdminId,ad.CheckOutDate,ad.RoomType from 8_REQUEST_DETAILS rd  join 8_ACCOMMODATION_DETAILS ad on rd.RequestID=ad.RequestID join 8_CLAIM_DETAILS cd on cd.RequestId=ad.RequestID" ))
{
$count=0;
while ($row=mysqli_fetch_row($result))
{
echo "<td><input type=radio name=select value=$count /></td><td><input type=text name=req$count value=$row[0] /></td><td><input name=claim$count value=$row[1] /></td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><textarea name=remarks$count ></textarea></td></tr>";
$count++;
}
$flag=0;
$count=0;
}
mysqli_close($con);
echo
"</table>

<center><input type=submit name=approve value=ApproveClaim >&nbsp;&nbsp;&nbsp;<input type=submit name=reject value=RejectClaim >&nbsp;&nbsp;&nbsp;<input type=submit name=cancel value=Cancel ></center>
</form>
</body>
</html>";

if(isset($_POST['approve']))
{

$radio=$_POST['select'];
$flag1=0;
$remarks=$_POST["remarks$radio"];
$claimid=$_POST["claim$radio"];
$len=strlen($remarks);

if($len>=10)
{
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");


mysqli_query($con,"update  8_CLAIM_DETAILS  set Remarks= '$remarks',ClaimStatus='A'  where ClaimID='$claimid'");
}
}

if(isset($_POST['reject']))
{
$radio=$_POST['select'];
$flag1=0;
$remarks=$_POST["remarks$radio"];
$claimid=$_POST["claim$radio"];
$len=strlen($remarks);
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");

$stmt=mysqli_query($con,"update  8_CLAIM_DETAILS  set  Remarks= '$remarks',ClaimStatus='R' where ClaimID='$claimid'");

}
if(isset($_POST['cancel'])){
echo '<script>document.location="http://10.123.79.61/~tr688427/project/ApproverHomePage.php"</script>';
}

?>


