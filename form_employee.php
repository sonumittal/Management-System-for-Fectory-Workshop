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
?>
<html>
    <head>
    <title>SM</title>
        <link rel="stylesheet" href="css/css.css" enctype="multipart/form-data">
    </head>
    <body>
    <div id="form">
            <form action="" method="post" name="logon" submit="return validate(true)">
<?php $emp_code=mt_rand(1000000,9999999); ?> <!--generate value start from 1000000 till 9999999 --->
                 <span><h3>Date (Year-Month-Date) : <?php echo $date ?></h3></span>
                 <span><h3>Generated Employee code : <?php echo $emp_code ?></h3></span>
                <span><h3>*First Name:</h3></span>
                <input type="text" name="first_name" placeholder=" First Name" maxlength="20" required>
                <span><h3>*Last Name:</h3></span>
                <input type="text" name="last_name" placeholder=" Last Name" maxlength="20" required>
                
                <span><h3>*Gender:</h3></span>
            <select name = "gender" required>
            <option value = "" selected>---Select---</option>
            <option value = "Male" >Male</option>
            <option value = "Female">Female</option>
            <option value = "Other">Other</option>
         </select>
                
                <span><h3>*Age:</h3></span>
                <input type="text" name="age" placeholder=" Age" maxlength="10" required>
                
                <span><h3>*Contact No:</h3></span>
                <input type="text"  pattern="\d*" name="contact" placeholder=" Contact No" maxlength="13" required>
                
                <span><h3>*Full Address:</h3></span>
                <input type="text" name="address" placeholder=" Full Address" maxlength="40" required>
                
                
                   <span><h3>*Experience:</h3></span>
            <select name = "experience" required>
            <option value = "" selected>---Select---</option>
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
                        
                <input style="background:#fff;cursor:pointer;margin-top:30px;font-weight:700;" id="submit" type="submit" value="Submit" name="submit">
                </form> 
        </div>
    </body>
    </html>
<?php 
if(isset($_POST['submit'])){
    $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
     $contact=$_POST['contact'];
     $address=$_POST['address'];
    $experience=$_POST['experience'];
    $user=$_SESSION['logged'];
$login_query="insert into employee_profile values (null,'$emp_code','$first_name','$last_name','$gender','$age','$contact','$address','$experience','$date')"; 
if(mysqli_query($connection,$login_query)or die(mysqli_error($connection)))
{
echo "<script>alert('Employee profile is created successfully.')</script>";
    echo "<script>window.location.assign('admin_index.php?show_employee&user=$session_name')</script>";
}
     else{
         echo "<script>alert('Something went wrong, Please try again')</script>";
           echo "<script>window.location.assign('admin_index.php?form_employee&user=$session_name')</script>";
     }  
           
        }
    }
?>