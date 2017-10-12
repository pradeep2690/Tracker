<html>
<head>
<title>
Online Travel Management System</title>
</head>
<body bgcolor=pink>
<form  method=POST >
<h2 align=center>Welcome To Online Travel Management System</h2>
<hr>
<h3 align=center> Welcome User to Update Profile</h3>
<table>
<tr><td width=150 ><a href=welcome.php>WelcomePage</a></td><td width =1000><a href=update.php>UpdateProfile</a>
</td><td width=150 ><a href=password.php>ChangePassword</a><td><td><a href =Logout.php>Logout</a></td></tr>

</table>


<hr>

<center>
<sup style="color:red;">*</sup>Fields are mandatory.

<table border=1 >


<?php
session_start();

$uid=$_SESSION["uid"];
$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
if($result=mysqli_query($con,"select EmployeeID from 8_EMPLOYEE_DETAILS where UserID='$uid'")){
while($row=mysqli_fetch_row($result)){

echo "<tr><td>EmployeeID</td><td><input type=text name=EmpId value=$row[0] disabled></td></tr>";
$_SESSION['eid']=$row[0];
$eid=$_SESSION['eid'];
}
}
?>

<tr><td>EmployeeName<sup style="color:red;">*</sup></td><td><input type=text name=EmpName /></td></tr>
<?php
echo "<tr><td>UserID</td><td><input type=text name=UId value=$uid disabled ></td></tr>";
?>
<tr><td>Date of Birth<sup style="color:red;">*</sup></td><td><select name=day>

<?php
for($i=1;$i<=31;$i++)
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
for($i=1990;$i<=2015;$i++)
{
echo "<option $i>$i<option>";
}
?>
</select>
</td></tr>

<tr><td>Email ID<sup style="color:red;">*</sup>
</td><td><input type=text name=email></td></tr>


<tr><td>Job Level<sup style="color:red;">*</sup>
</td><td><select name=job>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
</select></td></tr>
<tr><td>Address
<sup style="color:red;">*</sup></td><td><textarea name=add ></textarea></td></tr>
<tr><td>Phone No<sup style="color:red;">*</sup>
</td><td><input type=text name=phone></td></tr>
</table>
<br>

<input type=submit  name=update value='Update Profile'>&nbsp;&nbsp;<input type=reset name=reset value=Reset onClick='windows.reset()'>
</form>
</center>
</body>
</html>


 <?php
$flag=0;
if (isset($_POST['update'])){
$EmpName=$_POST['EmpName'];



$email=$_POST['email'];
$phone=$_POST['phone'];
$day=$_POST['day'];
$mon=$_POST['mon'];
$year=$_POST['year'];
$dob=$year.'-'.$mon.'-'.$day;
$job=$_POST['job'];
$add=$_POST['add'];

if($EmpName=='' || $email=='' || $phone==''){
 echo '<script>
     alert("Mandatory Fields cannot be blank");
</script>';
}
 else {
 if((preg_match("/^[a-zA-Z ]+$/",$EmpName) || preg_match("/^[a-zA-Z]+$/",$EmpName )) && !preg_match("/^[ ]+$/",$EmpName)) {

   if(preg_match("/^\w+@\w+\.\w+$/",$email)){
     if($add!=''){
       if(preg_match("/^[0-9]{10}+$/",$phone)){

$con=mysqli_connect("localhost","tr688427","#infy123","osd2");
mysqli_query($con,"update 8_EMPLOYEE_DETAILS set EmployeeName='$EmpName'
              where EmployeeID='$eid'");
       mysqli_query($con,"update 8_EMPLOYEE_DETAILS set Email='$email'
              where EmployeeID='$eid'");

       mysqli_query($con,"update 8_EMPLOYEE_DETAILS set phone='$phone'
          where EmployeeID='$eid'");
 mysqli_query($con,"update 8_EMPLOYEE_DETAILS set Address='$add'
          where EmployeeID='$eid'");
 mysqli_query($con,"update 8_EMPLOYEE_DETAILS set DOB='$dob'
          where EmployeeID='$eid'");

mysqli_query($con,"update 8_EMPLOYEE_DETAILS set jobLevel ='$job'
          where EmployeeID='$eid'");
$flag=1;
}
  else {
echo '<script>
   alert("Phone Number should be of 10 digits")
  </script>';
}
  }
else {
echo '<script> alert("Address cannot be blank")
      </script>';
}
}
else {
echo '<script> alert("Invalid Email ID")
      </script>';
}

}
                else {
echo '<script> alert("Employee Name should only contains alphabets and space")
 </script>';
}
               }
  }
if($flag==1){
header("Location:EmployeeHomePage.php");

}
?>



                
