<?php
require 'config.php';

if($_POST){
	$title=$_POST['title'];
	$desc=$_POST['description'];

	$sql="Insert Into todo(title,description) VALUES (:title,:description)";
	$pdostatement=$pdo->prepare($sql);
	$result=$pdostatement->execute(
		array(
			':title'=>$title,
		    ':description'=>$desc
		)
    );
    if ($result) {
     	echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
     } 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="card">
		<div class="card-body">
			<h2>Create New Todo</h2>
			<form class="" action="add.php" method="post">
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" name="title" value="" required="">
				</div>
				<div class="form-group">
					<label for="">Description</label>
					<textarea name="description" class="form-control" rows="8" cols="80"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="SUBMIT">
					<a href="index.php" class="btn btn-warning" value="SUBMIT">Back</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>