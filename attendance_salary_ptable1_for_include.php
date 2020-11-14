    <?php
 include_once('connection.php');
    if(!isset($_SESSION['logged'])&&$_SEESION['logged2']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    { ?>
    <!-----------------------table 1--------------------------->
    <table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>
                S no.</th>
            <th>Employee Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Contact no</th>
            <th>Joining Date</th>
            <th>Remaining Total To be Paid(Including Today's Salary)<th>
        </tr>
        <?php
        $id=$_GET['attendance_salary_id'];
$query="select * from employee_profile where id='$id'";
    $row=mysqli_query($connection,$query);
    $result=mysqli_fetch_array($row);
echo "<tr><td>".$result['0']."</td>";
echo "<td>".$result['1']."</td>";
echo "<td>".$result['2']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td>".$result['9']."</td>";
    /*-------counting Total of remaining salary fo employee-----------------*/
          /*-------counting Total of advance/remaining paid and paid salary and dividing and update final salary-----------------*/
        $remaining_total=0;
     $query="select * from employee_attendance_salary where employee_profile_s_no_id='$id' AND attendance='Present' AND paid_unpaid_salary='Unpaid'";
    $row=mysqli_query($connection,$query);
    while($record1=mysqli_fetch_array($row))
    {
        $remaining_total=$remaining_total+$record1['6'];
    }
        
         $advance_remaining_paid_total=0;
     $query="select * from employee_advance_remaining_recored where employee_profile_s_no_id='$id'";
    $row=mysqli_query($connection,$query);
    while($record1=mysqli_fetch_array($row))
    {
        $advance_remaining_paid_total=$advance_remaining_paid_total+$record1['6'];
    }
$remaining_total=$remaining_total-$advance_remaining_paid_total;
            if($remaining_total<0)
       {
echo "<td style='font-weight:800;color:red;'>$remaining_total</td>";
       }
        else if($remaining_total===0)
       {
echo "<td>$remaining_total</td>";
       }
       else
       {
    echo "<td style='font-weight:800;color:#000;'>".$remaining_total."</td></tr>";  
       }
/*-------end of counting Total of advance/remaining paid and paid salary and dividing and update final salary-----------------*/ 
        ?>
    </table>
    <!---------------------end of table 1----------------------------------------------->
    <?php } ?>