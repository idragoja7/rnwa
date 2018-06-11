<?php 
//session_start();
 //inicijalizacija
 $ime="";
 $prezime="";
 $email="";
 $lozinka="";
  $razina="";
 $id=0;
 $edit_state= false;
 
 $db=mysqli_connect('localhost','root','','iznajmljivanje_auta');
 
 if(isset($_POST['spremi'])){
	 $ime=$_POST['ime'];
	 $prezime=$_POST['prezime'];
	 $email=$_POST['email'];
	 $lozinka=$_POST['lozinka'];
	 $razina=$_POST['razina'];
	 
	 $query="INSERT INTO korisnici(ime,prezime,email,lozinka,razina) VALUES('$ime','$prezime','$email','$lozinka','$razina')";
	 mysqli_query($db,$query);
	 $_SESSION['msg']="Uspješno kreiran korisnik";
	 header('location: indexcrud.php');
 }
 //update
 if(isset($_POST['update'])){
	 $ime = mysqli_real_escape_string($db,$_POST['ime']);
	 $prezime = mysqli_real_escape_string($db,$_POST['prezime']);
	 $email = mysqli_real_escape_string($db,$_POST['email']);
	 $lozinka = mysqli_real_escape_string($db,$_POST['lozinka']);
	 $razina = mysqli_real_escape_string($db,$_POST['razina']);
	 $id = mysqli_real_escape_string($db,$_POST['id']);
	 
	 mysqli_query($db,"UPDATE korisnici SET ime='$ime',prezime='$prezime',email='$email',lozinka='$lozinka',razina='$razina' WHERE id=$id");
	 $_SESSION['msg']="Korisnički podatci izmjenjeni";
	 header('location: indexcrud.php');
	 
 }
 
//DELETE
 if(isset($_GET['del'])){
	 $id = $_GET['del'];
	 mysqli_query($db, "DELETE FROM korisnici WHERE id=$id");
	 $_SESSION['msg']= "Korisnik izbrisan";
	 header('location: indexcrud.php');
	 
	 
 }
 
 
 $results=mysqli_query($db,"SELECT * FROM korisnici");
 
?>