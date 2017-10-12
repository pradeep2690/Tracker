<html>
<head>
<title>OTMS Approve/Reject Travel Request</title>

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
<h3>Approve/Reject Travel Request </h3>
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
<th>Select</th><th>RequestID</th><th>TripName</th><th>TravelDate</th><th>ApproverRemarks</th>
<?php
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$index=0;
if($result=mysqli_query($con,"select  RequestID,TripName,TravelDate  from 8_REQUEST_DETAILS "))
{

$count=0;
while ($row=mysqli_fetch_row($result))
{
echo "<tr>
<td><input type=radio value=$count name=select  /></td>
<td><input type=text name=req$count value=$row[0]  /></td>
<td>$row[1]</td><td>$row[2]</td>
<td><textarea name=remarks$count ></textarea></td></tr>";

$count++;
}
$flag=0;
$count=0;
}
mysqli_close($con);
?>
</table>
<center><input type=submit name=approve value=ApproveTravel>&nbsp;&nbsp;&nbsp;<input type=submit name=reject value=RejectTravel>&nbsp;&nbsp;&nbsp;<input type=submit name=cancel value=Cancel></center>
</form>
</body>
</html>

<?php

if(isset($_POST['approve']))
{

$radio=$_POST['select'];

$remarks=$_POST["remarks$radio"];
$requestid=$_POST["req$radio"];
$len=strlen($remarks);
echo "The length of the entered remarks are" ."$len";

if($len>=10)
{
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
mysqli_query($con,"update 8_REQUEST_DETAILS set Remarks= '$remarks', RequestStatus= 'A' where RequestID='$requestid'");

}}
if(isset($_POST['reject']))
{
$radio=$_POST['select'];
$flag1=0;
$remarks=$_POST["remarks$radio"];
$requestid=$_POST["req$radio"];
$len=strlen($remarks);
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");

$stmt=mysqli_query($con,"update 8_REQUEST_DETAILS set  Remarks= '$remarks', RequestStatus='R' where RequestID='$requestid'");

}
if(isset($_POST['cancel'])){
echo '<script>document.location="http://10.123.79.61/~tr688427/project/ApproverHomePage.php"</script>';
}

?>

