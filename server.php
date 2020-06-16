<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'form');
	$name = "";
	$email = "";
	$pnumber="";
	$id = 0;
	$update = false;

	// Saving to Data base 

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email=$_POST['email'];
		$pnumber=$_POST['number'];

		mysqli_query($db, "INSERT INTO form (Name,Email,Phone) VALUES ('$name', '$email','$pnumber')"); 
		$_SESSION['message'] = "Details Saved";
		$_SESSION['class']="alert-success";
		header('location: index.php');
	}

	//Updating Database

	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email=$_POST['email'];
	$pnumber=$_POST['number'];

	mysqli_query($db, "UPDATE form SET Name='$name', Email='$email',Phone='$pnumber' WHERE id=$id");
	$_SESSION['message']="$name Updated!";
	$_SESSION['class']="alert-success";
	header('location: index.php');
}

// Deleting from Databse

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$name=$_POST['name'];
	mysqli_query($db, "DELETE FROM form WHERE id=$id");
	$_SESSION['message'] = " Details deleted!";
	$_SESSION['class']="alert-danger" ;
	header('location: index.php');
}
