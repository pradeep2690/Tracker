<html>
<title>OTMS Welcome
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
<h1>Welcome To Online Management System</h1>
<hr>
</br></br>
</center>
</head>
<body bgcolor=pink oncontextmenu="return false">
<center>
<h2>Welcome User</h2>
<hr>
</br>
<h4>The Links available are:</h4><br>
<a href="Login.php">Home Page</a></br></br>

<a href="ChangePassword.php">Change Password</a></br></br>
<a href="ForgotPassword.php " >Forgot Password</a></br></br>
<a href="ContactUs.php">Contact Us</a>
</center>
</body>
</html>

