<html>
<head><title>OLMS</title>
<form method=POST>
<h1 align=center>Online Travel Management System</h1>
<hr>
<center>
<br>
<table align=left>
<tr><td><a href="Welcome.php">Welcome Page</a></td></tr>
</table>
<table align=center>
<tr><td><b>Terms and Conditions</b></td></tr>
</table>
<br>
<hr>
<br>
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
<table align=center border=1 width="48%">

<?php
if(is_file("terms.txt"))
{
$AVR=fopen("terms.txt","rt") or die ("not authorized");
while($line=fgets($AVR))
{
$line=trim($line);
$data=explode(":",$line);
echo "<tr><td>$data[0]</td><td>$data[1]</td></tr>";
}
fclose($AVR);
}
else
{
echo "File doesnot exist </br>";
}
echo "</table>
<br>
<td><input type=submit name=submit value=OK></td>";
if(isset($_POST['submit']))
{
Header("Location:NewUserRegistration.php");
}
?>
</center>
</body>
</form>
</head>
</html>

