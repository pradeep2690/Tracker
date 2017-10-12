<?php
echo
" <html>
<body bgcolor=pink oncontextmenu='return false' >
</body>
<title> Block Unblock Agent </title>
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
<h3>Block UnBlock Agent</h3>
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

<tr>
<th>select</th>
<th>Agent ID</th>
<th>Agent Name</th>
<th>Address</th>
<th>Type Of Service</th>
<th>Telephone No</th>
<th>Status</th>
<th>Remarks to Block/Unblock</th>
<th>Click To Confirm</th>

</tr>
";

 $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
 $stmt=mysqli_query($con,"select *  from 8_AGENT_DETAILS");

  $i=0;
 while($row=mysqli_fetch_row($stmt))
  {
 if($row[2]=='A')
 {
 echo "
<tr>
<td><input type=radio name=select value=$i></td>
<td><input type=text name=counter$i value=$row[0] readonly ></td>
<td><input type=text name=agentname value=$row[1] disabled></td>
<td><textarea type=text name=address  disabled>$row[4]</textarea></td>
<td><input type=text name=typeofservice value=$row[7] disabled></td>
<td><input type=text name=phoneno value=$row[5] disabled></td>
<td><input type=text name=status value=$row[2] readonly  ></td>
<td><textarea type=text name=remarks$i ></textarea></td>
<td><input type=submit value='Block Agent' name=block>
</td>
</tr>";
 $i++;
 }
 else
 {
 echo "
<tr>
<td><input type=radio name=select value=$i></td>
<td><input type=text name=counter$i value=$row[0] readonly></td>
<td><input type=text name=agentname value=$row[1] disabled></td>
<td><textarea type=text name=address  disabled>$row[4]</textarea></td>
<td><input type=text name=typeofservice value=$row[7] disabled></td>
<td><input type=text name=phoneno value=$row[5] disabled ></td>
<td><input type=text name=status value=$row[2] readonly ></td>
<td><textarea type=text name=remarks$i ></textarea></td>
<td><input type=submit value='UnBlock Agent' name=unblock>
</td>
</tr>";
 $i++;
 }
 }
 echo "
</table>
<br>
<center>
<tr>
<td><input type=submit name=submit value=ok >
</td>
</tr>
</center>
</form>
</html>";
 if(isset($_POST['unblock']))
  {
if(isset($_POST['select'])){
 $var1=$_POST['select'];
 $var2=$_POST["counter$var1"];
 $remarks=$_POST["remarks$var1"];
mysqli_query($con,"update 8_AGENT_DETAILS set AgentStatus='A'  where AgentID='$var2'");
mysqli_query($con,"update 8_AGENT_DETAILS set  Remarks='$remarks' where AgentID='$var2'");
echo "<script>document.location.href='BlockUnblock.php'</script>";
}
 }
elseif(isset($_POST['block']))
 {

if(isset($_POST['select'])){
 $var1=$_POST['select'];
 $var2=$_POST["counter$var1"];
 $remarks=$_POST["remarks$var1"];
mysqli_query($con,"update 8_AGENT_DETAILS set AgentStatus='I'  where AgentID='$var2'");
mysqli_query($con,"update 8_AGENT_DETAILS set  Remarks='$remarks' where AgentID='$var2'");
echo "<script>document.location.href='BlockUnblock.php'</script>";
 mysqli_close($con);
}
 }
 if(isset($_POST['submit']))
 {
echo "<script>document.location.href='EmployeeHomePage.php'</script>";
#header("Location:block.php");

 }

?>


