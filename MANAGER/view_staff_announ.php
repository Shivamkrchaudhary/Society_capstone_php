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
    <title>Staff Announcement</title>
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

/* table css add by shivam */
table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
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
    <h1>View Staff Announcement</h1>
    <?php

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project_database";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query to fetch all residents
        $sql = "SELECT announcement_date, title, description FROM announcement WHERE audience = 'staff';";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Date</th>";
            echo "<th>Title</th>";
            echo "<th>Description</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["announcement_date"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No residents found.";
        }

        mysqli_close($conn);

        ?>
    </div>
    
    <!-- dashboard area end -->
    
</body>
</html>

