<html>
 <title>
 Cancel Accommodation
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
 <h2>Online Travel Management System</h2></head>
 <hr>
 <body bgcolor=pink oncontextmenu="return false">
 <form method=POST name=form1>
 <center>
 <br>
 <h4>Cancel Accommodation Request</h4>

 </center>
 <table align=left>
 <tr><td><a href="Welcome.php">Welcome Page</a></td><td></td>
 <td><a href=UpdateProfile>Update Profile</a></td></tr>
</table>
<table align=right>
<tr> <td><a href="ChangePassword.php">Change Password</a></td><td></td>
 <td><a href="Logout.php">Logout</a></br></td></tr>
</table>
<br>
<br>
 <hr>
 </br>
 <table border=1 align=center>
 <tr><th>Select</th><th>RequestID</th><th>Location</th><th>TripName</th>
 <th>CheckIn Date</th><th>CheckOut Date</th><th>Room Type</th><th>Accommodation Status</th>
 <?php
 session_start();
 $id=$_SESSION["uid"];
 $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
 if(mysqli_connect_errno($con))
 {
  echo "Failed to connect to MYSQL:".mysqli_connect_error();
 }
 else
 {
   $val=mysqli_query($con,"select r.RequestID,r.DCLocation,r.TripName,a.CheckInDate,a.CheckOutDate,a.RoomType,a.RoomBookingStatus from 8_REQUEST_DETAILS r inner join 8_ACCOMMODATION_DETAILS a ON r.RequestID=a.RequestID  inner join 8_EMPLOYEE_DETAILS e ON e.EmployeeID=r.EmployeeID inner join 8_LOGIN_DETAILS l ON e.UserID=l.UserID where l.UserID='$id'");
$flag=0;
 while($row=mysqli_fetch_row($val))
 {

   echo "<tr><td>
   <input type=radio name=rad value=$row[0] /></td>
   <td disabled>$row[0]</td>
   <td disabled>$row[1]</td>
   <td disabled>$row[2]</td>
   <td disabled>$row[3]</td>
   <td disabled>$row[4]</td>
   <td disabled>$row[5]</td>
   <td disabled>$row[6]</td></tr>";

 }
mysqli_close($con);
}
?>
</table>
</br>
<center>
<input type=submit name=confirm value="Confirm Cancel" onclick='document.form1.area.disabled=false; return false'; />
<input type=submit name=back value="Go Back" /></br>
<h4>Reason for Cancellation <span style=color:red;>*</span><textarea name=tarea id="area" disabled></textarea></h4>
</br>
<input type=submit name=submit value=Submit />
</center>
</form>
</body>
</html>
<?php
if(isset($_POST['rad']))
  {

      $select=$_POST['rad'];
  }
  if(isset($_POST['submit']))
  {
      $tarea=$_POST['tarea'];

    if($tarea=="")
     {
        echo "<span style=color:red;>Reason for cancellation is mandatory</span><br>";
     }
   else
   {
       $con1=mysqli_connect("localhost","tr688427","#infy123","osd2");

    if(mysqli_connect_errno($con1))
     {
       echo "The server is down,Please try after sometime.:".mysqli_connect_error();
     }
     else
     {
          $update=mysqli_query($con1,"update 8_REQUEST_DETAILS set Accomodation='N' where RequestID='$select'");
         echo "<script>alert('Status changed successfully for selected record ')</script>";
         echo "<script>window.location='EmployeeHomePage.php'</script>";

     }

  }
}
 if(isset($_POST['back']))
 {
   header("location:EmployeeHomePage.php");
 }
?>