    <?php
 include_once('connection.php');
    if(!isset($_SESSION['logged'])&&$_SEESION['logged2']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    { 
        
        $id=$_GET['purchase_id'];
     /*-----------------------------------table 1---------------------------*/
    include_once('7_purchaing_from_seller_table1_for_include.php');   /*<-------all result[] sre from here for this page---*/
     /*-----------------------end of table 1-----------------------------------*/
        
    ?>
<!----------------------------------------print button box--------------------------->


<div class="time_button" style="background:#DDDDDD;height:100px;width:700px;margin-top:80px;">
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
<table border="1" class="show_table" width="83%" style="margin-bottom:20px;">
        <tr height="50px"><th>S No.</th>
             <th>Seller Id</th>
            <th>Seller Name</th>
            <th>Compeny/Factory/Other Name</th>
            <th>Goods Name</th>
            <th>Remark</th>
             <th>Quality Persent of Goods</th>
               <th>Purchasing Date</th>
            <th>Goods in Unit</th>
            <th>Rate Per Unit</th>
            <th>Total of Purchasing</th>
            <th>paid Money at Purchasing Time</th>
            <th>Remaining to be Paid</th>
        </tr>
        <?php
         $s_no=1;
        $goods_in_unit_total=0;
$query="select * from purchaing_from_seller where seller_profile_s_no_id='$id' AND date BETWEEN '$from_date' AND '$to_date' order by id desc";
    $row=mysqli_query($connection,$query);
   while($result=mysqli_fetch_array($row)){
        $id=$result['0'];
       $remaining_total_to_be_paid=$result['9']-$result['11'];
echo "<td>".$s_no."</td>"; $s_no=$s_no+1;
echo "<td>".$result['4']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
        echo "<td>".$result['12']."</td>";
       echo "<td>".$result['10']."</td>";
        echo "<td style='font-weight:700;color:#000;'>".$result['1']."</td>";
echo "<td style='font-weight:700;color:#000;'>".$result['7']."</td>"; 
echo "<td style='font-weight:700;color:#000;'>".$result['8']."</td>";
echo "<td>".$result['9']."</td>";
echo "<td>".$result['11']."</td>";
echo "<td>". $remaining_total_to_be_paid."</td></tr>";
       $goods_in_unit_total=$goods_in_unit_total+$result['7'];
       }
    ?> 
    </table> 
   <center><h3>Sum of Goods in Unit According to Date : <?php echo "$goods_in_unit_total"; ?></h3></center> 
        </div>
<!---------------------------end of table 2------------------------------>
<hr style="color:#000;">
<!---------------------------table 3------------------------------>
<table border="1" class="show_table" width="83%" style="margin-top:50px;">
        <tr height="50px">
        <th>S No.</th>
             <th>Seller Id</th>
            <th>Seller Name</th>
            <th>Compeny/Factory/Other Name</th>
             <th>Remark</th>
            <th>Date</th>
            <th>Advance/Remaining Paid</th>
        </tr>
  <?php   
          $id=$_GET['purchase_id'];
        $s_no=0;
$query="select * from advance_remaining_paid_to_seller_record where seller_profile_s_no_id='$id' AND paid_date BETWEEN '$from_date' AND '$to_date' order by id desc";
    $row=mysqli_query($connection,$query);
    while($result=mysqli_fetch_array($row))
    { $s_no=$s_no+1;
echo "<tr><td>".$s_no."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['1']."</td>";
echo "<td style='font-weight:800;color:#000;'>".$result['7']."</td>";
        ?>
   <?php  } ?> 
    </table>
    </div>
    
<!---------------------------end of table 3------------------------------>
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