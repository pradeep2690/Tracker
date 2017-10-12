<html>
<title>OTMS Login
</title>
<head>
<script "type=text/javascript">
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
<center>
<h2>Welcome To Online Travel Management System</h2>
</center>
<hr>
</head>
<body bgcolor=pink oncontextmenu="return false">
<h3 align=center>User Login</h3>
<p>Online Travel Management System(OTMS) is an automated,integrated travel booking and accomodation management application.You can automatically register yourself to be a user of OTMS by clicking on the New User Registration button.Only registered users are allowed into OTMS.Provide your UserID and Password to Login...
</p>
<form method=POST>
<table align=left border=1>
<tr><td>User ID
<span style=color:red;>*</span> </td><td><input type=text name=id /></td></tr>
<tr><td>Password
<span style=color:red;>*</span></td><td><input type=password name=pwd /></td></tr>
<tr><td align=center colspan=2><input type=submit name=submit value=submit />
<input type=reset name=reset value=Reset /></td></tr>
<tr><td align=center colspan=2><input type=submit name=new value="New User Registration" /></td></tr>
<tr><td align=center colspan=2><input type=submit name=forgot value="Forgot Password" /></td></tr>
</table>
</form>
</body>
</html>
<?php
session_start();
if(isset($_POST['submit']))
{
 $id=$_POST['id'];
 $pwd=$_POST['pwd'];
 $_SESSION["uid"]=$id;
 $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
 if(mysqli_connect_errno($con))
 {
  echo "The server is down,Please try after sometime.".mysqli_error();
 }
 else
 {
  $value=mysqli_query($con,"select UserID,Password,Status,Role FROM 8_LOGIN_DETAILS");
  while($row=mysqli_fetch_row($value))
  {
   if ($id == $row[0]&& $pwd == $row[1] && $row[2] == 'A')
   {
    if($row[3] == 'P')
    {
 header("location:ApproverHomePage.php");
    }
     elseif($row[3] == 'E')
    {
     header("location:EmployeeHomePage.php");
    }
    elseif($row[3] == 'D')
    {
     header("location:adminhomepage.php");
    }
    elseif($row[3] == 'T')
    {
     header("location:TravelAgentHomePage.php");
    }
    else
    {
     echo "UserID and Password is not valid for any user role";
  }
   }
 elseif($id == "" && $pwd == "")
 {
  echo "
<span style=color:red;>Mandatory field cannot be left blank</span>";
  break;
 }
 else
 {
  echo "<span style=color:red;>Invalid Username/Password</span>";

 }

 }
}
}

if(isset($_POST['forgot']))
{
header("location:ForgotPassword.php");
}
if(isset($_POST['new']))
{

header("location:NewUserRegistration.php");
}
?>
