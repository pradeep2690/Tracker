<html>
 <head><title>OLMS</title>
 <form method=POST>
 <h1 align=center>Online Travel Management System<h1>
 <hr>
 <h3 align=center>Contact Us<h3>
 <h5 align=left><a href="Welcome.php">Welcome Page</a></h5>
 <hr>
 <br>
 <body bgcolor=pink align=center oncontextmenu="return false">
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
 <center>
 <table align=center border=1 width="48%">
 <?php
session_start();
$user=$_SESSION['uid'];
 if(is_file("contact.txt"))
 {
 $AVR=fopen("contact.txt","rt") or die ("not authorized");
 while ($line=fgets($AVR))
 {
 $line=trim($line);
 $data=explode(":",$line);
 echo "<tr><td>$data[0]</td><td>$data[1]</td></tr>";
 }
                        fclose($AVR);
 }
 else
 {
 echo "File doesnot exist <br/>";
 }
 echo "
 </table>
 <br>
 <td><input type=submit name=submit value=OK ></td>";
 if(isset($_POST['submit']))
 {
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select Role from 8_LOGIN_DETAILS where UserID='$user'"))
{
$row=mysqli_fetch_row($result);
if($row[0]=='E'){
Header("Location:EmployeeHomePage.php");
            }
elseif($row[0]=='D'){
Header("Location:adminhomepage.php");
}
elseif($row[0]=='P'){
Header("Location:ApproverHomePage.php");
}
elseif($row[0]=='E'){
Header("Location:TravelAgentHomePage.php");
}
 }
}
 ?>
 </center>
 </body>
 </form>
 </head>
 </html>
