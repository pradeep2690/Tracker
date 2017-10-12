<html>
<head>
<title>
Eligibilty Check
</title>
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
<body bgcolor="pink" oncontextmenu="return false"><center>
<h2>Online Travel Management System</h2>
</center>
<br>
<hr></hr>
<center><h3>Employee Eligibility</h3></center>
<table>
<tr><td width=150>
<a align=left href="Welcome.php">Welcome Page</a></td><td width=1300 ><a align=left href="UpdateProfile.php">Update Profile</a></td><td width=170><a  align=right href="ChangePassword.php">Change Password</a></td><td><a align=right href="Logout.php">Logout</a></td></tr>
</table>
<form method= POST name=Eligibility_Check>
<hr></hr>
<br>
<center><table border="2">
                       <tr><th>Travel Type</th>
 <th>Claim</th>
                                <th>Passport</th>
                                     <th>Project Code</th>
                                <th>Date of Travel</th>
                              <th>Duration (in days)</th>
                           <th>Select</th></tr>

                        <tr><td>Personal</td>
                              <td>NIL</td>
                                <td>NOT APPLICABLE</td>
  <td><input type=text name= perProject></td>
                                <td><input type= text  name= perDate value=dd-mon-yyyy></td>
                              <td><input type=text name= perDuration> </td>
                           <td><input type=radio name=radio value=personal> </td></tr>


                        <tr><td>Official Domestic</td>
                              <td>YES</td>
                                <td> APPLICABLE</td>
                                     <td><input type=text name= domProject ></td>
                                <td><input type= text name= domDate value=dd-mon-yyyy></td>
                              <td><input type=text name= domDuration> </td>
                           <td><input type=radio name= radio value=domestic> </td></tr>



                        <tr><td>Official International</td>
                              <td>YES</td>
                                <td>VISA APPLICABLE</td>
                                     <td><input type=text name= intProject></td>
                                <td><input type= text name= intDate  value=dd-mon-yyyy></td>
                              <td><input type=text name=intDuration> </td>
                           <td><input type=radio name= radio value=international> </td></tr>

</table>
                                       <input type= submit name= submit value= 'Check Eligibility' >
                                       <input type= Reset name= reset value= 'Reset' >
<?Php

date_default_timezone_set('Asia/Calcutta');
if( isset($_POST['submit']) && isset($_POST['radio']))
{
$radio=$_POST['radio'];
$counter=0;
$currentDate=strtotime(date('d-m-Y'));


if($radio=="personal"){
$TravelDate=$_POST['perDate'];
$Project=$_POST['perProject'];
$Duration=$_POST['perDuration'];
$time=strtotime($TravelDate);
$day=date('D',$time);
                                           if($TravelDate=="" || $Project=="" || $Duration==""){
                                                         echo "Mandatory fields cant be left blank";

                                                              }

                                                else{
                                                  if($time>=$currentDate && ($day=='Sat' ||$day=='Sun' ) )

                     {
                       if( ($day=="Sat" && ($Duration==1 || $Duration==2))|| ($day=="Sun" && $Duration==1 )  )
                                                           {
                                                     $counter=1;
                                                  echo "Travel Request Valid";
                                                                        }
                                                     else {
                                                         echo "Invalid Entries, not eligible for Travel";


                                                          }

                       }
                                                    else {
                                                         echo "Not eligible for Travel, Please Check your Entries";


                                                          }
                                                         }
                                                        }


 else if($radio=="domestic"){
                                                                 $TravelDate=$_POST['domDate'];
                                                                  $Project=$_POST['domProject'];
                                                                  $Duration=$_POST['domDuration'];
                                                              $time=strtotime($TravelDate);
                                                               $day=date('D',$time);

                                                           if($TravelDate=="" || $Project=="" || $Duration==""){
                                                    echo "Mandatory fields cant be left blank (official-Domestic)";
   }

                                                       elseif($time>=$currentDate && $Duration<=30 && $Project!='Bench' )
                                {
                                                   $counter=1;
                                             echo "Travel Request Valid";
                                      }
                                 else {
                                  echo "Invalid Entries, Not eligible for Travel"; }
                                        }






               else if($radio=="international")
            {
               $TravelDate=$_POST['intDate'];
               $Project=$_POST['intProject'];
               $Duration=$_POST['intDuration'];
               $time=strtotime($TravelDate);
               $day=date('D',$time);

                                     if($TravelDate=="" || $Project=="" || $Duration==""){
                                        echo "Mandatory fields cant be left blank (official-International)";

                                            }
                                     else if ($time>=$currentDate && $Duration<=30 && $Project!='Bench' ) {
                                               $counter=1;
                                             echo "Travel Request Valid";

}
 else {
                                  echo "Invalid Entries"; }

            }

if($counter==1)
{
header('Location:EmployeeHomePage.php');
 }
 }
else
{
echo "Please, click on radio button";
}
?>

</form>
</center></body>
</head>
</html>
