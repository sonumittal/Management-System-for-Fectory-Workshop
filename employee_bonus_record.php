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
<!----------------------------------------Bonus Paid button box--------------------------->
<?php  
         $id=$_GET['attendance_salary_id'];  /*--here record['0'] and $id is same---*/
         ?>

<div class="time_button" style="background:#2ecc71;height:160px;">
        <?php 
echo "<h2 style='font-size:17px;color:#fff;margin:20px;'>*If you have paid Bonus to $result[2] $result[3] today ($date), Then Enter Paid Bonus Amount and click on Button</h2>"
    ?>
 <!--------- button----------->
        <form action="" method="post" name="logon3" submit="return validate(true)" style="margin:10px;">
            
            <div style="width:30%;float:left;">
             <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Remark  : </h5> 
            <input type="text" name="remark" placeholder=" Remark for Memory" value="Bonus" maxlength="40" required style='width:275px;border-radius:5px;height:40px;font-weight:700;text-align:center;'>
                </div>
            
            <div style="width:23%;float:left;">
            <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Bonus Money: </h5> 
            <input type="text" pattern="\d*" name="bonus_paid" placeholder=" Bonus Amount" value="0" maxlength="20" required style='border-radius:5px;height:40px;font-weight:700;text-align:center;'>
            </div>
            
            
            <button type="submit" name="bonus_paid_button" style="width:160px;margin:5px;padding:5px;float:left;"><img src="images/bonus.png" alt="Bonus"> Bonus Paid Entry</button>
        </form>
        <?php   if(isset($_POST['bonus_paid_button'])){ 
$employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
       $full_name=$result['2'].' '.$result['3'];
    $emp_code=$result['1'];
    $remark=$_POST['remark'];
     $bonus_paid=$_POST['bonus_paid'];
$login_query="insert into employee_bonus_record values (null,'$date','$employee_profile_s_no_id','$full_name','$emp_code','$remark','$bonus_paid')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Record has been recorded successfully.')</script>";
    echo "<script>window.location.assign('admin_index.php?employee_bonus_record&user=$session_name&attendance_salary_id=$id')</script>";  /*--here result['0'] and $id is same---*/
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?employee_bonus_record&user=$session_name&attendance_salary_id=$id ')</script>";  /*--here result['0'] and $id is same---*/
     }  
           
 
            }
        ?>
       
    </div>


<!-------------------end ofBonus Paid button------------------------------>

 <!-----------------------bonus paid table------------->
<div class="advance_remining_paid" style="margin:30px;">
<table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>S No.</th>
            <th>Paid Date</th>
            <th>Employee Profile Id</th>
            <th>Name</th>
            <th>Employee Code</th>
            <th>Remark</th>
            <th>Paid Bonus Amount</th>
        </tr>
        <?php
        $sr_no=0;
$query="select * from employee_bonus_record where employee_profile_s_no_id 
='$id' order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    {$sr_no=$sr_no+1;
echo "<tr><td>".$sr_no."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td>".$result['2']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td style='font-weight:800;color:green;'>".$result['6']."</td></tr>";
        ?>

   <?php } ?>
    </table>
     <h5 style="color:red;">Note: Paid Bonus Money Record is not included in the Remaining Total To be Paid(Including Today's Salary) Column Because, it is Bonus :)</h5>
</div> 
<!------------------end of bonus paid table------------->


    <?php } ?>