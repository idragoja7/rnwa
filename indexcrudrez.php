<?php include('servercrudrez.php'); 
//dobavi record
if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$edit_state = true;
	$rec = mysqli_query($db,"SELECT * FROM korisnici WHERE id=$id");
	$record = mysqli_fetch_array($rec);
	$ime=$record['ime'];
	$prezime=$record['prezime'];
	$email=$record['email'];
	$lozinka=$record['lozinka'];
	$razina=$record['razina'];
	$id=$record['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kreiranje,brisanje,update rezervacija</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<a href=index.php>Povratak na naslovnu stranicu</a>
	<?php if (isset($_SESSION['msg'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
	<?php endif ?>

	<table>
		<thead>
			<tr>
				<th>ime</th>
				<th>prezime</th>
				<th>email</th>
				<th>lozinka</th>
				<th>razina</th>
				<th colspan="2">AKCIJA</th>
			</tr>
		
		</thead>
		<tbody>
			<?php while ($row =mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['ime']; ?></td>
					<td><?php echo $row['prezime']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['lozinka']; ?></td>
					<td><?php echo $row['razina']; ?></td>
					<td>
						<a class="edit_btn" href="indexcrud.php?edit=<?php echo $row['id']; ?>">Editiranje</a>
					</td>
					<td>
						<a class="del_btn" href="servercrud.php?del=<?php echo $row['id']; ?>">Brisanje</a>
					</td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
	<form method="post" action="servercrud.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Ime</label>
			<input type="text" name="ime" value="<?php echo $ime; ?>">
		</div>
		<div class="input-group">
			<label>Prezime</label>
			<input type="text" name="prezime" value="<?php echo $prezime; ?>">
		</div>
		
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>lozinka</label>
			<input type="text" name="lozinka" value="<?php echo $lozinka; ?>">
		</div>
		<div class="input-group">
			<label>Razina</label>
			<input type="text" name="razina" value="<?php echo $razina; ?>">
		</div>
		
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="spremi" class="btn">Spremi</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn">Update</button>
		<?php endif ?>
			
		
	</form>
	
	
</body>
</html>