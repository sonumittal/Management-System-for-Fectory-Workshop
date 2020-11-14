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

    <?php  
        
         if(isset($_GET['delete_id'])){
            $delete_id=$_GET['delete_id'];
             $query1="delete from employee_attendance_salary where employee_profile_s_no_id='$delete_id'";
             
              $query2="delete from employee_advance_remaining_recored where employee_profile_s_no_id='$delete_id'";
             
             if(mysqli_query($connection,$query1) AND mysqli_query($connection,$query2)){
            $query3="delete from employee_profile where id='$delete_id'";
            if(mysqli_query($connection,$query3)){
                  echo "<script>alert('Employee details has been deleted successfully...')</script>";
                 echo "<script>window.location.assign('admin_index.php?show_employee&user=$session_name')</script>";
            }
            else
            {
 echo "<script>alert('Something went wrong!!')</script>";
            header('location:admin_index.php?show_employee&user=$session_name');
            }
        }
              else
            {
 echo "<script>alert('Something went wrong with deleting employee_attendance_salary table data or employee_advance_remaining_recored table data.')</script>";
            header('location:admin_index.php?show_employee&user=$session_name');
            }
            }
    }
        ?>
