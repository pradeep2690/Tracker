<html>
<title>OTMS Forgot Password</title>
<center>
<head><h2>Online Travel Management System</h2>
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
<hr>
<center>
<br>

<h3>Forgot Password</h3>
<table align=left>
<tr><td><a href="Welcome.php">Welcome Page</a></td>
</tr>
</table>
<br>
<br>
<hr></hr>
<head><h3> Answer the Security Questions</h3></head>

<body bgcolor=pink oncontextmenu="return false">
 <form method=post >
<table align= center border=1 >
<?php
session_start();
$us=$_SESSION["uid"];
$id=$us;
#echo $id;
#echo "$us";
echo "<tr><td>UserId</td><td text color=white><input type=text name=user value='$us' disabled ></td></tr>";
?>
<tr><td>Security Questions</td>
  <td>
  <select name=select>
 <option value="#" DISABLED >Enter your DOB in DD- MM- YYYY</option>
  <option value="1">Enter your contact no?</option>
  <option value="2">Enter your DOB?</option>
  </select></td></tr>
<tr><td>Answer</td><td><input type=text name=Answer></td></tr>
</table>
<tr><td align =center colspan=3><input type=submit name=submit value=submit></td></tr>
<tr><td align =center colspan=3><input type=submit name=cancel value=cancel></td></tr>
</form>
</center>
</body>
</html>
<?php
if(isset($_POST['cancel']))

{
header("Location:Login.php");
}
if(isset($_POST['submit']))
{
  $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
#$id=$us;
$sq=$_POST['select'];
$ans=$_POST['Answer'];
error_reporting(0);
if($_POST['select']== "1")
{
if((preg_match("/^[0-9]{10}$/",$ans)))
{
$value=mysqli_query($con,"select Phone from  8_EMPLOYEE_DETAILS where UserID='$id';");
while($row1=mysqli_fetch_row($value))
{
#echo "inside";
if($row1[0]==$ans)
{
header("Location:ChangePassword.php");
}
else
{
 echo "This type of phone number not match with you";
}
}
}
else
{
echo "Invalid contact no";
}
}
elseif($_POST['select']== "2")
{
$mm=explode('-',$ans);
$month=$mm[1];
$month1=array('jan'=>01,'feb'=>02,'mar'=>03,'apr'=>04,'may'=>05,'jun'=>06,'jul'=>07,'aug'=>08,'sep'=>09,'oct'=>10,'nov'=>11,'dec'=>12);

$newdob=$mm[2]."-".$month1[$month]."-".$mm[0];
#echo "$newdob";
$res=mysqli_prepare($con,"select DOB from 8_EMPLOYEE_DETAILS  where UserID=?");
mysqli_stmt_bind_param($res,"s",$id);
mysqli_stmt_execute($res);
mysqli_stmt_bind_result($res,$dat);
while(mysqli_stmt_fetch($res))
{

$date1=explode('-',$dat);
$date2=$date1[0].$date1[1].$date1[2];
if($date1[0]==$mm[2] && $date1[1]==$month1[$month] && $date1[2]==$mm[0])
{
$pass=$_SESSION['Password'];
header("Location:ChangePassword.php");
}
else
{
 echo "Invalid DOB";
}
}
mysqli_close($con);
}
}

?>
