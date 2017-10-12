</html>
<title>Feedback

</title>
<head>
<center>
<h2>Online Travel Management System
<script type="text/javascript">
function noBack()
{
  window.history.forward()

}
noBack();
window.onLoad=noBack;
window.onpageshow=function(evt)
{
 if(evt.persisted) noBack()
}
window.onunload=function()
{
 void(0)
}
</script>
</h2></head>
<hr>
</center>
<body bgcolor=pink oncontextmenu="return false">
<form method=POST>
<center>
<h4>Travel Feedback</h4>
<br>
</center>
<table>
<tr><td width=150><a href="Welcome.php">Welcome Page</a></td>
<td width=1300><a href="UpdateProfile.php">Update Profile</a></td>

<td width=170><a href="ChangePassword.php">Change Password</a></td>
<td><a href="Logout.php">Logout</a></br></td>
</tr>
</table>
<hr>
</br>
<table border=1 align=center>
<tr>
<td>Select RequestID<span style=color:red;>*</span> </td>
<?php
session_start();
$id=$_SESSION["uid"];
$flag=0;
echo "<td ><select name=rid onChange='submit()'>";
#echo '<option value="selected">--select--</option>';
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");

$val=mysqli_query($con,"select RequestID from 8_REQUEST_DETAILS r inner join 8_EMPLOYEE_DETAILS e ON r.EmployeeID=e.EmployeeID inner join 8_LOGIN_DETAILS l ON l.UserID=e.UserID where l.UserID='$id'");
while($res=mysqli_fetch_row($val))
{
  echo "<option value=$res[0]>$res[0]</option>";
}
echo "</select></td></tr>";

echo "<tr><td>Trip Name</td>";
if(isset($_POST['rid']))
{
$selected=$_POST['rid'];
#$_SESSION['select']=$selected;
$con2=mysqli_connect("localhost","tr688427","#infy123","osd2");
$val2=mysqli_query($con2,"select TripName from 8_REQUEST_DETAILS where RequestID='$selected'");
while($res2=mysqli_fetch_row($val2))
{
$trip=$res2[0];
$_SESSION['trip']=$trip;
 echo
"<td disabled>
<input type=text name=trip value=$res2[0] />
</td>
</tr>";


}
}
echo
             "<tr>
<td>Rate the Travel Services<span style=color:red;>*</span> </td>
<td>
<input type=radio name=trate value=Good />Good
<input type=radio name=trate value=Satisfactory />Satisfactory
<input type=radio name=trate value=Poor />Poor
</td>
</tr>
<tr>
<td>Travel Feedback<span style=color:red;>*</span> </td>
<td><textarea name=tfeed></textarea></td>
</tr>
<tr>
<td>Rate the Accommodation Services<span style=color:red;>*</span> </td>
<td>
<input type=radio name=arate value=Good />Good
<input type=radio name=arate value=Satisfactory />Satisfactory
<input type=radio name=arate value=Poor />Poor
</td>
</tr>
<tr><td>Accommodation Feedback<span style=color:red;>*</span> </td><td><textarea name=afeed></textarea></td></tr>
</table>

</br>
<center><input type=submit name=ok value=OK />
<input type=reset name=cancel value=Cancel />
</center>
</form>
<body>
</html>";
if(isset($_POST['ok']))
{

  if(isset($_POST['rid']))
  {
    $selected=$_POST['rid'];

 # }
 $tfeed=$_POST['tfeed'];
 $afeed=$_POST['afeed'];
 #$select=$_SESSION['select'];
 $trip1=$_SESSION['trip'];

  if($tfeed != "" && $afeed != "")
  {

   if(isset($_POST['trate']))
   {
    $trate=$_POST['trate'];
    if(isset($_POST['arate']))
    {
      $arate=$_POST['arate'];

      $val2=mysqli_query($con,"INSERT INTO 8_FEEDBACK_DETAILS values('$selected','$trip1','$trate','$tfeed','$arate','$afeed')");
     echo "<script>alert('Data inserted successfully')</script>";
     echo "<script>document.location='EmployeeHomePage.php')";


   }
  }
 }

else
 {
   echo "<script>alert('Please,Rate and Provide feedback ')</script>";
 }

}
else echo "<span style=color:red;>Mandatory fields cannot be left blank</span>";
}

?>


