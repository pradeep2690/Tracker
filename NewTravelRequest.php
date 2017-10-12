<html>
<head>
<title>Travel Request Page</title>
<script type="text/javascript">
function Accomodation()
{
var z;
if (confirm('Do you want to submit assosiated accommodation request?')== true)
{
document.location = 'AddAccommodation.php';
}
else
{
alert('Accommodation request not submitted');
}
}
function setOptions(chosen) {
 var selectbox = document.newtravel.class1;

selectbox.options.length = 0;
 if (chosen == " ") {
   selectbox.options[selectbox.options.length] = new Option('Select',' ');

 }
 if (chosen == "AIR") {
   selectbox.options[selectbox.options.length] = new
Option('Domestic','Domestic');
 selectbox.options[selectbox.options.length] = new
Option('Economy','Economy');

  selectbox.options[selectbox.options.length] = new
Option('Business','Business');
}
 if (chosen == "BUS") {
   selectbox.options[selectbox.options.length] = new
Option('AC','AC');
   selectbox.options[selectbox.options.length] = new
Option('Non-A/C','Non-A/C');
 selectbox.options[selectbox.options.length] = new
Option('Sleeper','Sleeper');
 }
 if (chosen == "CAB") {
 selectbox.options[selectbox.options.length] = new
Option('AC','AC');
   selectbox.options[selectbox.options.length] = new
Option('Non-A/C','Non-A/C');
 }
 if (chosen == "TRAIN") {
 selectbox.options[selectbox.options.length] = new
Option('Sleeper','Sleeper');
   selectbox.options[selectbox.options.length] = new
Option('AC-three tier','AC-three tier');
 }
}
</script>

</head>
<h2 align = center>Online Travel Management System</h2>
  <hr>
<h2><tr><td ><center><b>New Travel Request</b></center></td></tr></h2>

<body bgcolor = pink>
<table width = 1350 align = center>
</table>
<table width = 250 align = left>
<tr><td><a href = "Welcome.php">Welcome Page</a></td><td><a href = "UpdateProfile.php">Update Profile</a></td></tr></table>
<table width = 300 align = right><tr align = right><td><a href = "ChangePassword.php">Change Password</a></td><td><a href =
 "Logout.php">Logout</a></td></tr></table>
<br><br>
<hr>
<br>
<form method=POST name="newtravel">
<?php
session_start();
$con = mysqli_connect("localhost","tr688427","#infy123","osd2");
mysqli_query($con,"create table IF NOT EXISTS 8_REQUEST_DETAILS(RequestID varchar(10) not null primary key ,
TripName varchar(30) not null,
TripType enum('Official','Personal'),
EmployeeID int(10) references 8_EMPLOYEE_DETAILS(EmployeeID),
RequestDate DATE not null,
TravelMode enum('CAB','BUS','TRAIN','AIR') not null,
TravelClass enum('Non-A/C','A/C','Sleeper','Non-A/C','A/C','Domestic','Business','Economy','Sleeper','AC-three tier'),
SourceSecurity varchar(20) not null,
DestinationCity varchar(20) not null,
DcLocation varchar(20) not null,
TravelDate DATE,
TravelTime TIMESTAMP not null,
FirstLevelApproverID varchar(20),
RequestStatus enum('A','S','P','R','C'),
AgentID int(5) references Agent_DETAILS(AgentID),
Accomodation enum('Y','N'),
Remarks varchar(50))engine=innodb");
$found = 0;
$result = mysqli_query($con,"SELECT RequestID FROM 8_REQUEST_DETAILS ");
if($result)
{
 while($row = mysqli_fetch_row($result))
  {
   $requestid = $row[0];
   $found = 1;
   $requestid++;
  }
}
if($found==0)
{
$requestid = 'R1001';
}
mysqli_close($con);
?>
<table border = 1 align = center>
    <tr>
            <td>Employee ID</td><td><input type = text name = empid value = Employee# size=10 maxlength=10> </td>
        </tr>
        <tr>
            <td>Request ID</td><td><input type = text name = requestid value = "<?php echo $requestid?>" size=10 maxlength=30 disabled> </td>
        </tr>
        <tr>
            <td>Trip Name</td><td><input type = text name = tripname  size=10 maxlength=30></td>
        </tr>
        <tr>
 <td>Purpose Of Travel</td><td><input type = text name = purposeoftravel  size=10 maxlength=30></td>
        </tr>
 <tr>
     <td>Mode Of Travel</td><td><select name="mode" size="1"
                                         onchange="setOptions(document.newtravel.mode.options
 [document.newtravel.mode.selectedIndex].value);">
                                         <option value=" " selected="selected">--Select--</option>
                                         <option value="AIR">Air</option>
                                         <option value="BUS">Bus</option>
                                         <option value="CAB">Cab</option>
                                         <option value="TRAIN">Train</option>
                                         </select></td>
 </tr>
 <tr>
 <td>Class</td>
      <td><select name="class1" size="1">
      <option value=" " selected="selected">--Select--</option>
      </select></td>
  </tr>








           <tr>
            <td>Travel Date</td>
            <td>
                <select name=dt maxlength=2 >
                <?php
                        for($i=1;$i<=31;$i++)
                        {
                        echo '<option value='.$i.'>'.$i.'</option>';
                        }
                ?>
                </select>
 <select name=month maxlength=4>
                <?php
                $monthlist=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
  for($i=0;$i<12;$i++)
                        {
                           echo '<option value='.$i.'>'.$monthlist[$i].'</option>';
                        }
                ?>
  </select>

                <select name=year maxlength=4>
                <?php
                        date_default_timezone_set('Asia/Calcutta');
                        for($i=date("Y");$i<=2050;$i++)
                        {
                           echo '<option value='.$i.'>'.$i.'</option>';
                        }
                ?>
                </select>
  </td>
       </tr>
        <tr>
            <td>From</td><td><input type = text name = from  size=10 maxlength=30></td>
        </tr>
        <tr>
            <td>To</td><td><input type = text name = to  size=10 maxlength=30></td>
        </tr>
        <tr>
            <td>Departure Time</td><td><input type = text name = departuretime1  value = hh size=10 maxlength=30>:<input type = text name = departuretime2 value = min size=10 maxlength=30></td>
        </tr>
        <tr>
            <td>First Level Approver</td><td><input type = text name = firstlevelapprover  size=10 maxlength=30>@CompanyName.com</td>
        </tr>
       <tr>
       <td>Travel Desk </td>
<td><select id="traveldesk" name="traveldesk">
<option value=Mysore>Mysore</option>
<option value=Bangalore>Bangalore</option>
<option value=Pune>Pune</option>
<option value=Chennai>Chennai</option>
</select>
</td>
</tr>

</table>

<br>
<center>
<input type=submit name=sendforapproval value='Send For Approval' onclick='Accomodation()' />&nbsp;&nbsp;
<input type=reset name=cancel value=Cancel>
</center>
</form>
<?php
if(isset($_POST['sendforapproval']))
{
  $empid = $_POST['empid'];
  $tripname = $_POST['tripname'];
  $purposeoftravel = $_POST['purposeoftravel'];
  $from = $_POST['from'];
 $to = $_POST['to'];
 $_SESSION['loc']=$to;
$_SESSION['rid']=$requestid;
  $departuretime1 = $_POST['departuretime1'];
  $departuretime2 = $_POST['departuretime2'];
  $firstlevelapprover = $_POST['firstlevelapprover'];
  $mode = $_POST['mode'];
  $class = $_POST['class1'];
  $traveldesk = $_POST['traveldesk'];
  $dt = $_POST['dt'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $traveldate = $year.'-'.$month.'-'.$dt;
$_SESSION['traveldate']=$traveldate;
 $departuretime = "$traveldate $departuretime1.$departuretime2.00";
  $found = 0;
  if($empid == '' ||  $tripname == '' || $purposeoftravel== '' || $from == '' || $to == '' || $departuretime1 == '' || $departuretime2 == '' ||  $firstlevelapprover == '')
    {
     echo "<script>alert('All Fields Are Mandatory');
       </script>";
    }
  else
    {
    if (preg_match("/^[a-z A-Z_]+$/",$tripname) && preg_match("/^[a-z A-Z_]+$/",$purposeoftravel))
         {
          if(preg_match("/^[a-z A-Z]+$/",$from) && preg_match("/^[a-z A-Z]+$/",$to))
            {
              if($from != $to)
  {
                   if(preg_match("/^\d{1,2}$/",$departuretime1) && preg_match("/^\d{1,2}$/",$departuretime2))
                    {
                         $found = 1;

                    }
                   else
                    {
                     echo "<script>alert('Invalid Time Format');
                            </script>";
                    }
                }
              else
               {
                 echo "<script>alert('Source And Destination cannot be same');
                        </script>";
               }
     }
           else
             {
              echo "<script>alert('Invalid Loacation entered');
                     </script>";
             }
         }
      else
        {
         echo "<script>alert('Invalid Format.Enter the data again');
                </script>";
        }
    }

if($found==1)
{
echo "Successfull";
$con = mysqli_connect("localhost","tr688427","#infy123","osd2");
echo "$empid,'$tripname','$purposeoftravel','$from','$to','$departuretime','$traveldesk','$mode','$class','$firstlevelapprover',$traveldate";
mysqli_query($con,"INSERT INTO 8_REQUEST_DETAILS(EmployeeID,RequestID,TripName,TripType,SourceSecurity,DestinationCity,TravelTime,DcLocation,TravelMode,TravelClass,FirstLevelApproverID,TravelDate) VALUES($empid,'$requestid','$tripname','$purposeoftravel','$from','$to','$departuretime','$traveldesk','$mode','$class','$firstlevelapprover','$traveldate')");
mysqli_close($con);
echo "<script>document.location='AddAccommodationRequest.php'; </script>";
}

}
?>
</body>
</html>
