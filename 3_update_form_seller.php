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
        
        /*---fetching data---------*/
          if(isset($_GET['update_id'])){
            $update_id=$_GET['update_id'];
          $query="select * from seller_profile where id='$update_id'";
            $row=mysqli_query($connection,$query);
            $result=mysqli_fetch_array($row);
            $id=$result['0'];
        $seller_code=$result['1'];
    $first_name=$result['2'];
     $last_name=$result['3'];
    $gender=$result['4'];
    $age=$result['5'];
    $company=$result['6'];
     $contact=$result['7'];
     $address=$result['8'];
     $joining_time_date=$result['9'];
?>
<html>
    <head>
    <title>SM</title>
        <link rel="stylesheet" href="css/css.css" enctype="multipart/form-data">
    </head>
    <body>
    <div id="form">
            <form action="" method="post" name="logon" submit="return validate(true)">

            <span><h3>*First Name:</h3></span>
                <input type="text" name="first_name" placeholder=" First Name" maxlength="20" value="<?php echo $first_name ?>" required>
                <span><h3>*Last Name:</h3></span>
                <input type="text" name="last_name" placeholder=" Last Name" maxlength="20" value="<?php echo $last_name ?>" required>
                
                <span><h3>*Gender:</h3></span>
            <select name = "gender" required>
        <option value ="<?php echo $gender ?>" selected><?php echo $gender ?></option>
            <option value = "Male" >Male</option>
            <option value = "Female">Female</option>
            <option value = "Other">Other</option>
         </select>
                
                  <span><h3>*Age:</h3></span>
                <input type="text" name="age" placeholder=" Age" maxlength="10" value="<?php echo $age ?>" required>
                
                   <span><h3>*Company/Factory/Other Name:</h3></span>
                <input type="text" name="company" placeholder=" Company/Firm/Other Name" maxlength="10" value="<?php echo $company ?>" required>
                
                <span><h3>*Contact No:</h3></span>
                <input type="text"  pattern="\d*" name="contact" placeholder=" Contact No" maxlength="13" value="<?php echo $contact ?>" required>
                
                <span><h3>*Full Address:</h3></span>
                <input type="text" name="address" placeholder=" Full Address" maxlength="40" value="<?php echo $address?>" required>
                
                        
                <input style="background:#fff;cursor:pointer;margin-top:30px;font-weight:700;" id="submit" type="submit" value="Update" name="update">
                
                </form> 
        </div>
    </body>
    </html>
<?php 
if(isset($_POST['update'])){
       $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $company=$_POST['company'];
     $contact=$_POST['contact'];
     $address=$_POST['address'];
    $user=$_SESSION['logged'];
    $id=$_GET['update_id'];
    
$login_query="update seller_profile set seller_first_name='$first_name',seller_last_name='$last_name',gender='$gender',age='$age',seller_company_factory_other_name='$company',seller_contact_no='$contact',seller_full_address='$address' where id=$id"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Seller Profile data has been updated successfully.')</script>";
   echo "<script>window.location.assign('admin_index.php?show_seller&user=$session_name')</script>";
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?update_form_seller&user=$session_name&update_id=$id')</script>";
     }  
           
        }
    }
        
    }
?>