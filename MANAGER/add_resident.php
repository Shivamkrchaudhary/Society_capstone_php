<?php
session_start();


if(!isset($_SESSION['mang_loggedin']) || $_SESSION['mang_loggedin']!=true){
    header("location: ../login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Residents</title>
    <link rel="stylesheet" href="dashstyle.css">
    <script src="https://kit.fontawesome.com/2edfbc5391.js"crossorigin="anonymous"></script>
    <style>
  
  .container {
    width: 600px; /* Adjust width as needed */
    margin: 50px auto;
    text-align: center;
  }
  
  h1 {
    margin-top: 0px;
    height: 50px;
    font-size: 2em;
    margin-bottom: 20px;
  }
  
  .buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .btn {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
    border-radius: 5px;
  }
  
  .btn:hover {
    background-color: #45A049; /* Green hover */
  }

  /* Form CSS Added By Shivam */

  form {
    display: inline-block; /* Keep forms centered */
    text-align: left; /* Align content inside forms to the left */
    padding: 20px;
    background-color: #fff; /* White form background */
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

input[type="text"], input[type="email"], input[type="number"] {
    padding: 8px;
    border-radius: 4px;
    float: right;
    border: 1px solid #ccc;
    width: 200px; /* Uniform width for text inputs */
}

.center-button {
    text-align: center; /* Center-align the save button */
}

input[type="submit"] {
    background-color: #4CAF50; /* Green button */
    color: white; /* White text on button */
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049; /* Darker green on hover */
}

    </style>

</head>
<body>
<!-- <input type="checkbox" id="check"> -->
    <!--header area start-->
    <header>
      <div class="left_area">
       <h3>Nexi<span>kon</span> <span style="color: orange">&nbsp &nbsp Manager</span> &nbsp &nbsp <a href="manager_dasgboard.php"> <span #45A049>HOME</span></a></h3>
       <!-- <h3>Nexi<span>kon</span> <span style="color: orange">&nbsp &nbsp <?php echo $_SESSION['mang_username']?></span></h3> -->
      </div>
      <div class="right_area">
        <a href="../logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->

    <!-- ======================================================================================================================================= -->
    <!-- ======================================================================================================================================= -->

    <!-- dashboard area start -->
    <div class="container">
    <h1>Add Residents</h1>
    <form action="add_resident.php" method="POST">
            <label for="add_resi_USERNAME">UserName*</label>
            <input type="number" name="add_resi_USERNAME" required><br><br>

            <label for="add_resi_PASSWORD">Password*</label>
            <input type="text" name="add_resi_PASSWORD" required><br><br>

            <label for="add_resi_FULL_NAME">Full Name*</label>
            <input type="text" name="add_resi_FULL_NAME" required><br><br>

            <label for="add_resi_phoneNumber">Phone Number*</label>
            <input type="text" name="add_resi_phoneNumber" required><br><br>

            <label for="add_resi_email">Email ID*</label>
            <input type="email" name="add_resi_email" required><br><br>

            <label for="add_resi_flat_Number">Flat Number*</label>
            <input type="number" name="add_resi_flat_Number" required><br><br>

            <div class="center-button"> <!-- Added div for centering -->
                <input type="submit" name="save_resident" value="Save">
            </div>

        </form>
    </div>
    
    <!-- dashboard area end -->
    
</body>
</html>

<!-- Php code to added resident -->
<?php
if(isset($_POST['save_resident'])){

    // storing form details
    $USERNAME = $_POST['add_resi_USERNAME'];
    $PASSWORD = $_POST['add_resi_PASSWORD'];
    $Full_name = $_POST['add_resi_FULL_NAME'];
    $phone_no = $_POST['add_resi_phoneNumber'];
    $email = $_POST['add_resi_email'];
    $flat_no = $_POST['add_resi_flat_Number'];

    // connecting to database

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project_database";

    // creating connection

    $conn = mysqli_connect($servername, $username, $password, $database);
    // die if connection was not successfull

    $stmt = $conn->prepare("INSERT INTO resident_table (username, password, full_name, phone_number, email, flat_number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $USERNAME, $PASSWORD, $Full_name, $phone_no, $email, $flat_no);

    if ($stmt->execute()) {
        echo "<script>alert('Resident Details Entered Successfully...!');
        window.location.href = 'view_resident.php';
        </script>";
    } else {
        echo "<script>alert('some error occured...!<br>.$conn->error');
        window.location.href = 'view_resident.php';
        </script>";
    }

}
?>