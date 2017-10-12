<html>
<head>
<title>OTMS Approver</title>
<center><h2>Online Travel Management System</h2></center>
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
<center>
<hr>
<h3>Approver Home Page </h3>
<table align=left>
<tr><td><a href="Welcome.php" >Welcome Page</a></td>
<table>


<table align=right>
<td><a href="Logout.php">Logout</a></td></tr>
</table>


<br>
<br>
<hr>


<body bgcolor=pink oncontextmenu="return false" >
<form method=POST>
<h3><center>The Link's available are:</center></h3>
<table align=center  border=2>
<tr>
<td><a href="ApproveRejectTravelRequest.php">Approve/Reject Travel Request</a></td>
<td><a href="ViewClaimUpload.php">View Claim Upload</a></td>
</tr>
<tr>
<td><a href="ApproveRejectClaimRequest.php">Approve/Reject Claim Request</a></td>
<td></td>
</tr>
<tr>
<td><a href="ApproveRejectAccommodationRequest.php">Approve/Reject Accommodation Request</a></td></tr>



</table>
</form>
</body>
</html>
