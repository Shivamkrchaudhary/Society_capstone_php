<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Username = $_POST['staf_username'];
    $Password = $_POST['staf_code'];
}
// connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "project_database";

// creating connection

$conn = mysqli_connect($servername, $username, $password, $database);
// die if connection was not successfull

$sql = "Select * from staff_table where username='$Username' AND password='$Password'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if ($num == 1){
    echo "<script>alert('Welcome,You are logged in...!');
    window.location.href = 'STAFF/staff_dashboaard.php';
    </script>";
    session_start();
    $_SESSION['staf_loggedin']= true;
    $_SESSION['staf_username']= $Username;
    $name_sql = "Select full_name from staff_table where username='$Username'";
    $name_result = mysqli_query($conn,$name_sql);
    $name_row = mysqli_fetch_assoc($name_result);
    $_SESSION['staf_name']= $name_row['full_name'];
}
else{
    echo "<script>alert('Sorry,Invalid credentials...!');
    window.location.href = 'login.html';
    </script>"; mysqli_error($conn);
}
?>
