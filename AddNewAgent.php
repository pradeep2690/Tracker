<?php
$adminID=1000;


echo

"<html>
<body bgcolor=pink oncontextmenu='return false' >
</body>
<title> Add New Agent </title>
<head><h2 align=center>Online Travel Management system
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
<h3>Add New Agent</h3>
<table align=left><tr>

<td><a href='Welcome.php'>Welcome Page</a></td>
<td><a href='UpdateProfile.php'>Update Profile</a></td>
</table>


<table align=right><tr>
<td><a href='ChangePassword.php'>Change Password</a></td>
<td><a href='Logout.php'>Logout</a></td>
</tr></table>
<br>


<hr>
<form method=POST>
<table align=center border=1>
";

$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
 if ( $stmt = mysqli_query($con," select AgentID from 8_AGENT_DETAILS "))
 {
 while( $row = mysqli_fetch_row($stmt) )
 {
 $temp=$row[0];
 }
 $agentID=++$temp;
 }
 else
 {
 $agentID='AG1001';
 }
 $userID='U'.$agentID;
 echo "<html>
 <body>
  <form method=POST>

 <table border=1 align=center>
  <tr><th>AgentID</th><td><input type value=$agentID disabled></td></tr>
  <tr><th>Agent Name<sup style='color:red;'>*</sup></th><td><input type name=name ></td></tr>
  <tr><th>UserID</th><td><input type=text value=$userID disabled ></td></tr>
  <tr><th>Address<sup style='color:red;'>*</sup></th><td><textarea  name=address  ></textarea></td></tr>
  <tr><th>PhoneNo<sup style='color:red;'>*</sup></th><td><input type=text name=phone ></textarea></td></tr>
  <tr><th>Remarks</th><td><textarea  name=remarks  ></textarea></td></tr>
  <tr><th>Type Of Service<sup style='color:red;'>*</sup></th><td><textarea rows=4 cols=15 name=tos  ></textarea></td></tr>
 <tr><td align=center colspan=3 ><input type=submit name=submit value=submit /></td></tr>
 </table>
 </form>
 </body>
 </html>";
 echo "</html>";

if(isset($_POST['submit']))


 {
 $password=$agentID.'#'.$_POST['name'];
 $name=$_POST['name'];
 $address=$_POST['address'];
 $phone=$_POST['phone'];
 $tos=$_POST['tos'];
 $remarks=$_POST['remarks'];

if ( mysqli_query($con, "insert into 8_LOGIN_DETAILS values('$userID','$password','T','null','A','null')"))
 {
 if ( mysqli_query($con, "insert into 8_AGENT_DETAILS values('$agentID','$name','A','$userID','$address','$phone','$adminID','$tos','$remarks')"))



{
echo "<script> alert('New agent added successfully')</script> ";
 }
 }
 }
 ?>
