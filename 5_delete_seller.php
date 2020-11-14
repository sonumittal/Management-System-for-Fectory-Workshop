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
            $query1="delete from advance_remaining_paid_to_seller_record where seller_profile_s_no_id='$delete_id'";
             
              $query2="delete from purchaing_from_seller where seller_profile_s_no_id='$delete_id'";
             
         if(mysqli_query($connection,$query1) AND mysqli_query($connection,$query2)){
            $query3="delete from seller_profile where id='$delete_id'";
            if(mysqli_query($connection,$query3)){
                  echo "<script>alert('Seller Profile has been deleted successfully...')</script>";
                 echo "<script>window.location.assign('admin_index.php?show_seller&user=$session_name')</script>";
            }
            else
            {
 echo "<script>alert('Something went wrong!!')</script>";
            header('location:admin_index.php?show_seller&user=$session_name');
            }
      }
              else
            {
 echo "<script>alert('Something went wrong with deleting purchaing_from_seller table data or advance_remaining_paid_to_seller_record table data.')</script>";
            header('location:admin_index.php?show_seller&user=$session_name');
            }
            }
    }
        ?>
