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
<!-----header---->
    <div id="login" style="background:#DDDDDD;">
    <p></p>
        <form method="post" action="">
        <input type='text' name="username" placeholder=" Enter Username" required maxlength="20">
        <input type="password" name="current_password" placeholder=" Enter Current Password" required maxlength="20">
         <input type="password" name="password1" placeholder=" Enter New Password" required maxlength="20">
             <input type="password" name="password2" placeholder=" Enter New Password Again" required maxlength="20">
        <input type="submit" name="create_account" value="Change Password"  style="background:#fff;font-weight:700;cursor: pointer;;">
        </form>
    </div>
    </div>
    <?php
    include_once('connection.php');
    if(isset($_POST['create_account']))
    {
    $user_name=mysqli_real_escape_string($connection,$_POST['username']);
$user_cur_pass=mysqli_real_escape_string($connection,$_POST['current_password']);
        $user_pass1=mysqli_real_escape_string($connection,$_POST['password1']);
        
        $user_pass2=mysqli_real_escape_string($connection,$_POST['password2']);
        if($user_pass1!=$user_pass2)
        {
             echo "<script>alert('Enter your new password again, New Password is not Same')</script>";
        }
        else
        {
            $login_query="select * from login where user_name='$user_name' AND password='$user_cur_pass'"; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    {
      md5($user_pass1);
    $login_query="update login set password='$user_pass1',date_time=NOW() where user_name='$user_name' AND password='$user_cur_pass'"; 
if(mysqli_query($connection,$login_query))
{
echo "<script>alert('Password has been changed successfully.')</script>";
    ?><script>window.location.assign('admin_index.php?user=<?php echo $session_name ?>')</script>"
<?php
}
     else{
         echo "<script>alert('Something went wrong,Please try again')</script>";
          ?><script>window.location.assign('admin_index.php?change_password&user=<?php echo $session_name ?>')</script>"
<?php
     } 
        }
        
        else{
        echo "<script>alert('Current username or password is wrong, Please try again')</script>";
         ?><script>window.location.assign('admin_index.php?change_password&user=<?php echo $session_name ?>')</script>"
<?php
        
        }
      
    }
    }
    }
    ?>