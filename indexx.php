<?php include('serverr.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Kreiranje,update i brisanje korisničkih računa</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
			</div>
	<?php endif ?>
	<table>
		<thead>
			<tr>
				<th>e-mail</th>
				<th>Lozinka</th>
				<th colspan="2">Akcija</th>
			</tr>
		</thead>
		<tbody>
			
			<?php while($row=mysqli_fetch_array($results)){?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td>
						<a href="#">Editiranje</a>
					</td>
					<td>
						<a href="#">Brisanje</a>
					</td>
				
				</tr>
				
			<?php}?>
			
			
		</tbody>
	</table>
	
	<form method="post" action="serverr.php">
		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="name">
		</div>

		<div class="input-group">
			<label>Lozinka</label>
			<input type="text" name="address">
		</div>
		<div class="input-group">
			<button type="submit" name="save">spremi</button>
	</form>
	
</body>
</html>
