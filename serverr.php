<?php 
session_start();
 //inicijalizacija
 $name="";
 $address="";
 $id=0;
 
 $db=mysqli_connect('localhost','root','','crud');
 
 if(isset($_POST['save'])){
	 $name=$_POST['name'];
	 $address=$_POST['address'];
	 
	 $query="INSERT INTO info(name,address) VALUES('$name','$address')";
	 mysqli_query($db,$query);
	 $_SESSION['msg']="Addres saved";
	 header('location: indexx.php');
 }
 
 $results=mysqli_query($db,"SELECT * FROM info");
 
?>