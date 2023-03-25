<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php
	$pdostatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
	$pdostatement->execute();
	$result=$pdostatement->fetchAll();
	?>
<div class="card">
	<div class="card-body">
		<h2>Todo Home Page</h2>

        <div>
          <a href="add.php" type="button" class="btn btn-success">Create New</a>
        </div><br>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Created </th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				if($result){
					foreach ($result as $value) {
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $value['title']?></td>
					<td><?php echo $value['description']?></td>
					<td><?php echo date('y-m-d',strtotime($value['created _at']))?></td>
					<td>
						<a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
						<a type="button" class="btn btn-danger" style="color: red" href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
					</td>
				</tr>
				<?php
				$i++;
					}
				}
				?>
				
			</tbody>
		</table>
	</div>
</div>
</body>
</html>