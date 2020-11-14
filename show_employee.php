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
?>
       <div class="cotent_box">
    <!---form---->
<table border="1" class="show_table" width="83%">
 <tr height="50px" ><th>
S no.</th><th>Employee Id</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Age</th><th>Contact no</th><th>Full Address</th><th>Experience</th><th>Joining Date</th><th>Action</th></tr>
<?php
    $query="select * from employee_profile order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row)){
        $id=$result['0'];
echo "<tr><td>".$result['0']."</td>";
echo "<td>".$result['1']."</td>";
echo "<td>".$result['2']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td>".$result['7']."</td>";
echo "<td>".$result['8']."</td>";
echo "<td>".$result['9']."</td>";
        ?>
     <td><a href='admin_index.php?attendance_salary&user=<?php echo $session_name ?>&attendance_salary_id=<?php echo $result['0'] ?>'><button name="salary" style="background:green;color:#fff;margin:0px;">Attendance &amp; salary</button></a>
        
        <a href='admin_index.php?update_form_employee&user=<?php echo $session_name ?>&update_id=<?php echo $result['0'] ?>'><button name="edit" style="background:#4b4b4b;color:#fff;margin:0px;">Edit Profile Details</button></a>
        
         <a href='admin_index.php?delete_employee&user=<?php echo $session_name ?>&delete_id=<?php echo $result['0'] ?>'> <button name="delete" style="background:red;color:#fff;margin:0px;"><img src="images/delete.png" alt="delete">Delete This emplyee Details</button></a>
        <!---confirm by message---->
        
        <!----end of confirm---->
  </td>
    </tr>
           <?php
    }
    ?>
         </table>
</div>
<?php } ?>