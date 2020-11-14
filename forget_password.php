<html>
    <head>
    <title>Forgrt Password</title>
        <link rel="stylesheet" href="css/css.css" >
    </head>
    <body>
<!-----header---->
        <div id="wrapper">
<div id="background">
    <h2 style="text-align:center;color:#88a5c9;font-size:40px;margin-top:40px;">Record Management Syaytem</h2>
    <div id="login">
    <p>Forget-Password</p>
        <form method="post" action="">
        <input type='text' name="user" placeholder="Enter your User Name" required maxlength="20">
        <input type="submit" name="submit" value="submit" style="cursor:pointer;font-weight:700;border:2px solid #7B7E8D;background:#fff;">
        <a href="index.php"> <h4 style="float:left;margin-left:90px;text-decoration:underline">Alrady have Account,  Login</h4></a>
        </form>
    </div>
    </div>
    </div>
</body>
    <?php
     include_once('connection.php');
    if(isset($_POST['submit']))
    {
          $user=mysqli_real_escape_string($connection,$_POST['user']);
         if(empty($user)){
    echo "<script>alert('Please enter your User Name')</script>";
         } 
            $query="select * from login where user_name='$user';";
$row=mysqli_query($connection,$query);
$result=mysqli_fetch_array($row);
    $user_name=$result['1'];
    $pass=$result['2'];
      if($user==$user_name) 
      {
    $to = "sonu.mittal144@gmail.com";
$header = "From:Control Management System";
$full_message = "nusername: $user_name\n\npassword: $pass";
    $subject = "Password";
    
if(mail($to,$subject,$full_message,$header)){
    echo "<script>alert('Username and password have been sent to your email address successfully-')</script>";
   echo "<script>window.location.assign('index.php')</script>";
}
    else
    {
      echo "<script>alert('Sowmthing went wrong :(,Please try again')</script>";  
    }
    }
        else
        {
            echo "<script>alert('Please enter a valid user name')</script>"; 
        }
      }
?>
</html>