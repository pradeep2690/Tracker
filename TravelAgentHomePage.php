<html>
<head><title>OLMS Travel Agent Home</title>
<form method=POST>
<body bgcolor=pink oncontextmenu="return false">
<center>
<h1 align=center>Online Travel Management System</h1>
<hr>
<h3> Tarvel Agent Home Page</h3>
<table align=left>
<tr>
<td><a href="Welcome.php">Welcome Page</a></td></tr>
</table>
<table align=right>
<tr>
<td><a href="Logout.php">Logout</a></td></tr>
</table>
<br>
<br>
<hr>
<h4>The Link's available are:</h4>
<table align=center border=1 width="48%">
<tr><td><a href="BookTickets.php">Book Tickets</a></td>
<td><a href="SendforClaim.php">Send For Claim</a></td>
<td><a href="CancelBooking.php">Cancel Booking</a></td></tr>
<tr><td><a href="BookingHistory.php">View Booking History</a>
<td></td>
<td><a href="DelegateBooking1.php">Delegate Booking</a></td></tr>
</table>
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
</center>
</body>
</form>
</head>
</html>
