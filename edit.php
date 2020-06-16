<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM form WHERE id=$id");

		if ($record!='')
		 {
		$edit = mysqli_fetch_array($record);
			$name = $edit['Name'];
			$email=$edit['Email'];
			$pnumber=$edit['Phone'];
		}
	}
?>