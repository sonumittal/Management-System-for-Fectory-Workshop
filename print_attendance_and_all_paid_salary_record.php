    <?php
 include_once('connection.php');
    if(!isset($_SESSION['logged'])&&$_SEESION['logged2']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    { 
     /*-----------------------------------table 1---------------------------*/
    include_once('attendance_salary_ptable1_for_include.php'); /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>
<!----------------------------------------print button box--------------------------->
<?php  
         $id=$_GET['attendance_salary_id'];  /*--here record['0'] and $id is same---*/
         ?>

<div class="time_button" style="background:#DDDDDD;height:115px;width:700px;">
 <!--------- button----------->
        <form action="" method="post" name="logon4" submit="return validate(true)" style="margin:10px;">
            
            <div style="width:30%;float:left;padding:20px">
             <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*From : </h5> 
            <input type="date" name="from_date" required style='border-radius:5px;height:40px;font-weight:700;text-align:center;'>
                </div>
            
            <div style="width:30%;float:left;padding:20px">
            <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*To: </h5> 
            <input type="date" name="to_date" required style='border-radius:5px;height:40px;font-weight:700;text-align:center;'>
            </div>
            
            
            <button type="submit" name="print_button" style="width:160px;margin:5px;padding:25px;float:left;font-weight: 800;">GET</button>
        </form>
    </div>

<!-------------------end of print button------------------------------>




<!---------------------------table 2------------------------------>
<?php   if(isset($_POST['print_button'])){
  $from_date=$_POST['from_date'];
     $to_date=$_POST['to_date'];
?>
<div class="advance_remining_paid" style="margin:40px;">
        <div style="background:#81ecec;">
<table border="1" class="show_table" width="83%" style="margin-bottom:60px;">
        <tr height="50px">
            <th>S No.</th>
            <th>Date</th>
            <th>Name</th>
            <th>Employee Id</th>
            <th>Attendance Status</th>
            <th>One Day Salary</th>
            <th>Paid/Unpaid Status</th>
        </tr>
  <?php   
             $s_no=0;
$employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
$query="select * from employee_attendance_salary where employee_profile_s_no_id='$id' AND date BETWEEN '$from_date' AND '$to_date' order by date_record_id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    { $s_no=$s_no+1;
        echo "<tr><td>".$s_no."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
        if($result['5']==='Present')
       {
          echo "<td style='font-weight:700;color:green;'>".$result['5']."</td> ";  
       }
       else
       {
    echo "<td style='font-weight:700;color:red;'>".$result['5']."</td> ";  
       } 
        
        
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
   <?php  } ?> 
    </table> 
    </div>
<!---------------------------end of table 2------------------------------>

<!---------------------------table 3------------------------------>

<table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>S No.</th>
            <th>Date</th>
            <th>Name</th>
            <th>Employee Id</th>
            <th>Advance/Remaining Paid</th>
            <th>Remark</th>
        </tr>
  <?php    
              $s_no=0;
$employee_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
$query="select * from employee_advance_remaining_recored where employee_profile_s_no_id='$id' AND paid_date BETWEEN '$from_date' AND '$to_date' order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    { $s_no=$s_no+1;
        echo "<tr><td>".$s_no."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td>".$result['5']."</td>";
        ?>
   <?php  } ?> 
    </table>
<!---------------------------end of table 3------------------------------>

<!---------------------------table 4------------------------------>

<!-----------------------bonus paid table------------->
<table border="1" class="show_table" width="83%" style="margin-top:60px;">
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
='$id' AND paid_date BETWEEN '$from_date' AND '$to_date' order by id desc";
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
<!---------------------------end of table 4------------------------------>


<div style=" display: table;
   margin: 0 auto"><a href="javascript:void(0);" onclick="printPage();" style="float:right;"><button type="submit" name="print_button" style="width:160px;margin:5px;padding:25px;float:left;font-weight: 800;"><img src="images/print.png" alt="print"></button></a></div>

     <script type="text/javascript">
     function printPage(){
            var tableData = '<table border="1">'+document.getElementsByClassName('advance_remining_paid')[0].innerHTML+'</table>';
            var data = '<button onclick="window.print()">Print this page</button>'+tableData;       
            myWindow=window.open('','','width=800,height=600');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        };
     </script>
 <?php } } ?>