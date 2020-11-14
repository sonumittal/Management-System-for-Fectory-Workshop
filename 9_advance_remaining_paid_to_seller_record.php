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
 include_once('7_purchaing_from_seller_table1_for_include.php'); /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>
<!-------------------advance_remaining_paid_to_seller_record button box---------------------->
<?php  
         $id=$_GET['purchase_id'];  /*--here record['0'] and $id is same---*/
         ?>

<div class="time_button" style="background:#2ecc71;height:105px;">
 <!--------- button----------->
        <form action="" method="post" name="logon3" submit="return validate(true)" style="margin:10px;">
            
            <div style="width:30%;float:left;">
             <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Remark  : </h5> 
            <input type="text" name="remark" placeholder=" Remark for Memory" value="Remaining Paid" maxlength="40" required style='width:275px;border-radius:5px;height:40px;font-weight:700;text-align:center;'>
                </div>
            
            <div style="width:23%;float:left;">
            <h5 style="color:#fff;display:inline-block;margin:0px;padding:0px;">*Advance/Remaining Money to Seller : </h5> 
            <input type="text" pattern="\d*" name="advance_remaining" placeholder=" Advance/Remaining" value="0" maxlength="30" required style='border-radius:5px;height:40px;font-weight:700;text-align:center;'>
            </div>
            
            
            <button type="submit" name="advance_remaining_paid_button" style="width:160px;margin:5px;padding:5px;float:left;"><img src="images/pay.png" alt="present"> Advance/Remaining Paid to Seller</button>
        </form>
        <?php   if(isset($_POST['advance_remaining_paid_button'])){ 
$seller_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
       $full_name=$result['2'].' '.$result['3'];
    $seller_code=$result['1'];
    $compeny_factory_other_name=$result['6'];
    $remark=$_POST['remark'];
     $advance_remainning_paid=$_POST['advance_remaining'];
$login_query="insert into advance_remaining_paid_to_seller_record values (null,'$date','$seller_profile_s_no_id','$full_name','$seller_code','$compeny_factory_other_name','$remark','$advance_remainning_paid')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Record has been recorded successfully.')</script>";
echo "<script>window.location.assign('admin_index.php?advance_remaining_paid_to_seller_record&user=$session_name&purchase_id=$id')</script>";  /*--here result['0'] and $id is same---*/
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?advance_remaining_paid_to_seller_record&user=$session_name&purchase_id=$id')</script>";  /*--here result['0'] and $id is same---*/
     }  
           
 
            }
        ?>
       
    </div>


<!-------------------end of advance_remaining_paid_to_seller_record button----------------->

 <!-----------------------advance_remaining_paid_to_seller_record table-------------------->
<div class="advance_remining_paid" style="margin:30px;">
<table border="1" class="show_table" width="83%">
        <tr height="50px">
            <th>Paid Date</th>
            <th>Seller Code</th>
            <th>Name</th>
            <th>Company/Factory/Other Name</th>
            <th>Remark</th>
            <th>Advance/Remaining Paid to Seller</th>
        </tr>
        <?php
$query="select * from advance_remaining_paid_to_seller_record where seller_profile_s_no_id 
='$id' order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    {
echo "<tr><td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['7']."</td></tr>";
        ?>

   <?php } ?>
    </table>
</div> 
<!------------------end of advance_remaining_paid_to_seller_record table------------->


    <?php } ?>