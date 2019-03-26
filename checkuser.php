<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sudoku";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
  
  if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) == 1) {
      while($row = mysqli_fetch_array($res, MYSQL_ASSOC)) {
        echo "You have successfully logged in. Hello, @".$row['username'];
      }
      exit();
    } else {
      echo "Invalid login information. Please try again.";
      exit();
    }
  }
?>
