<title>Logout
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
</head>
<center>
<body bgcolor=pink oncontextmenu="return false">
<h3>Thank You for Visiting OTMS.com.....!</h3>
<table>
<tr>
<td width=150></td>
<td width=700></td>
<td width=170></td>
<td><a href="EmployeeHomePage.php">Go to Home Page</a></td></tr>
<br>
</br>
YOU ARE SUCCESSFULLY LOGGED OUT OF THE PAGE


</center>
</body>
</html>

<?php

echo "<script>
alert('Successfully logged Out!');
if(true){
window.location='Welcome.php';
}
</script>";
?>

