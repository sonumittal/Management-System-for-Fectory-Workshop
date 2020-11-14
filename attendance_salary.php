<?php
 include_once('connection.php');
    if(!isset($_SESSION['logged'])&&$_SEESION['logged2']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    {

        $user=$_GET['user'];
          $session_name=$_SESSION['logged'];
        $id=$_GET['attendance_salary_id'];
?>
<div class="cotent_box">
    
    <!-------------print attendance and salary record  button------------>
         <a href='admin_index.php?print_attendance_and_all_paid_salary_record&user=<?php echo $session_name ?>&attendance_salary_id=<?php echo $id ?>'> <button name='form_employee' style='float:right;margin:10px;'><img src='images/print.png' alt='form' style='display:block;margin-left:43px;'>Print Attendance/Paid Salary/Bonus Record</button></a>
     <!-------------end of print attendance and salary record  button------------>
    
       <!-------------add advance/remainaing salary paid  button------------>
         <a href='admin_index.php?advance_remaining_paid_recored&user=<?php echo $session_name ?>&attendance_salary_id=<?php echo $id ?>'> <button name='form_employee' style='float:right;margin:10px;'><img src='images/pay.png' alt='form' style='display:block;margin-left:43px;'>Advance/Remaing Paid</button></a>
     <!-------------end of add advance/remainaing salary paid  button------------>
    
    <!-------------Bonus  button------------>
         <a href='admin_index.php?employee_bonus_record&user=<?php echo $session_name ?>&attendance_salary_id=<?php echo $id ?>'> <button name='form_employee' style='float:right;margin:10px;'><img src='images/bonus.png' alt='form' style='display:block;margin-left:43px;'>Bonus</button></a>
     <!-------------end of Bonus  button------------>
    
<?php 
     /*-----------------------------------table 1---------------------------*/
    include_once('attendance_salary_ptable1_for_include.php');   /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>

<!-----------------------------present/absent button working-------------------------->
    <div class="time_button">
        <?php 
echo "<h3 style='float:left;'>Today ($date) $result[2] $result[3] with Employee Id $result[1] is </h3>"
    ?>
        <!--------------present button----------------------->
        <form action="" method="post" name="logon1" submit="return validate(true)">
            <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Enter Salary for Today : </h5> 
            <input type="text" pattern="\d*" name="one_day_salary" placeholder=" One Day Salary" value="500" maxlength="20" required style='width:150px;border-radius:3px;text-align:center;'>
            <button type="submit" name="present_button"><img src="images/right.png" alt="present">Present</button>
            <!-----------------Absante---------------------->
            <button type="submit" name="absent_button"><img src="images/wrong.png" alt="absent"> Absent</button>
        </form>
        <!--------present button data------------->
        <?php   if(isset($_POST['present_button'])){
         $employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
         
         /*---checking employee attendance if already recorded---*/
              $login_query="select * from employee_attendance_salary where employee_profile_s_no_id='$employee_profile_s_no_id' AND date='$date'"; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    {
          echo "<script>alert('Please check Table, This Employee Attendance is already Recorded for Today.')</script>";
          echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
        }
        else
        {
                $full_name=$result['2'].' '.$result['3'];
    $emp_code=$result['1'];
     $attendance='Present';
     $one_day_salary=$_POST['one_day_salary'];
    $paid_unpaid='Unpaid';
    $user=$_SESSION['logged'];
    $login_query="insert into employee_attendance_salary values (null,'$date','$employee_profile_s_no_id','$full_name','$emp_code','$attendance','$one_day_salary','$paid_unpaid')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
    echo "<script>alert('Attentance is Recorded successfully.')</script>";
        echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
}
else
     {
         echo "<script>alert('Something went wrong, Please try again')</script>";
    echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
  } 
           
        }
        
 
            }
        /*--------------end of present button data-----------------------*/
        
        /*--------------absent button data-----------------------*/
         if(isset($_POST['absent_button'])){
            $employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
         
         /*---checking employee attendance if already recorded---*/
              $login_query="select * from employee_attendance_salary where employee_profile_s_no_id='$employee_profile_s_no_id' AND date='$date'"; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    {
          echo "<script>alert('Please check Table, This Employee Attendance is already Recorded for Today.')</script>";
          echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
        }
        else
        {
    $full_name=$result['2'].' '.$result['3'];
    $emp_code=$result['1'];
     $attendance='Absent';
     $one_day_salary=$_POST['one_day_salary'];
    $paid_unpaid='Unpaid';
    $user=$_SESSION['logged'];
    $login_query="insert into employee_attendance_salary values (null,'$date','$employee_profile_s_no_id','$full_name','$emp_code','$attendance','$one_day_salary','$paid_unpaid')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
    echo "<script>alert('Attentance is Recorded successfully.')</script>";
        echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
}
else
     {
         echo "<script>alert('Something went wrong, Please try again')</script>";
    echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
  } 
            }
         }?>
        <!--------------end of absent button data----------------------->
    </div>
<!--------------------end of present/absent button working---------------------------->





<!----------------------------------------paid/unpaid button--------------------------->
<?php  
  /*-----checking employee present/absent status for hiding paid button box if status isabsent --------*/
        $employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
        
              $login_query="select * from employee_attendance_salary where employee_profile_s_no_id='$employee_profile_s_no_id' AND date='$date' AND attendance='Present'"; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    { ?>
        

<div class="time_button" style="background:#2ecc71;">
        <?php 
echo "<h2 style='float:left;font-size:17px;color:red;line-height:80px;'>*If you have paid $result[2] $result[3] today ($date), Then record it by clicking on the paid button</h2>"
    ?>
 <!---------paid button----------->
        <form action="" method="post" name="logon2" submit="return validate(true)">
            <button type="submit" name="paid_button" style="width:120px;height:75px;"><img src="images/pay.png" alt="present"> Paid</button>
        </form>
        <?php   if(isset($_POST['paid_button'])){
             $employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
        
         $paid_unpaid_salary='Paid';
         /*---checking employee paid statuse if already recorded---*/
              $login_query="select * from employee_attendance_salary where employee_profile_s_no_id='$employee_profile_s_no_id' AND date='$date' AND paid_unpaid_salary='$paid_unpaid_salary'"; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    {
          echo "<script>alert('This Employee is already paid Today.')</script>";
          echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
        }
        else
        {
        $login_query="update employee_attendance_salary set paid_unpaid_salary='Paid' where employee_profile_s_no_id='$employee_profile_s_no_id' AND date='$date'"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
    echo "<script>alert('Paid Status is Recorded successfully.')</script>";
        echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
}
else
     {
         echo "<script>alert('Something went wrong, Please try again')</script>";
    echo "<script>window.location.assign('admin_index.php?attendance_salary&user=$session_name&attendance_salary_id=$employee_profile_s_no_id')</script>";
  } 
           
        }
        
 
            }
        ?>
       
    </div>

   <?php  }
        else
        {
             
        }
?>


<!------------------------------end of paid/unpaid button------------------------------>

    <!-----------------------------------------table 2------------------------------->
    <table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>
                Attendance Date</th>
            <th>Attendance Status</th>
            <th>Employee Id</th>
            <th>Name</th>
            <th>One Day Salary</th>
            <th>Paid/Unpaid Status</th>
        </tr>
        <?php
$query="select * from employee_attendance_salary where employee_profile_s_no_id='$id' order by date_record_id desc";
    $row=mysqli_query($connection,$query);
   while($result=mysqli_fetch_array($row)){
        $id=$result['0'];
echo "<tr><td style='font-weight:800;color:#000;'>".$result['1']."</td>";
    if($result['5']==='Absent')
       {
echo "<td style='font-weight:700;color:red;'>".$result['5']."</td>";
       }
       else
       {
    echo "<td style='font-weight:700;color:green;'>".$result['5']."</td>";  
       }
echo "<td>".$result['4']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['6']."</td>";
           if($result['7']==='Unpaid' AND $result['5']==='Present')
       {
echo "<td style='font-weight:700;color:red;'>".$result['7']."</td>";
       }
       else if($result['7']==='Unpaid' AND $result['5']==='Absent')
       {
           echo "<td>".$result['5']."</td>";
       }
       else
       {
    echo "<td style='font-weight:700;color:green;'>".$result['7']."</td> </tr> ";  
       } 
        ?>
       <?php } ?>
    </table>
    <!--------------------end of table 2------------------------------------->

</div>
<?php } ?>