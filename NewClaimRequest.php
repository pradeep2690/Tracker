<html>
<head>
<title>New Claim Request</title>
<center><h2>Online Travel Management System</h2></center>
<hr>
</script><script type="text/javascript">
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
<body bgcolor=pink oncontextmenu = "return false">
<center>
<h3>New Claim Request</h3>
<table>
<tr><td width=150>
<a align=left href="Welcome.php">Welcome page</a></td><td width=1300><a align=left href="UpdateProfile.php">Update Profile</a></td><td width=170><a align=right href="ChangePassword.php">Change Password</a></td><td><a align=right href="Logout.php">Logout</a></td></tr>
</table>
<hr>
<form enctype="multipart/form-data" method=POST>
Select RequestID<span style=color:red;>*</span><select name=requestid>
<?php
session_start();
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}
else
{
if($res=mysqli_query($con,"select RequestID from 8_REQUEST_DETAILS"))
{
while($data=mysqli_fetch_row($res))
{
 echo "<option value=$data[0]>$data[0]</option>";
}
}
}
mysqli_close($con);
?>
</select>
<table border=1>
<?php
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}
else
{
if($res1=mysqli_query($con,"select ClaimID from 8_CLAIM_DETAILS"))
{
while($data1=mysqli_fetch_row($res1))
{
$claimid=++$data1[0];
}
}
else
{
$claimid="C1005";
}

echo "<tr><td>ClaimID</td><td><input name=cid value=$claimid readonly ></td></tr>
<tr><td>Claim Amount<span style=color:red;>*</span></td><td><input type=text name=cmt ></td></tr>
<tr><td>Remarks<span style=color:red;>*</span></td><td><textarea name=remarks></textarea></td></tr>
</table>
<span style=color:red;>*</span>Files<input type='file' name='uploadedfile' value='Browse' ><br>";
#mysqli_close($con);
if(isset($_POST['upload']))
{
$cmt=$_POST['cmt'];
$_SESSION['cmt']=$cmt;
$remarks=$_POST['remarks'];
$_SESSION['remarks']=$remarks;
if($cmt=='' || $remarks=='')
{ echo "Mandatory fields can not be left blank";}
else
{
$target_dir="projectdirectory/";
$target_file=$target_dir . basename($_FILES["uploadedfile"]["name"]);
$file_path=$target_file;
$_SESSION['fp']=$file_path;
$uploadok=1;
if(file_exists($target_file))
{
echo "<script>alert('File already exists')</script>";
$uploadok=0;
}
if($uploadok==0)
{
echo "<center><span style=color:red;>File can not upload</span></center>";
}
else
{
        if(move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],$target_file))
        {
        echo "<script> alert('The file" .basename($_FILES["uploadedfile"]["name"])." has been uploaded.')</script>";
        }
        else
        {
        echo "There was a error in uploading your file";
        }
}
}
}

echo "<input type=submit name=upload value='Upload File Now' >
<br>
<input type=submit name=submit value=submit>&nbsp;&nbsp;<input type=submit name=reset value=Cancel>";
if(isset($_POST['submit']))
{
$cid=$_POST['cid'];
$cmt=$_SESSION['cmt'];
$remarks=$_SESSION['remarks'];
if(isset($_POST['requestid']))
{
$rid=$_POST['requestid'];
}

$fp=$_SESSION['fp'];
$s='S';
#$con=mysqli_connect("localhost","tr688398","#infy123","osd2");
$res2=mysqli_query($con,"insert into 8_CLAIM_DETAILS values('$cid','$rid',$cmt,'Null','Null','$remarks','$s','Null','$fp')");
}
}
mysqli_close($con);
if(isset($_POST['reset']))
{
echo "<script>document.location='EmployeeHomePage.php'</script>";
}
?>
</form>
</center>
</body>
</html>
