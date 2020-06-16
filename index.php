<?php  include('server.php'); ?>
<?php include('edit.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Home </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg container mt-5 alert <?php echo $_SESSION['class'];?>">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<form method="post" action="server.php">
	<div class="container mt-5">
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="<?php echo $name;?>"required>
  </div>

<div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $email;?>" required>
  </div>
  <div class="form-group">
    <label for="number">Number</label>
    <input type="tel" class="form-control" name="number" placeholder="Type your number" value="<?php echo $pnumber;?>"required>
  </div>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <?php if ($update == true): ?>
	<button class="btn btn-success" type="submit" name="update">update</button>
<?php else: ?>
	<button class="btn btn-primary" type="submit" name="save" >Save</button>
<?php endif ?>
	</div>
</form>
<br>

<?php $results = mysqli_query($db, "SELECT * FROM form"); ?>
<div class="container">
<table class="table table-hover table-bordered">
	<thead>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>Number</th>
		<th>Time</th>
		<th>Edit</th>
		<th>Delete</th>
		
	</tr>
	</thead>

		<?php while ($row = mysqli_fetch_array($results)) { ?>
<tr>
	<td> <?php echo $row['id'];?></td>
	<td><?php echo $row['Name'];?></td>
	<td><?php echo $row['Email'];?></td>
	<td><?php echo $row['Phone'];?></td>
	<td>Updated at <?php echo $row['updated_at'];?>
	<td><a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-success"> Edit</a></td>
	<td><a href="server.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>

			</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>