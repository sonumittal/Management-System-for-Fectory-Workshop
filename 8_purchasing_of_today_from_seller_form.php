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
        $id=$_GET['purchase_id'];
?>
<div class="cotent_box">
 <?php    /*-----------------------------------table 1---------------------------*/
    include_once('7_purchaing_from_seller_table1_for_include.php');   /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>

<!-----------------------------purchasing form filling up-------------------------------->

        <div id="form" style="margin:40px;padding:30px;">
                <?php    echo "<h3 style='margin:0px;'> Purchasing of Today ($date)</h3>" ?>
        <form action="" method="post" name="logon4" submit="return validate(true)" style="margin:10px;">
            
             <span><h3>*Goods Name :</h3></span>
                <input type="text" name="goods_name" placeholder="Goods Name" value="Raw Tea"  maxlength="40" required style="text-align:center">
            
               <span><h3>*How Many Kilogram(kg) : </h3></span>
                <input type="text" name="how_many_kg" pattern="\d*" placeholder=" How Many Kilogram Goods" maxlength="40" required style="text-align:center">
            
               <span><h3>*Rate Per Kilogram(kg) : </h3></span>
                <input type="text" name="rate_per_kg" pattern="\d*" placeholder=" Rate/kg" maxlength="40" required style="text-align:center">
                
            
               <span><h3>*Quality Percent of Goods : </h3></span>
                <input type="text" name="quality_percent" placeholder=" Quality Percent of Goods" maxlength="40" required style="text-align:center"> 
            
            <span><h3>*Paid Money at Purchasing Time : </h3></span>
                <input type="text" name="paid_money_at_purchasing_time_to_seller" pattern="\d*" placeholder=" Paid Money at Purchasing Time" maxlength="40" value="0" required style="text-align:center">
            
               <span><h3>*Remark : </h3></span>
                <input type="text" name="remark" value="Tea Purchasing" placeholder=" Remark" maxlength="40" required style="text-align:center">
            
            <input style="background:#fff;cursor:pointer;margin-top:30px;font-weight:700;" id="submit" type="submit" value="Click" name="purchasing_button">
            
        </form>
        </div>
        <?php   if(isset($_POST['purchasing_button'])){
         $seller_profile_s_no_id=$result['0']; /*--here result['0'] and $id is same---*/
                $full_name=$result['2'].' '.$result['3'];
    $seller_code=$result['1'];
   $company_factory_other_name=$result['6'];
        $goods_name=$_POST['goods_name'];
        $goods_in_unit=$_POST['how_many_kg'];
        $rate=$_POST['rate_per_kg'];
        $total_money_of_purchase=$goods_in_unit* $rate;
        $quality_percent_of_goods=$_POST['quality_percent'];
        $paid_money_at_purchasing_time=$_POST['paid_money_at_purchasing_time_to_seller'];
        $remark=$_POST['remark'];
    $user=$_SESSION['logged'];
    $login_query="insert into purchaing_from_seller values (null,'$date','$seller_profile_s_no_id','$full_name','$seller_code','$company_factory_other_name','$goods_name','$goods_in_unit','$rate','$total_money_of_purchase','$quality_percent_of_goods','$paid_money_at_purchasing_time','$remark')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
    echo "<script>alert('Purchasing Entry is Recorded successfully.')</script>";
echo "<script>window.location.assign('admin_index.php?purchasing_from_seller&user=$session_name&purchase_id=$seller_profile_s_no_id')</script>";
}
else
     {
         echo "<script>alert('Something went wrong, Please try again')</script>";
    echo "<script>window.location.assign('admin_index.php?purchasing_of_today_from_seller_form&user=$session_name&purchase_id=$seller_profile_s_no_id')</script>";
  } 
       } ?>
        
<!---------------------------end of purchasing form filling up---------------------------->

    
    </div>
    <?php } ?>