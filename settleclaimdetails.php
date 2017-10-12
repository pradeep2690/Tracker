<html>
    <head>
    <title>
        Online Travel Management System
    </title>
    <h2 align=center>Welcome To Online Travel Management System</h2>
    <hr>
    <h3 align=center>Settle Claim Details</h3>
<table>
<tr><td width=150 ><a href=welcome.php>WelcomePage</a></td><td width =1000><a href=update.php>UpdateProfile</a>
</td><td width=150 ><a href=password.php>ChangePassword</a><td><td><a href =Logout.php>Logout</a></td></tr>

</table>


<hr></head>
<form name=f2 method=POST>
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

<center>
<sup style='color:red;'>*</sup>Fields are mandatory.
<table border=1 >

 <?php
    session_start();
    $cID=$_SESSION['claimId'];
    $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
      if($select=mysqli_query($con,"select ClaimID,RequestID,ClaimAmount
           ,EmployeeRemarks from 8_CLAIM_DETAILS where ClaimID='$cID'"))
        {
          while($row=mysqli_fetch_row($select))
  {
           echo "<tr><td>ClaimID</td><td disabled value='$row[0]'>$row[0] </td></tr>
                 <tr><td>RequestID</td><td disabled value='$row[1]'>$row[1]</td></tr>
                 <tr><td>ClaimAmount</td><td disabled value='$row[2]'>$row[2]</td></tr>
                 <tr><td>UserRemarks</td><td><textarea size=50 name=uremarks disabled>$row[3]</textarea></td></tr>
                 <tr><td>SettledAmount<sup style='color:red;'>*</sup></td><td><input type=text name=samount></td></tr>
                 <tr><td>AdminRemarks</td><td><textarea name=aremarks size=50></textarea></td></tr>";

           }
        }

    echo "</table>
      <br>

       <input type=submit name=update value='Settle Claim'>&nbsp;&nbsp;
           <input type=reset name=reset value=Reset onClick='windows.reset()'>&nbsp;&nbsp;
           <input type=submit name=cancel value=Cancel>
    </form>
   </center>
  </body>
</html>";

if (isset($_POST['update']))
  {
    $samount=$_POST['samount'];
    $remarks=$_POST['aremarks'];
    $status='P';
    if($samount=='' || $remarks=='')
          {
      echo '<script>
           alert("Settled Amount and Admin Remarks is must ")
            </script>';
       }
    else
          {
       mysqli_query($con,"update 8_CLAIM_DETAILS set SettledAmount='$samount'
              where ClaimID='$cID'");
       mysqli_query($con,"update 8_CLAIM_DETAILS set remarks='$remarks'
              where ClaimID='$cID'");

       mysqli_query($con,"update 8_CLAIM_DETAILS set ClaimStatus='$status'
          where ClaimID='$cID'");
 }
  }
if(isset($_POST['cancel']))
  {
    header("Location:adminhomepage.php");
  }

?>
