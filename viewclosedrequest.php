<html>
<head>
<title>
Online Travel Management System</title>
<h2 align=center>Welcome To Online Travel Management System</h2>
<hr>
<h3 align=center>View Closed Request</h3>
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
<select name="requestNature">
        <option>-Select-</option>
        <option value="Settled Claim Requests">Settled Claim Requests </option>
        <option value="Requested for Clarification">Requested for Clarification</option>
        </select></td><td><input type=submit name=fetch value='Fetch'></td>
</tr>
</table>
<br>


</form>
</center>
</body>
</html>
<?php

session_start();

if(isset($_POST['fetch'])){


$_SESSION['requestNature']=$_POST['requestNature'];
header("Location:viewclosedrequestdetails.php");
}
?>
               