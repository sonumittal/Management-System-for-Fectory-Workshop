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
          $query="select * from employee_profile where id='$update_id'";
            $row=mysqli_query($connection,$query);
            $result=mysqli_fetch_array($row);
            $id=$result['0'];
        $emp_code=$result['1'];
    $first_name=$result['2'];
     $last_name=$result['3'];
    $gender=$result['4'];
    $age=$result['5'];
     $contact=$result['6'];
     $address=$result['7'];
   $experience=$result['8'];
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
                
                <span><h3>*Contact No:</h3></span>
                <input type="text"  pattern="\d*" name="contact" placeholder=" Contact No" maxlength="13" value="<?php echo $contact ?>" required>
                
                <span><h3>*Full Address:</h3></span>
                <input type="text" name="address" placeholder=" Full Address" maxlength="40" value="<?php echo $address?>" required>
                
                
                   <span><h3>*Experience:</h3></span>
            <select name = "experience" required>
            <option value ="<?php echo $experience ?>" selected><?php echo $experience ?></option>
            <option value = "1 Year">1 Year</option>
            <option value = "2 Year">2 Year</option>
            <option value = "3 Year">3 Year</option>
            <option value = "4 Year">4 Year</option>
            <option value = "5 Year">5 Year</option>
            <option value = "6 Year">6 Year</option>
            <option value = "7 Year">7 Year</option>
            <option value = "8 Year">8 Year</option>
            <option value = "9 Year">9 Year</option>
            <option value = "10 Year">10 Year</option>
            <option value = "10+ Year">10+ year</option>
         </select>
                        
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
     $contact=$_POST['contact'];
     $address=$_POST['address'];
    $experience=$_POST['experience'];
    $user=$_SESSION['logged'];
    $id=$_GET['update_id'];
    
$login_query="update employee_profile set emp_first_name='$first_name',emp_last_name='$last_name',gender='$gender',age='$age',emp_contact_no='$contact',emp_full_address='$address',experience='$experience' where id=$id"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Employee Profile data has been updated successfully.')</script>";
   echo "<script>window.location.assign('admin_index.php?show_employee&user=$session_name')</script>";
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?update_form_employee&user=$session_name&update_id=$id')</script>";
     }  
           
        }
    }
        
    }
?>