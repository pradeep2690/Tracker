<html>
<title>OTMS Employee
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
<h2>Online Travel Management System</h2>
<hr>
<br>
</head>
<body bgcolor=pink oncontextmenu="return false">
<b>Employee Home Page</b>
<table>
<tr>
<td width=150><a href="Welcome.php">Welcome Page</a></td>
<td width=1300></td>
<td><a href="Logout.php">Logout</a></td>
</tr>
</table>
<hr>
</br>
<h4>The Links available are:</h4>
<table border=2>
<tr><td><a href="EligibilityCheck.php">Check Eligibility</a>  </td>
<td><a href="NewTravelRequest.php">New Travel Request</a>  </td>
<td><a href="NewClaimRequest.php">New Claim Request</a>
<td><a href="AddAccommodationRequest.php">Add Accommodation Request</a>
<td><a href="TravelFeedback.php">Travel Feedback</a>
</tr>
<tr><td></td>
<td><a href="CancelTravelRequest.php">Cancel Travel Request</a></td>
<td><a href="ViewClaimRequest.php">View Claim Request</a></td>
<td><a href="ViewAccommodationRequest.php">View Accommodation Request</a></td>
<td></td> </tr>
<tr><td></td>
<td><a href="ModifyTravelRequest.php">View Travel Request</a></td>
<td></td>
<td><a href="CancelAccommodationRequest.php">Cancel Accommodation Request</a></td></tr>


</table>
</html>
