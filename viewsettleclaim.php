<html>
    <head>
    <title>
         Online Travel Management System
        </title>
       <h2 align=center>Welcome To Online Travel Management System</h2>
       <hr>
       <h3 align=center>Settle Claim</h3>
<table>
<tr><td width=150 ><a href=Welcome.php>WelcomePage</a></td><td width =1000><a href=UpdateProfile.php>UpdateProfile</a>
</td><td width=150 ><a href=ChangePassword.php>ChangePassword</a><td><td><a href =Logout.php>Logout</a></td></tr>

</table>


<hr></head>
<form name=f2 method=POST>
<body bgcolor=pink oncontextmenu="return false" >
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
<table border=1 align=center>


    <tr>
       <th>Select</th>
           <th>ClaimID</th>
           <th>RequestID</th>
           <th>ClaimAmount</th>
           <th>Click to View Claim Details</th>
        </tr>
 <?php
     $con=mysqli_connect("localhost","tr688427","#infy123","osd2");
     if($result=mysqli_query($con,"select ClaimId,RequestId,ClaimAmount,FilePath
            from 8_CLAIM_DETAILS where claimStatus='A'"))
     {
       while ($row=mysqli_fetch_row($result))
       {

       echo "<tr>
                 <td align=center><input type=radio name=select value=$row[0]></td>
                         <td disabled name=id>$row[0]  </td>
                         <td disabled>$row[1] </td>
                         <td>$row[2]</td>
                         <td align=center><input type=submit name=view value='View Claim Details'</td>
                         </tr>";
       }
     mysqli_free_result($result);
     }
    mysqli_close($con);

 ?>

   </table>
      <input type=submit name=ok value='OK'>

   </form>
   </center>
   </body>
</html>


<?php
 session_start();
if(isset($_POST['select']))
{
if (isset($_POST['view']))
         {
      $_SESSION['claimId']=$_POST['select'];
     echo "<script>document.location='settleclaimdetails.php'</script>";
     }
}
if(isset($_POST['ok'])){
echo "<script>document.location='adminhomepage.php'</script>";

}
?>

        