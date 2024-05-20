<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminlogin</title>
    <script src="https://kit.fontawesome.com/2edfbc5391.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style1.css">
    <style>
    .form-container1{
    background:#fff;
    width: 300px;
    height: 300px;
    position: relative;
    text-align: center;
    padding: 10px 0;
    margin: auto;
    box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
    overflow: hidden;
}
    .adminfbtn h1{
        font-size: 25px;
    }
    .form-container1 .admimg {
        width: 130px;
        height: 100px;
        border-radius: 100px;
        /* margin-bottom: 8px; */
    }
    </style>
</head>
<body>
<div class="page">
       <div class="navbar">
           <img src="Images/shlogo.jpg" class="logo">
           <h1>Nexi<span style="font-family: 'Merienda', cursive;
            color:rgb(20, 76, 80);">kon</span></h1>
           <nav>
               <ul>
                   <li><a href="login.html"class="active">Login</a></li>
                   <li><a href="staff_Login.html">Staff Login</a></li>
                   <li><a href="Rules&Regulations.html">Rules & Regulations</a></li>
                </ul>
            </nav>
            <!-- <a href="login.html" class="btn">User Login</a> -->
       </div>
       <div class="row">
        <div class="col-1">
             <img src="Images/building1.jpg" >
        </div> 
        <div class="col-2">
           <div class="form-container1">
               <div class="adminfbtn">
                   <h1>Admin Login</h1>
               </div>
               <img src="Images/adminlogin.jpg" class="admimg" alt="">
               <form action="Adminlogin.php" method="POST">
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Admin Code" name="admincode" required>
                    <button type="submit" class="btn-losi" name="logina" >Login</button>     
                </form>
            </div>
        </div>
        </div>
</div>
<hr>
   
    </footer>
</body>
</html>
<!-- Php code to admin login -->
<?php
if(isset($_POST['logina'])){
    $user = $_POST['username'];
    $adcode = $_POST['admincode'];
    if($user=="Admin" && $adcode=="1000"){
        echo "<script>alert('Welcome,You are logged in...!');
        window.location.href ='MANAGER/manager_dasgboard.php';
        </script>";
        session_start();
        $_SESSION['mang_loggedin']= true;
        $_SESSION['mang_username']= $user;
    }
    else{
        echo "<script>alert('Sorry,Please enter valid details.!!');
        </script>";
    }
}
?>