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
    <title>Create Announcement</title>
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

input[type="text"], input[type="date"], input[type="number"] {
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
    <h1>Create Announcement</h1>
    <form action="resi_announ_create.php" method="POST">

            <label for="resi_announ_date">Title*</label>
            <input type="date" name="resi_announ_date" required><br><br>

            <label for="resi_announ_title">Title*</label>
            <input type="text" name="resi_announ_title" required><br><br>

            <label for="resi_announ_desc">Description*</label>
            <input type="text" name="resi_announ_desc" required><br><br>

            <div class="center-button"> <!-- Added div for centering -->
                <input type="submit" name="resi_announ_save" value="Save">
            </div>

        </form>
    </div>
    
    <!-- dashboard area end -->
    
</body>
</html>

<!-- Php code to added resident -->
<?php
if(isset($_POST['resi_announ_save'])){

    // current date
    
    // storing form details
    $date = $_POST['resi_announ_date'];
    $title = $_POST['resi_announ_title'];
    $desc = $_POST['resi_announ_desc'];
    // $aud = "staff";

    // connecting to database

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project_database";

    // creating connection

    $conn = mysqli_connect($servername, $username, $password, $database);
    // die if connection was not successfull

    $stmt = $conn->prepare("INSERT INTO announcement (announcement_date, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $date, $title, $desc);

    if ($stmt->execute()) {
        echo "<script>alert('Announciment Created Successfully...!');
        window.location.href = 'view_resi_announ.php';
        </script>";
    } else {
        echo "<script>alert('some error occured...!<br>.$conn->error');
        window.location.href = 'resi_announ.php';
        </script>";
    }

}
?>