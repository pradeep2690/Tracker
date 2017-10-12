<?php
error_reporting(0);
session_start();
$EmployeeID=$_SESSION['employeeid'];
echo'
<html>
<head>
<title>OTMS Cancel Travel Request</title>
<div class="image" style="background-image:url(C:\Desktop\img.jpg); background-repeat:repeat"</div>
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
<center>
<form method=POST>
<body bgcolor=pink oncontextmenu="return false" >
<h2>Online Travel Management System </h2>
<hr color="white" ><br>
<center><b>Cancel Travel Request</b>
<table>
<tr><td width=150>
<a align=left href="Welcome.php">Welcome Page</a></td><td width=1300 ><a align=left href="UpdateProfile.php">Update Profile</a></td><td width=170><a  align=right href="ChangePassword.php">Change Password</a></td><td><a align=right href="Logout.php">Logout</a></td></tr>
</table>
<hr>
<br>
<body>
<center>
<table>
<tr><td>Request Type: </td>
<td><select name="Request">
<option value="A" >Approved</option>
<option value="S" >Submitted</option>
</select></td><td><input type=submit value="view" ></td></tr>
</table>
<table border=1 width="50%">
<tr><th>Select</th><th>RequestID</th><th>From</th><th>To</th><th>DateOfJourney</th></tr>';
if(isset($_POST['Request'])){
$type=$_POST['Request'];
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($output=mysqli_query($con,"select RequestID,SourceSecurity,DestinationCity,TravelDate from 8_REQUEST_DETAILS where  RequestStatus='$type'")){
while($row=mysqli_fetch_row($output)){
echo'
<tr><td><input type=radio name=select value='.$row[0].'></td><td>
<input type=text name=req value='.$row[0].' disabled></td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td></tr>';
}
}
}
echo'
</table>
<br><br>
<input type=submit name=submit value="Cancel Request" />
</form>';
if(isset($_POST['submit'])){
if(isset($_POST['select'])){
$Ask=$_POST['select'];
echo "$Ask";
if(mysqli_query($con,"update 8_REQUEST_DETAILS set RequestStatus='C' where RequestID='$Ask'")){
echo "Your request is cancelled sucessfully\n";
header("Location:Home.php");
}
else{
echo "Invalid Request.Please try again\n";
}
mysqli_close($con);
}
}
echo'
</center>
</body>
</head>
</html>';
?>
