<?php
session_start();
echo "
<html>
<body bgcolor=pink oncontextmenu='return false'>
</body>
<title> OTMS ClaimsClarification </title>
<head><h2 align=center>Online Travel Management system</h2>
<script type='text/javascript'>
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
<hr>
<center>
<h3>Claims Clarification</h3>

<table align=left>
<tr><td>
<a href='Welcome.php'>Welcome Page</a></td>
<td><a href='UpdateProfile.php'>Update Profile</a></td></tr>
</table>


<table align=right>
<tr><td>
<a href='ChangePassword.php'>Change Password</a></td>
<td><a href='Logout.php'>Logout</a></td>
</tr></table>
<br><br>
<hr>
<form method=POST>
<table align=center border=1>";

$con=mysqli_connect('localhost','tr688427','#infy123','osd2');
if($result=mysqli_query($con,"select *  from 8_CLAIM_DETAILS where ClaimStatus!='Q'"))
{
echo'<table border=1 align=center>';

echo "
<tr>
<th>Select</th>
<th>ClaimID</th>
<th>RequestID</th>
<th>ClaimAmount</th>
<th>Admin Remarks</th>
</tr>";

$count=0;
while($row=mysqli_fetch_row($result)){

echo "
<tr><td><input type=radio name='radio' value=$count></td>
<td><input type=text name=claimid$count value=$row[0] readonly ></td>
<td><input type=text name=requireID$count value=$row[1] readonly></td>
<td>$row[2]</td>
<td><textarea rows=3 cols=15 name=textarea$count ></textarea></td></tr>";
$count++;
}
}


echo"</table><center>";
echo"<br>";
echo"<tr><td><input type=submit name=submit value='Send for Claim Clarification'></td>
<td><input type=submit name=cancel value=cancel></td></tr></center>";

if(isset($_POST["radio"]))
{
$radio=$_POST["radio"];
if(isset($_POST["submit"])){
$AdminRemarks=$_POST["textarea$radio"];
$claimid=$_POST["claimid$radio"];
$reqid=$_POST["requireID$radio"];
if($AdminRemarks=="" || (strlen($AdminRemarks))<=10){
echo "<script>
alert('The Admin Remarks are Mandatory and should have minimum 10 characters')
</script>";
}
else if($AdminRemarks!="" || (strlen($AdminRemarks))>10){

mysqli_query($con,"update 8_CLAIM_DETAILS set ClaimStatus='Q' where ClaimID='$claimid'");

mysqli_query($con,"update 8_CLAIM_DETAILS set Remarks='$AdminRemarks' where ClaimID='$claimid'");

}
}
}

mysqli_close($con);

if(isset($_POST['cancel']))
{
header("Location:AdminHomePage.php");
}

?>
