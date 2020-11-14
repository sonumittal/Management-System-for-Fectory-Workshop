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
    
    
    
    
    <!------------- print_seller_record_by_id  button------------>
         <a href='admin_index.php?print_seller_record_by_id&user=<?php echo $session_name ?>&purchase_id=<?php echo $id ?>'> <button name='form_seller' style='float:right;margin:10px;'><img src='images/print.png' alt='form' style='display:block;margin-left:43px;'>Print this Seller Records</button></a>
     <!-------------end of print_seller_record_by_id  button------------>
    
       <!-------------add advance/remainaing paid to seller button------------>
         <a href='admin_index.php?advance_remaining_paid_to_seller_record&user=<?php echo $session_name ?>&purchase_id=<?php echo $id ?>'> <button name='form_seller' style='float:right;margin:10px;'><img src='images/pay.png' alt='form' style='display:block;margin-left:43px;'>Advance/Remaing Paid to Seller</button></a>
     <!-------------end of add advance/remainaing paid to seller button------------>
    
     <!-------------purchasing_of_today_from_seller_form  button------------>
         <a href='admin_index.php?purchasing_of_today_from_seller_form&user=<?php echo $session_name ?>&purchase_id=<?php echo $id ?>'> <button name='form_seller' style='float:right;margin:10px;'><img src='images/p.png' alt='form' style='display:block;margin-left:43px;'>Add Purchasing from Seller Entry</button></a>
     <!-------------end ofpurchasing_of_today_from_seller_form  button------------>
    
<?php 
     /*-----------------------------------table 1---------------------------*/
    include_once('7_purchaing_from_seller_table1_for_include.php');   /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
    ?>


    
    <!-----------------------------------------table 2------------------------------->
    <table border="1" class="show_table" width="83%" style="margin-top:40px;">
        <tr height="50px">
            <th>Purchasing Date</th>
             <th>Seller Id</th>
            <th>Seller Name</th>
            <th>Compeny/Factory/Other Name</th>
            <th>Goods Name</th>
            <th>Quality Persent of Goods</th>
            <th>Goods in Unit</th>
            <th>Rate Per Unit</th>
                <th>Remark</th>
            <th>Total of Purchasing</th>
            <th>paid Money at Purchasing Time</th>
            <th>Remaining Total to be Paid After Dividing</th>
        </tr>
        <?php
$query="select * from purchaing_from_seller where seller_profile_s_no_id='$id' order by id desc";
    $row=mysqli_query($connection,$query);
   while($result=mysqli_fetch_array($row)){
        $id=$result['0'];
       $remaining_total_to_be_paid=$result['9']-$result['11'];
echo "<td>".$result['1']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td>".$result['10']."</td>";
echo "<td>".$result['7']."</td>";
echo "<td>".$result['8']."</td>";
 echo "<td>".$result['12']."</td>";
echo "<td style='font-weight:700;color:#000;'>".$result['9']."</td>";
echo "<td style='font-weight:700;color:#000;'>".$result['11']."</td>";
     if($remaining_total_to_be_paid===0)
       {
echo "<td>".$remaining_total_to_be_paid."</td></tr>";
       }
       else
       {
    echo "<td style='font-weight:800;color:#000;'>".$remaining_total_to_be_paid."</td></tr>";
       } 

       }
        ?>
    </table>
    <!--------------------end of table 2------------------------------------->

</div>
<?php } ?>