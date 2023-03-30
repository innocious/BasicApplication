<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<title>Record</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<h2>Record</h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>$No.</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>

				<tbody>
					<?php
						include_once('mysql.php');
						$a=1;
						$stmt = $conn->prepare(
								"SELECT * FROM users");
						$stmt->execute();
						$users = $stmt->fetchAll();
						foreach($users as $user)
						{
					?>
					<tr>
						<td>
							<?php echo $user['id']; ?>
						</td>
						<td>
							<?php echo $user['name']; ?>
						</td>

						<td>
							<?php echo $user['email']; ?>
						</td>
					</tr>
					<?php $conn = null;
					}
					?>
				</tbody>
			</table>

			<input class="btn btn-primary"
					type="submit" value="OK">
		</div>
	</div>
</body>

</html>
