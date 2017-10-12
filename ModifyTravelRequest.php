<html>
<head>
<form method=POST>
<title>Modify Request Page</title>
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
<h2 align = center>Online Travel Management System</h2>
<hr>
<body bgcolor = pink oncontextmenu="return false">
<center>
<h3 align= center><b>Modify Travel Request</b></h3>
<table width = 250 align = left>
<tr><td><a href = "Welcome.php">Welcome Page</a></td><td><a href = "UpdateProfile.php">Update Profile</a></td></tr></table>
<table width = 300 align = right><tr align = right><td><a href = "ChangePassword.php">Change Password</a></td><td><a href = "Logout.php">Logout</a></td></tr></table>
<br><br>
<hr>
<br>
<?php
$con = mysqli_connect("localhost","tr688427","#infy123","osd2");
$result = mysqli_query($con,"SELECT RequestID  FROM 8_REQUEST_DETAILS");
if($result)
{
$RequestID=array();
   while($row = mysqli_fetch_row($result))
        {
         $RequestID[]= $row[0];
        }
}

echo'<table border = 1 align = center>
<tr>
    <td>Employee ID</td><td><input type = text name = empid disabled></td>
</tr>
<tr>
   <td>Request ID</td><td>';
?>
<select name="RequestID" onchange=submit()>
<?php $choose=$_REQUEST['RequestID'];
$result = mysqli_query($con,"SELECT RequestID  FROM 8_REQUEST_DETAILS");
if($result){
while($row = mysqli_fetch_row($result))
 {
?>
<option value=<?php echo $row[0] ?> <?php echo $row[0]==$choose?'selected':'' ?> ><?php echo $row[0] ?></option>
<?php       }
}?>
</select></td></tr>

<?php
if(isset($_POST['RequestID']))
{
$requestid = $_POST['RequestID'];
$result1 = mysqli_query($con,"SELECT TripName,TripType,TravelMode,TravelClass,SourceCity,DestinationCity,FirstLevelApproverID,DcLocation,TravelTime FROM REQUEST_DETAIL_688397 WHERE RequestID  = '$requestid' ");
if($result1)
{
 echo $requestid;
while($row1 = mysqli_fetch_row($result1))
{
echo'<tr>
        <td>TripName</td><td><input type = text name = tripname value = '.$row1[0].'></td>
     </tr>
     <tr>
        <td>Purpose Of Travel</td><td><input type = text name = purposeoftravel value = '.$row1[1].'></td>
     </tr>
   <tr>
        <td>Mode</td><td><input type = text name = mode value = '.$row1[2].'></td>
     </tr>
   <tr>
        <td>Class</td><td><input type = text name = class value = '.$row1[3].'></td>
     </tr>
   <tr>
        <td>From</td><td><input type = text name = from value = '.$row1[4].'></td>
     </tr>
  <tr>
        <td>To</td><td><input type = text name = to value = '.$row1[5].'></td>
     </tr>
   <tr>
        <td>First Level Approver</td><td><input type = text name = firstlevelapprover value = '.$row1[6].'></td>
     </tr>
   <tr>
        <td>Travel Desk</td><td><input type = text name = traveldesk value = '.$row1[7].'></td>
     </tr>
   </table>';
}
}
}
echo' <table align=center>
          <tr>
            <td><input type = submit name = resendtoapprover value = "Resend To Approver" ></td>
            <td><input type = submit name = cancel value = Cancel></td>
           </tr>
    </table>';
if(isset($_POST['resendtoapprover']))
{
echo $requestid;
$from = $_POST['from'];
$to = $_POST['to'];
mysqli_query($con,"UPDATE REQUEST_DETAIL_688397 SET SourceCity = '$from' WHERE RequestID = '$requestid'");
mysqli_query($con,"UPDATE REQUEST_DETAIL_688397 SET DestinationCity = '$to' WHERE RequestID = '$requestid'");
}
mysqli_close($con);
?>




</form>
</html>