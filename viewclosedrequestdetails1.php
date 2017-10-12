<html>
<head>
<title>
Online Travel Management System</title>
<h2 align=center>Welcome To Online Travel Management System</h2>
<hr>
<h3 align=center>View Closed Request Details</h3>
<table>
<tr><td width=150 ><a href=Welcome.php>WelcomePage</a></td><td width =1000><a href=UpdateProfile.php>UpdateProfile</a>
</td><td width=150 ><a href=ChangePassword.php>ChangePassword</a><td><td><a href =Logout.php>Logout</a></td></tr>

</table>



<hr></head>
<form name=f2 method=POST>
<body bgcolor=pink oncontextmenu="return false">
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
<table border=1 >
<tr><td>RequestNature</td><td>
<?php
session_start();
$nature=$_SESSION['fetch1'];
if($nature=='Settled Claim Requests'){
echo '<select name="requestNature">
        <option>-Select-</option>
        <option value="SettledClaimRequest" selected>Settled Claim Requests </option>
        <option value="RequestedforClarification">Requested for Clarification</option></select>
</td><td><input type=submit name=fetch value="Fetch"></td>
</tr>
</table>';
echo '
<hr>
<table border=1 >
<tr><th>ClaimID</th><th>RequestID</th><th>ClaimAmount</th><th>UserRemarks</th><th>SettledAmount</th><th>AdminRemarks</th></tr>';
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select claimId,RequestId,ClaimAmount,EmployeeRemarks,SettledAmount,Remarks from 8_CLAIM_DETAILS where claimStatus='P'"))
{
while($row=mysqli_fetch_row($result))
{
echo "
<tr><td><input type=text name=cId value='$row[0]' disabled ></td><td><input type=text name=rid value='$row[1]' disabled ></td><td><input type=text name=camount value='$row[2]' disabled ></td><td><textarea size=50 value='$row[3]' disabled >$row[3]</textarea><td><input type=text name=samount value='$row[4]' disabled ></td><td><textarea size=50 value='$row[5]' disabled >$row[5]</textarea></td></tr>";

}
}
echo "</table>";



}
else {

echo '<select name="requestNature">
        <option>-Select-</option>
        <option value="SettledClaimRequest" >Settled Claim Requests </option>
        <option value="RequestedforClarification" selected>Requested for Clarification</option></select>
</td><td><input type=button name=fetch value="Fetch"></td>
</tr>
</table>';
echo "
<hr>
<table border=2>
<tr><th>ClaimID</th><th>RequestID</th><th>ClaimAmount</th><th>UserRemarks</th><th>SettledAmount</th><th>AdminRemarks</th></tr>";

$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select claimId,RequestId,ClaimAmount,EmployeeRemarks,SettledAmount,Remarks from 8_CLAIM_DETAILS where claimStatus='Q'"))
{
while($row=mysqli_fetch_row($result))
{
echo "
<tr><td><input type=text name=cId value='$row[0]' disabled ></td><td><input type=text name=rid value='$row[1]' disabled ></td><td><input type=text name=camount value='$row[2]' disabled ></td><td><textarea size=50 value='$row[3]' disabled > $row[3]</textarea><td><input type=text name=samount disabled></td><td><textarea size=50 value='$row[5]' disabled>$row[5]</textarea></td></tr>";
}


}
echo "</table>";
}
mysqli_close($con);
?>

<br>
<td align=center colspan=6><input type=submit name=ok value='OK'></td>
<br>

</form>
</center>
</body>
</html>

<?php
if(isset($_POST['ok'])){
header("location:adminhomepage.php");

}
?>
