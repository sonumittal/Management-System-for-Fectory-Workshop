    <?php
 include_once('connection.php');
    if(!isset($_SESSION['logged'])&&$_SEESION['logged2']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    { ?>
<?php 
     /*-----------------------------------table 1---------------------------*/
    include_once('attendance_salary_ptable1_for_include.php'); /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>
<!----------------------------------------Advance/Remaining Paid button box--------------------------->
<?php  
         $id=$_GET['attendance_salary_id'];  /*--here record['0'] and $id is same---*/
         ?>

<div class="time_button" style="background:#2ecc71;height:160px;">
        <?php 
echo "<h2 style='font-size:17px;color:#fff;margin:20px;'>*If you have paid Advance/Remaining to $result[2] $result[3] today ($date), Then Enter Paid Amount and click on Button</h2>"
    ?>
 <!--------- button----------->
        <form action="" method="post" name="logon3" submit="return validate(true)" style="margin:10px;">
            
            <div style="width:30%;float:left;">
             <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Remark  : </h5> 
            <input type="text" name="remark" placeholder=" Remark for Memory" value="Remaining Paid" maxlength="40" required style='width:275px;border-radius:5px;height:40px;font-weight:700;text-align:center;'>
                </div>
            
            <div style="width:23%;float:left;">
            <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Advance/Remaining Money: </h5> 
            <input type="text" pattern="\d*" name="advance_remaining" placeholder=" Advance/Remaining" value="0" maxlength="20" required style='border-radius:5px;height:40px;font-weight:700;text-align:center;'>
            </div>
            
            
            <button type="submit" name="advance_remaining_paid_button" style="width:160px;margin:5px;padding:5px;float:left;"><img src="images/pay.png" alt="present"> Add Advance/Remaining Paid Entry</button>
        </form>
        <?php   if(isset($_POST['advance_remaining_paid_button'])){ 
$employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
       $full_name=$result['2'].' '.$result['3'];
    $emp_code=$result['1'];
    $remark=$_POST['remark'];
     $advance_remainning_paid=$_POST['advance_remaining'];
$login_query="insert into employee_advance_remaining_recored values (null,'$date','$employee_profile_s_no_id','$full_name','$emp_code','$remark','$advance_remainning_paid')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Record has been recorded successfully.')</script>";
    echo "<script>window.location.assign('admin_index.php?advance_remaining_paid_recored&user=$session_name&attendance_salary_id=$id')</script>";  /*--here result['0'] and $id is same---*/
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?advance_remaining_paid_recored&user=$session_name&attendance_salary_id=$id ')</script>";  /*--here result['0'] and $id is same---*/
     }  
           
 
            }
        ?>
       
    </div>


<!-------------------end of Advance/Remaining Paid button------------------------------>

 <!-----------------------Advance/remining salary paid table------------->
<div class="advance_remining_paid" style="margin:30px;">
<table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>Paid Date</th>
            <th>Employee Profile Id</th>
            <th>Name</th>
            <th>Employee Code</th>
            <th>Remark</th>
            <th>Advance/Remaining Paid Money</th>
        </tr>
        <?php
$query="select * from employee_advance_remaining_recored where employee_profile_s_no_id 
='$id' order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    {
echo "<tr><td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td>".$result['2']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td style='font-weight:800;color:green;'>".$result['6']."</td></tr>";
        ?>

   <?php } ?>
    </table>
</div> 
<!------------------end of Advance/reamining salary paid table------------->


    <?php } ?>