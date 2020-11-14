<?php

session_start();
if(isset($_SESSION['logged'])&& $_SESSION['logged']==$_GET['user'])
{
$_SESSION['logged']=='false';
$_SESSION['logged2']=='false';
session_destroy();
    header('location:index.php');
}
?>