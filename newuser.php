<?php
	$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sudoku";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
	if(isset($_POST)) {
		$username = $conn->real_escape_string($_POST['username']);
		$password = $conn->real_escape_string($_POST['password']);
		$role = $conn->real_escape_string($_POST['role']);
		$sql = "INSERT INTO users (username, password, role, created) VALUES ('".$username."', '".$password."', '".$role."', now())";
		$insert = $conn->query($sql);
		if($insert == TRUE) {
			echo 'User created! <a href="sudoku3.html">Login</a>';
		} else {
			echo 'Error: '.$conn->error;
		}
	}