<?php
echo "<html>
<head>
<title>OTMS Ticket Booking</title>
<script type='text/javascript'>
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
<body bgcolor=pink oncontextmenu='return false' >
<center>
<form method=POST>
<div align=center>
<h1>Online Travel Management System</h1>
</div>
<hr>
<h3 align=center>Book Tickets<h3>
<table align=left>
<tr><td><a href='Welcome.php'><u>WelcomePage</u></a></td>
<td></td><td><a href='UpdateProfile.php'><u>UpdateProfile</u></a></td></tr>
</table>
<table align=right>
<tr><td><a href='ChangePassword.php'><u>ChangePassword</u></a></td>
<td></td><td><a href='Logout.php'></u>Logout</u></a></td>
</table>
<br>
<br>
<hr>
<table border=1>
<tr>
<th>RequestID</th>
<th>tripName</th>
<th>TravelDate</th>
<th>ApprovalStatus</th>
<th>Confirm Book Tickets</th>
</tr>";
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$stmt=mysqli_prepare($con,"SELECT RequestID,TripName,TravelDate,RequestStatus FROM 8_REQUEST_DETAILS");
$s=null;
$count=0;
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$requestId,$tripName,$travelDate,$status);
        while($row=mysqli_stmt_fetch($stmt))
 {
                date_default_timezone_set('Asia/Calcutta');
                $date=date_create($travelDate);
                $tdate=date_format($date,"d-m-Y");
                $s=$status;
                echo "<tr>
                <td><input type=text name=requestid value=$requestId disabled ></td>
                <td>$tripName</td>
                <td>$tdate</td>";
                if($status=='A')
                {
                        $status='Approved';
                }
                else if($status=='C')
                {
                        $status='Cancelled';
                }
                else if($status=='R')
                {
                        $status='Rejected';
                }
                else if($status=='S')
                {
                        $status='Submitted';
                }
                else if($status=='P')
                {
                        $status='Processed';
                }
 else
                {
                        $status='PendingApproval';
                }
                echo "<td><input type=text name=status value=$status disabled ></td>";

                if($status=='Approved')
  {
                             echo"<td><input type=submit name=$count value='Book Ticket' >";
                                #$count++;
                }
                else
                {
                         echo"<td><input type=submit name=book1 value='Book Ticket' disabled >";
                }
                $count++;
                echo "</tr>";
 }
mysqli_close($con);
echo "</table></br>
<div align=center>
<input type=submit name=ok value=OK></td>
</div>
</form>
</center>
</body>
</html>";
if(isset($_POST['ok']))
{
header ("Location:TravelAgentHomePage.php");
}
for($i=0;$i<$count;$i++)
{
if(isset($_POST[$i]))
{
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$value=mysqli_query($con,"SELECT RequestID,RequestStatus FROM 8_REQUEST_DETAILS WHERE RequestStatus='A'");
while($row=mysqli_fetch_row($value))
{
echo $row[0];
mysqli_query($con,"UPDATE 8_REQUEST_DETAILS SET RequestStatus='P' WHERE RequestStatus='A' and RequestID='$row[0]'");
echo "<script>
        document.location.href='BookTickets.php';
</script>'";
break;
}
mysqli_close($con);
}
if(isset($_POST[$i]))
{
 $c=0;
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$bookingid="B1001";
        $details="MYS-SBC";
        $status='B';
        $remarks="THANK YOU";


$stmt=mysqli_prepare($con,"SELECT RequestID,TripName,TravelDate FROM 8_REQUEST_DETAILS WHERE RequestStatus='P'");
        mysqli_stmt_execute($stmt);
        mysqli_bind_result($stmt,$requestid,$tripname,$traveldate);
while(mysqli_stmt_fetch($stmt))
        {
                $rid=$requestid;
                $tname=$tripname;
                $tdate=$traveldate;

       }
$details=$tripname.":".$traveldate;
        $res=mysqli_query($con,"SELECT BookingID FROM 8_TRAVEL_BOOKING");

 while($row=mysqli_fetch_row($res))
        {
                $bid=$row[0];
                $c++;
                if($c==0)
                {
                        $bookingid="B1001";
                }
                else
                {
                        ++$bookingid;
        }
}
 $query=mysqli_prepare($con,"INSERT INTO 8_TRAVEL_BOOKING VALUES(?,?,?,?,?)");
  mysqli_stmt_bind_param($query,"sssss",$bookingid,$rid,$details,$status,$remarks);
        mysqli_stmt_execute($query);
mysqli_close($con);
}
}

?>
