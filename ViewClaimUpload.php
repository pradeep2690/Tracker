<html>
<head><center><h2>Online Travel Management System</h2></center></head>
<center>
<hr>
<h3>View Claim Upload </h3>
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

<form  method=POST>
<table align=center  border=4>
<th>Select</th><th>ClaimID</th><th>RequestID</th><th>ClaimAmount</th><th>ClaimUploadedFiles</th>

<?php
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");

if($result=mysqli_query($con,"select ClaimID,RequestID,ClaimAmount,filepath from 8_CLAIM_DETAILS "))
{
$flag2=0;
$count=0;
while ($row=mysqli_fetch_row($result))
{
echo "<tr>
<td><input type=radio value=$count name=select  /></td>
<td><input type=text name=req$count value=$row[0] /></td>
<td><input type=text value=$row[1] ></input></td><td>$row[2]</td>";
$count++;
$flag2=$row[3];
}

echo "<td><input type=submit  name=file value=ViewFile ></input></td></tr>";
$flag=0;
$count=0;
}
mysqli_close($con);
?>
</table>
<center><input type=submit name=approve value=SendForClarifications>&nbsp;&nbsp;&nbsp;<input type=submit name=reject value=Reject>&nbsp;&nbsp;&nbsp;<input type=submit name=cancel value=Cancel></center>
</form>
</body>
</html>
<?php
if(isset($_POST['select']))
{
if(isset($_POST['file']))
{

$radio=$_POST['select'];


$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select filepath from 8_CLAIM_DETAILS where ClaimID='$radio' "))
{
$count=0;
while ($row=mysqli_fetch_row($result))
{

$file=$row[0];

}
echo "$file";
echo "<script>document.location='$file'</script>";
}}}

if(isset($_POST['cancel'])){

echo "<script>document.location='http://10.123.79.61/~tr688427/project/ApproverHomePage.php'</script>";

}
if(isset($_POST['approve']))
{
$radio=$_POST['select'];
$id=$_POST['req'.$radio];
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
mysqli_query($con,"update  8_CLAIM_DETAILS  set ClaimStatus= 'C' where ClaimId='$id'");
}


if(isset($_POST['reject']))

{

$radio=$_POST['select'];
$id=$_POST['req'.$radio];
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
mysqli_query($con,"update  8_CLAIM_DETAILS  set ClaimStatus= 'R' where ClaimId='$id'");



}



?>
