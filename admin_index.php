<?php
 include_once('connection.php');
session_start();
    if(!isset($_SESSION['logged'])&&$_SEESION['logged']!='true')
    {
        echo "<script>window.location.assign('index.php')</script>";
        exit();
    }
    else
    {
        $user=$_GET['user'];
        $session_name=$_SESSION['logged'];
        /*-----------------date-----*/
          date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d');
        
        /*-------------end of date----*/
?>
<html>

<head>
    <title>Sonu Mittal</title>
    <link rel="stylesheet" href="./css/css.css">
</head>

<body>
    <!-----header---->
    <div id="wrapper">

        <!-----header----->
        <header>
            <div class="contaiber">
                <div class="header_text">
                    <h1 style="font-size:35px">Welcome to Record Managment System</h1>
                </div>

                <div class="header_user">
                    <h3 style="margin:10px;float:right;">User : <span><?php echo $session_name ?></span></h3>
                    <?php 
             date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d');
                echo "<h4 style='float:right;margin:8px;color:#000;'>Today Date : $date</h4>";
                ?>
                </div>
            </div>
        </header>
        <!---end of header----->



        <!------side nav-------------->
        <div class="nav">
            <div class="container">
                <nav>
                    <div class="logo">
                        <a href="admin_index.php?user=<?php echo $session_name ?>"><img width="80" height="80" style="margin:17px 61px;" src="images/tu.png" alt="blank"></a>
                    </div>
                    <a href="admin_index.php?user=<?php echo $session_name ?>"> <button name="dashboard"><img src="images/d.png" alt="d">Dashboard</button></a>
                    <a href="admin_index.php?show_employee&user=<?php echo $session_name ?>"> <button name="book"><img src="images/workers.png" alt="w">Employees</button></a>
                    <a href="admin_index.php?show_seller&user=<?php echo $session_name ?>"><button name="show"><img src="images/purchasing.png" alt="seller">Purchasing</button></a>
                    <a href="admin_index.php?change_password&user=<?php echo $session_name ?>"><button name="update">Change Password</button></a>
                    <a href="logout.php?user=<?php echo $session_name ?>"><button name="logout">Logout</button></a>

                </nav>
            </div>
        </div>
        <!--end of side nav------>


<!-----------------------------------loading pages-------------------------------------->
        
        <section>
            <div class="content">
<!-----------------------------------All Empoyees Code--------------------------------->
                <?php
            if(!isset($_GET['show_employee'])){
                       if(!isset($_GET['delete_employee'])){
                           if(!isset($_GET['update_form_employee'])){
                            if(!isset($_GET['form_employee'])){
                            if(!isset($_GET['search_employee'])){
                            if(!isset($_GET['change_password'])){
                            if(!isset($_GET['attendance_salary'])){
                            if(!isset($_GET['advance_remaining_paid_recored'])){
                     if(!isset($_GET['print_attendance_and_all_paid_salary_record'])){
                         if(!isset($_GET['show_seller'])){
                       if(!isset($_GET['delete_seller'])){
                           if(!isset($_GET['update_form_seller'])){
                            if(!isset($_GET['form_seller'])){
                            if(!isset($_GET['search_seller'])){
                           if(!isset($_GET['purchasing_from_seller'])){
                           if(!isset($_GET['purchasing_of_today_from_seller_form'])){
                           if(!isset($_GET['advance_remaining_paid_to_seller_record'])){
                           if(!isset($_GET['print_all_sellers_record'])){
                    if(!isset($_GET['print_seller_record_by_id'])){
                    if(!isset($_GET['employee_bonus_record'])){
                            echo "<center><h1><b style='color:#666;line-height:600px'>Welcome <span>$session_name</b></h1></center>";  }}}}}}}}}}}}}}}}}}}}
        
        /*------------------show employee--------------*/
                if(isset($_GET['show_employee'])){
                   echo "<h1 style='float:left;'>Employees Details</h1>";
                    ?>

                <!---add employe button---->
                <a href='admin_index.php?form_employee&user=<?php echo $session_name ?>'> <button name='form_employee' style='float:right;margin:10px;'><img src='images/workers.png' alt='form' style='display:block;margin-left:43px;'>Add Employees</button></a>

                <!--search employee- in show employee page--->
                <div class="search">
                    <form method="post" action="admin_index.php?search_employee&user=<?php echo $session_name ?>" enctype="multipart/form-data">
                        <p>*(Search Employee by Code/First Name/Last Name/Age/Gender/Experience/Contact no/Address/Joining Date)</p>
                        <input type="text" name="search_employee_query" placeholder=" Search Employee">
                        <input type="submit" name="employee_search" value="search">
                    </form>
                </div>
                <!---enf of search employee--->

                <?php
               include_once('show_employee.php');
            }
        /*--------------------end of show employe----------*/
        
        /*--------------------search employee---------------------*/
        if(isset($_GET['search_employee'])){
            echo "<h1 style='float:left;'>Search Result</h1>";
            ?>
                <!--search employee- in search result page--->
                <div class="search">
                    <form method="post" action="admin_index.php?search_employee&user=<?php echo $session_name ?>" enctype="multipart/form-data">
                        <p>*(Search Employee by Code/First Name/Last Name/Age/Gender/Experience/Contact no/Address/Joining Date)</p>
                        <input type="text" name="search_employee_query" placeholder=" Search Employee">
                        <input type="submit" name="employee_search" value="search">
                    </form>
                </div>
                <!---enf of search employee---><?php
               include_once('search_employee.php');
        }
        /*--------------------end of search employee---------------*/
        
        /*-------------------attendance and salary----------*/
        if(isset($_GET['attendance_salary'])){
              echo "<h1 style='float:left;'>Employee's Record of Attendance and Salary</h1>";
               include_once('attendance_salary.php');
            }
        if(isset($_GET['advance_remaining_paid_recored'])){
              echo "<h1 style='float:left;'>Employee's Record of Advance and Remaining Paid Salary Record</h1>";
               include_once('advance_remaining_paid_recored.php');
            }
        if(isset($_GET['print_attendance_and_all_paid_salary_record'])){
            echo "<h1 style='float:left;'>Print Attendance and All Paid Salary Record</h1>";
               include_once('print_attendance_and_all_paid_salary_record.php');
            } 
        
        if(isset($_GET['employee_bonus_record'])){
            echo "<h1 style='float:left;'>Bonus's Record</h1>";
               include_once('employee_bonus_record.php');
            }
        
        
        /*-------------end of attendance and salary-------------*/
        
        if(isset($_GET['form_employee'])){
              echo "<h1 style='float:left;'>Fill up Employee Details</h1>";
               include_once('form_employee.php');
            }
        if(isset($_GET['update_form_employee'])){
             echo "<h1 style='float:left;'>Update Employee Details</h1>";
               include_once('update_form_employee.php');
            }
         if(isset($_GET['delete_employee'])){
               include_once('delete_employee.php');
            }
        if(isset($_GET['change_password'])){
             echo "<h1 style='float:left;'>Change Password</h1>";
               include_once('change_password.php');
            }
        
        ?>
 <!----------------------------End of All Empoyees Code--------------------------------->
                
                
                
                
                
<!-----------------------------------All sellers Code--------------------------------->
                <?php
            
        
        /*-----------------show seller--------------*/
                if(isset($_GET['show_seller'])){
                   echo "<h1 style='float:left;'>Sellers Details</h1>";
                    ?>

                <!---add seller button---->
                <a href='admin_index.php?form_seller&user=<?php echo $session_name ?>'> <button name='form_seller' style='float:right;margin:10px;'><img src='images/purchasing.png' alt='form' style='display:block;margin-left:43px;'>Add seller</button></a>
                
                           <!---print All sellers records button---->
                <a href='admin_index.php?print_all_sellers_record&user=<?php echo $session_name ?>'> <button name='form_seller' style='float:right;margin:10px;'><img src='images/print.png' alt='form' style='display:block;margin-left:43px;'>Print all Sellers Records</button></a>

                <!--search seller- in show seller page--->
                <div class="search">
                    <form method="post" action="admin_index.php?search_seller&user=<?php echo $session_name ?>" enctype="multipart/form-data">
                        <p>*(Search Seller by Code/First Name/Last Name/Age/Gender/Contact no/Address/Company)</p>
                        <input type="text" name="search_seller_query" placeholder=" Search Seller">
                        <input type="submit" name="seller_search" value="search">
                    </form>
                </div>
                <!---enf of search seller--->

                <?php
               include_once('2_show_seller.php');
            }
        /*----------------------------end of show seller----------*/
        
        /*--------------------search seller---------------------*/
        if(isset($_GET['search_seller'])){
            echo "<h1 style='float:left;'>Search Result</h1>";
            ?>
                <!--search seller- in search result page--->
                <div class="search">
                    <form method="post" action="admin_index.php?search_seller&user=<?php echo $session_name ?>" enctype="multipart/form-data">
                        <p>*(Search seller by Code/First Name/Last Name/Age/Gender/Contact no/Address/Company)</p>
                        <input type="text" name="search_seller_query" placeholder=" Search Seller">
                        <input type="submit" name="seller_search" value="search">
                    </form>
                </div>
                <!---enf of search seller---><?php
               include_once('4_search_seller.php');
        }
        /*--------------------end of search seller---------------*/
        
        /*-------------------attendance and salary----------*/
        if(isset($_GET['purchasing_from_seller'])){
              echo "<h1 style='float:left;'>Purchasing Record</h1>";
               include_once('6_purchasing_from_seller.php');
            }
    if(isset($_GET['advance_remaining_paid_to_seller_record'])){
              echo "<h1 style='float:left;'>Advance and Remaining Paid to Seller Record</h1>";
               include_once('9_advance_remaining_paid_to_seller_record.php');
            }
                
                 if(isset($_GET['print_all_sellers_record'])){
            echo "<h1 style='float:left;'>All Sellers Record</h1>";
               include_once('10_print_all_sellers_record.php');
                 }
    
        if(isset($_GET['print_seller_record_by_id'])){
            echo "<h1 style='float:left;'>Print Seller Record</h1>";
               include_once('11_print_seller_record_by_id.php');
            }
        
        
        /*-------------end of attendance and salary-------------*/
        
        if(isset($_GET['form_seller'])){
              echo "<h1 style='float:left;'>Fill up Seller's Details</h1>";
               include_once('1_form_seller.php');
            }
        if(isset($_GET['update_form_seller'])){
             echo "<h1 style='float:left;'>Update seller's Details</h1>";
               include_once('3_update_form_seller.php');
            }
         if(isset($_GET['delete_seller'])){
               include_once('5_delete_seller.php');
            } 
        
        if(isset($_GET['purchasing_of_today_from_seller_form'])){
             echo "<h1 style='float:left;'>Purchasing of Today Entry</h1>";
               include_once('8_purchasing_of_today_from_seller_form.php');
            }
        
        ?>
 <!------------------------End of All sellers Code--------------------------------->
                  
            </div>
        </section>
 <!----------------------------end of page loading------------------------------------->

    </div>
</body>

</html>
<?php } ?>
