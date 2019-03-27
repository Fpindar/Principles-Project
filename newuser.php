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
		$firstname = $conn->real_escape_string($_POST['firstname']);
		$lastname = $conn->real_escape_string($_POST['lastname']);
		$sql = "INSERT INTO users (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')";
		$insert = $conn->query($sql);
		if($insert == TRUE) {
			echo 'User created! <a href="sudoku1.html">Login</a>';
		} else {
			echo 'Error: '.$conn->error;
		}
	}