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
            <th>S no.</th>
            <th>Seller Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Compeny/Factpry/Other Name</th>
            <th>Contact no</th>
            <th>Remaining Total To be Paid(Including Today's Purchasing)<th>
        </tr>
        <?php
        $id=$_GET['purchase_id'];
$query="select * from seller_profile where id='$id'";
    $row=mysqli_query($connection,$query);
    $result=mysqli_fetch_array($row);
echo "<tr><td>".$result['0']."</td>";
echo "<td>".$result['1']."</td>";
echo "<td>".$result['2']."</td>";
echo "<td>".$result['3']."</td>";
echo "<td>".$result['4']."</td>";
echo "<td>".$result['5']."</td>";
echo "<td>".$result['6']."</td>";
echo "<td>".$result['7']."</td>";
    /*-------counting Total of remaining to paid to the seller-----------------*/
          /*-------counting Total of advance/remaining paid and paid salary and dividing and update final salary-----------------*/
     $remaining_total=0;
     $query="select * from purchaing_from_seller where seller_profile_s_no_id='$id'";
    $row=mysqli_query($connection,$query);
    while($record1=mysqli_fetch_array($row))
    {
        $remaining_total=$remaining_total+($record1['9']-$record1['11']);
    }
        
         $advance_remaining_paid_total=0;
     $query="select * from advance_remaining_paid_to_seller_record where seller_profile_s_no_id='$id'";
    $row=mysqli_query($connection,$query);
    while($record1=mysqli_fetch_array($row))
    {
        $advance_remaining_paid_total=$advance_remaining_paid_total+$record1['7'];
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
/*-------end of counting Total of advance/remaining paid to the seller and paid salary and dividing and update final to be paid-----------------*/ 
        ?>
    </table>
    <!---------------------end of table 1----------------------------------------------->
    <?php } ?>