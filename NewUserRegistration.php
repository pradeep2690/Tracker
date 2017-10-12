<html>
<head>
<title>New User Registration</title>
<center>
<h2>Welcome To Online Travel Management System</h2><hr>
</center>
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
<body bgcolor=pink oncontextmenu="return false">
<table>
<tr><td width=350>
<a align=left href="Welcome.php">Welcome Page</a></td><td><b> Welcome User To SignUp</b></td></tr>
</table>
<hr>
<center>
<form method=POST>
<table border=1>
<tr><td>Employee ID<span style=color:red;>*</span> </td><td><input type=text name=eid required></td></tr>
<tr><td>Employee Name<span style=color:red;>*</span> </td><td><input type=text name=ename ></td></tr>
<tr><td>UserID<span style=color:red;>*</span>   </td><td><input type=text name=uid ></td><td><input type=submit name=s value='Check Availability' ></td></tr>
<tr><td>Password<span style=color:red;>*</span></td><td><input type=password name=pwd ></td></tr>
<tr><td>Confirm Password<span style=color:red;>*</span></td><td><input type=password name=cpwd ></td></tr>
<tr><td>Gender<span style=color:red;>*</span></td><td><input type=radio name=gen value=m >Male
<input type=radio name=gen value=f > Female</td> </tr>
<tr><td>Date Of Birth<span style=color:red;>*</span>  </td><td>
<select name=day>
<?php
for($i=1;$i<=31; $i++)
{

 echo "<option value=$i>$i</option>";
}
?>
</select>
<select name=mon>
<option value=01>Jan</option>
<option value=02>Feb</option>
<option value=03>Mar</option>
<option value=04>Apr</option>
<option value=05>May</option>
<option value=06>Jun</option>
<option value=07>Jul</option>
<option value=08>Aug</option>
<option value=09>Sep</option>
<option value=10>Oct</option>
<option value=11>Nov</option>
<option value=12>Dec</option>
</select>
<select name=year>
<?php
for($i=1900;$i<=2015;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
</td>
</tr>
<tr><td>Email ID<span style=color:red;>*</span></td><td><input type=text name=emailid ></td></tr>
<tr><td>Job Level<span style=color:red;>*</span></td><td><select name=joblevel>
<?php
for($i=2;$i<=7;$i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
</td>
</tr>
<tr><td>Address<span style=color:red;>*</span> </td><td><textarea name=address></textarea></td></tr>
<tr><td>Phone No.<span style=color:red;>*</span> </td><td><input type=text name=phoneno ></td></tr>
</table><br>
<input type=checkbox name='check' value='c' >I agree to the <a href="TermsConditions.php">Terms and Conditions</a>of ONLINE BOOK STORE <br><br>
<input type=submit name=cact value='Create My Account'>&nbsp;&nbsp;
<input type=reset name=cancel value=Reset>
</form>
</body>
</html>
<?php
date_default_timezone_set("Asia/Calcutta");
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if(mysqli_connect_errno($con))
{
echo "The Server is down. Please try after sometime.";
}

else
{
if(isset($_POST['s']))
{
$eid=$_POST['eid'];
$uid=$_POST['uid'];
$ename=$_POST['ename'];
        if($eid=='' || $ename=='' || $uid=='')
        {
        echo "<script>alert('Madatory field can not be left blank')</script>";
        }
        else
        {
        if($data=mysqli_query($con,"select EmployeeID,UserID from 8_EMPLOYEE_DETAILS where UserID='$uid'"))
        {
        while($res=mysqli_fetch_row($data))
        {
                if($eid!=$res[0] && $uid!=$res[1])
                {
                }
                else
                {
                echo "<script>alert('Data is already present')</script>";
                break;
                }
        }
        }
        }
}
 if(isset($_POST['cact']))
    {
        $eid=$_POST['eid'];
        $_SESSION['eid']=$eid;
        $uid=$_POST['uid'];
        $_SESSION['uid']=$uid;
        $ename=$_POST['ename'];
        $pwd=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];
        $gen=$_POST['gen'];
        $emailid=$_POST['emailid'];
        $phoneno=$_POST['phoneno'];
        $day=$_POST['day'];
        $mon=$_POST['mon'];
        $year=$_POST['year'];
        $dob=$year.'-'.$mon.'-'.$day;
        $joblevel=$_POST['joblevel'];
        $address=$_POST['address'];
        $check=$_POST['check'];
        $role='E';
        $status='A';
        if($eid=='' || $ename=='' || $uid=='' || $pwd=='' || $cpwd=='' || $emailid=='' || $phoneno=='')
        {
        echo "<script>alert('Mandatory field can not be left blank')</script>";
        }
        else{
                        if(ctype_alnum($pwd) && (strlen($pwd)>6))
                        {
                        if($pwd==$cpwd)
                        {
                        if($gen!='')
                        {
                        if($year!='' && $mon!='' && $day!='')
                        {
                        if(preg_match("/^\w+@\w+\.\w+\.?\w+$/",$emailid))
                        {
                        if(ctype_digit($phoneno) && (strlen($phoneno)==10) )
                        {
                        if($check!='')
                        {
                        $res1=mysqli_query($con,"insert into 8_LOGIN_DETAILS values('$uid','$pwd','$role','$dob','$status','')");
 $res2=mysqli_query($con,"insert into 8_EMPLOYEE_DETAILS values('$eid','$ename','$uid','$gen','$dob',$joblevel,'$address','$emailid',$phoneno,'$status')");

                        echo "<script>alert('Data Inserted Successfully')</script>";
                        echo "<script>document.location='http://10.123.79.61/~tr688400/LoginPage.php'</script>";
                        }
                        else{ echo "<script>alert('Accept the Terms and Conditons')</script>"; }
                        }
                        else
                        {
                        echo "<script>alert('Invalid Contact number')</script>";}
                        }
                        else
                        {
                        echo "<script>alert('Invalid Email ID')</script>";}
                        }
                        else
                        {
                        echo "<script>alert('DOB field should be selected')</script>";}
                        }
                        else
                        {echo "<script>alert('Select atleast one option')</script>";}
                        }
                        else
                        { echo "<script>alert('The Password and Confirm Password doesn't match')</script>";}
                        }
                        else
                        {
                        echo "<script>alert('Password Should have morethan 6 alphanumeric characters')</script>";
                        }
                }

        }

 }
mysqli_close($con);
?>
