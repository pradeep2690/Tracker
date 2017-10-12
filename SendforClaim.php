<?php
session_start();
echo "
<html>
        <head>
                <title>OTMS Send For Claim</title>
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
        <body bgcolor=pink oncontextmenu='return false'>
                <center>
                        <form method=POST>
                                <div align=center>
                                        <h1>Online Travel Management System</h1>
                                </div>
                                <hr>
                                <h3 align=center>Send For Claim</h3>

                        <table align=left><tr><td><a href='Welcome.php'>Welcome Page</a></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><a href='UpdateProfile.php'>Update Profile</a></td></tr></table>
                                <table align=right><tr><td><a href='ChangePassword.php'>Change Password</a></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td><a href='Logout.php'>Logout</a></td></tr>
                                </table>
                                <br>
                                <br>
                                <hr>
                        <table border=1>
                                <tr>
                                        <th>Select</th>
                                        <th>RequestID</th>
                                        <th>tripName</th>
                                        <th>TravelDate</th>
                                        <th>Booking Status</th>
 <th>Total Fare</th>
                                </tr>";
$count=0;
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
$query=mysqli_query($con,"SELECT tb.RequestID,TicketDetails,BookingStatus,ClaimAmount FROM 8_TRAVEL_BOOKING tb INNER JOIN 8_CLAIM_DETAILS cd ON tb.RequestID=cd.RequestID GROUP BY  tb.RequestID,TicketDetails,BookingStatus");
#mysqli_stmt_execute($query);
#mysqli_stmt_bind_result($query,$requestId,$tripdetails,$bookingstatus,$ratetravel,$rateaccomodation);
while($row=mysqli_fetch_row($query))
{
        $data=explode(':',$row[1]);
        $tripname=$data[0];
        $traveldate=$data[1];
        date_default_timezone_set('Asia/Calcutta');
        $date=date_create($traveldate);
        $tdate=date_format($date,"d-m-Y");

        $totalfare=$row[3];
        echo "<tr>
        <td><input type=radio name=r1 value=$totalfare></td>
        <td><input type=text name=requestid value=$row[0] readonly></td>
        <td>$tripname</td>
        <td>$tdate</td>";
        if($row[2]=='B')
        {
                $row[2]="Booked";
        }
        echo "<td><input type=text name=book value=$row[2] readonly></td>
        <td><input type=text name=totalfare value=$totalfare readonly></td>
        </tr>";
$count++;
}
echo "</table></br>
                                <div align=center>
                                        <input type=submit name=sendclaim value='Send For Claim'></td>
                                        <input type=submit name=ok value=OK></td>
                                </div>
                        </form>
                </center>
        </body>
</html>";
mysqli_close($con);

if(isset($_POST['ok']))
{
        header("Location:TravelAgentHomePage.php");
}

if(isset($_POST['sendclaim']))
{
        if(isset($_POST['r1']))
        {
                $val=$_POST['r1'];
                $_SESSION['totalfare']=$val;
        #echo $_SESSION['totalfare'];
        }
}
?>
