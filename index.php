<html>
    <head>
    <title>Login - Record Management System</title>
        <link rel="stylesheet" href="css/css.css" >
    </head>
    <body>
<!-----header---->
        <div id="wrapper">
<div id="background">
    <h2 style="text-align:center;color:#88a5c9;font-size:40px;margin-top:40px;">Record Management System</h2>
    <div id="login">
    <p>Log-in</p>
        <form method="post" action="">
        <input type='text' name="username" placeholder=" Username" required maxlength="20">
        <input type="password" name="password" placeholder=" Password" required maxlength="20">
        <input type="submit" name="login" value="Login" style="cursor:pointer;font-weight:700;border:2px solid #7B7E8D;background:#fff;">
           <a href="forget_password.php"> <h4 style="float:left;margin-left:90px;text-decoration:underline">Forget Password</h4></a>
        </form>
    </div>
    </div>
    </div>
</body>
    <?php
    include_once('connection.php');
    if(isset($_POST['login']))
    {
        session_start();
        $user_name=mysqli_real_escape_string($connection,$_POST['username']);
        $user_pass=mysqli_real_escape_string($connection,$_POST['password']);
        md5($user_pass);
         $login_query="select * from login where user_name='$user_name' AND password='$user_pass' "; 
    $run=mysqli_query($connection,$login_query);
    if(mysqli_num_rows($run)>0)
    {
           $_SESSION['logged']=$user_name;
           $_SESSION['logged2']='true';
            header('Location:admin_index.php?user='.$user_name);
        }
        else
        {
            echo "<script>alert('Incorrect username or password')</script>";
           
        }
    }
    ?>
</html>