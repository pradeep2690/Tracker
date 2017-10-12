<html>
<head><center><h2>Online Travel Management System</h2></center></head>
<body bgcolor=pink oncontextmenu="return false" >
<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
window.onpageshow = function(evt) {
if (evt.persisted) noBack() }
window.onunload = function() { void (0) }
</script>

<center>
<hr>
<h3> Change Password</h3>
<table align=left>
<tr><td><a href="Welcome.php" >Welcome Page</a></td><tr>
</table>
<table align=right>
<tr><td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<br>
<hr>


<?php
session_start();

$userid=$_SESSION['uid'];
echo"
<body bgcolor=pink>
<form method=POST>
<table align=center  border=4>
<tr>
<td >Username</td><td><input type=text name=uname value='$userid' disabled ></input></td><tr>
<tr>
<td>Password <span style=color:red;>*</span></td><td><input type=password  name=pwd ></input></td></tr>
<tr>
<td>New Password <span style=color:red;>*</span></td><td><input type=password name=npwd ></input></td></tr>
<tr>
<td>Verify Password <span style=color:red;>*</span></td><td><input type=password name=vpwd ></input></td></tr>
<tr>
</table>
<center><input type=submit name=submit value=ChangePassword></input>&nbsp;&nbsp;<input type=submit name=can value=Cancel></input></center>
</body>
</center>
</html>";
if(isset($_POST['submit'])){
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");

$cpass=$_POST['pwd'];
$npass=$_POST['npwd'];
$vpass=$_POST['vpwd'];
$found=0;
if($cpass=="")
{
echo "<script>
alert ('Enter Password!');
</script> ";
}
else
{
$result=mysqli_query($con, "select UserID,Password,role from 8_LOGIN_DETAILS where UserID='$userid'");

while($row=mysqli_fetch_row($result))
{
$role=$row[2];
if($userid==$row[0] && $cpass==$row[1])
{
if($npass=="" && $vpass=="")
{
echo "<script>
alert ('Enter new password')
</script>";
}
else
{
if($npass!=$vpass)
{
echo "<script>
alert ('password doesnt match!')
</script>";
}
else
{
if(preg_match("/^[a-zA-Z0-9]+$/",$npass))
{
if(strlen($npass)>=6)
{
$found=1;
}
else
{
echo "<script>
alert ('The pattern should be minimum 6')
</script>";
}
}
else
{
echo "<script>
alert ('The pattern should be alphanumeric')
</script>";
}
}
}
}
else
{
echo "<script>
alert ('Enter valid password')
</script>";
}
}
}
if($found==1)
{
mysqli_query($con, "update 8_LOGIN_DETAILS set Password = '$npass' where UserID = '$userid'");
if($role=='E'){
echo "<script>alert ('Update successful');
if(true){
window.location='EmployeeHomePage.php';
}
</script>";
}
if($role=='D'){
echo "<script>alert ('Update successful');
if(true){
window.location='adminhomepage.php';
}
</script>";
}
if($role=='P'){
echo "<script>alert ('Update successful');
if(true){
window.location='ApproverHomePage.php';
}
</script>";
}
if($role=='T'){
echo "<script>alert ('Update successful');
if(true){
window.location='TravelAgentHomePage.php';
}
</script>";
}


}

}
if(isset($_POST['can']))
{

echo '<script>document.location="http://10.123.79.61/~tr688427/project/ApproverHomePage.php"</script>';
}


?>
