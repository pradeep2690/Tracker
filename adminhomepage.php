<html>
   <head>
<title>OTMS Admin</title>
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
  <hr>
<body bgcolor=pink>
<h3 align=center>Admin Home Page</h3>
<table>
<tr><td width=1275><a href=Welcome.php><u>WelcomePage</u></a></td>
<td><a href=Logout.php></u>Logout</u></a></td></tr>
</table>
<hr>
</script>

      <form method=POST>
      <h3><center>The Link's available are:</center></h3>
   <table align=center  border=1>
      <tr>
        <td><a href="settleclaim.php">Settle Claims</a></td>
        <td><a href="viewclosedrequest.php">View Closed Requests</a></td>
        <td><a href="AddNewAgent.php">Add New Agent</a></td>
     </tr>
     <tr>
        <td><a href=ClaimsClarification.php>Claim Clarification</a></td>
        <td></td>
        <td><a href=BlockUnblock.php>Block/Unblock Agent</a></td></tr>

     </table>
     </form>
   </body>
</html>
