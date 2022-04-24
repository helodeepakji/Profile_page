<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
    $status = "LogIn";
}else{
    $status = "Profile";
    $user = $_SESSION['username'];
    include 'Sqliconn.php';
    
  }


$error=$_POST['error'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if($error == 121){
		$name=$_POST['name'];
		$mail=$_POST['email'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$mobile=$_POST['phone'];

		$sql="UPDATE `users` SET `name` = '$name' , `email` = '$mail' , `gender` = '$gender' , `dob` = '$dob' , `phone` = '$mobile' WHERE `username` = '$user'";
		$result=mysqli_query($conn,$sql);
	}

	if($error == 101){
		if ($password == $cpassword) {
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];

			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql= "UPDATE `users` SET `error` = '$cpassword', `password` = '$hash' WHERE `username` = '$user'";
			$result=mysqli_query($conn,$sql);
		}
	}
}

$_SESSION['error']==4;

header('location:profile.php');

?>