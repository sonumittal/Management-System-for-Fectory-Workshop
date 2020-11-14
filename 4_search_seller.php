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
        $_POST['search_seller_query'];
?>
       <div class="cotent_box">
    <!---form---->
<table border="1" class="show_table" width="83%">
    <tr height="50px"><th>
S no.</th><th>Employee Id</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Age</th><th>Company/Factory/Other Name</th><th>Contact no</th><th>Full Address</th><th>Profile Creation Date</th><th>Action</th></tr>
<?php
    if(isset($_POST['seller_search'])){
     $search_keywords=$_POST['search_seller_query'];
     $query="select * from seller_profile where (seller_profile_uniqe_code='$search_keywords') OR (`seller_first_name` LIKE '%$search_keywords%') OR (`seller_last_name` LIKE '%$search_keywords%') OR (gender='$search_keywords') OR (age='$search_keywords') OR (`seller_company_factory_other_name` LIKE '%$search_keywords%') OR (seller_contact_no='$search_keywords') OR (`seller_full_address` LIKE '%$search_keywords%') OR (`seller_profile_creation_date` LIKE '%$search_keywords%') order by id desc";
             
        /* means that it selects all fields, you can also write: `id`, `title`, `text`
         
        //* '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'  ---*/
        
    $row=mysqli_query($connection,$query) or die
        (mysql_error());
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
    <td><a href='admin_index.php?attendance_salary&user=<?php echo $session_name ?>&attendance_salary_id=<?php echo $result['0'] ?>'><button name="edit" style="background:green;color:#fff;margin:0px;">Attendance &amp; salary</button></a>
        
        <a href='admin_index.php?update_form_seller&user=<?php echo $session_name ?>&update_id=<?php echo $result['0'] ?>'><button name="edit" style="background:green;color:#fff;margin:0px;">Edit Profile Details</button></a>
        
        <button name="delete" style="background:red;color:#fff;margin:0px;" onclick="DeleteFunction()"><img src="images/delete.png" alt="delete">Delete This seller's Details</button>
        <!---confirm by message---->
<script>
function DeleteFunction() {
  var r = confirm("Do you really want to delete this Seller's profile, Confirm it!");
  if (r == true) {
    window.location.assign('admin_index.php?delete_seller&user=<?php echo $session_name ?>&delete_id=<?php echo $result['0'] ?>')
  }
    else {
    window.location.assign('admin_index.php?show_seller&user=<?php echo $session_name ?>')
  }
}
</script> 
        
        <!----end of confirm---->
  </td>
    </tr>
           <?php
    }
    ?>
           </table></div>
<?php }} ?>