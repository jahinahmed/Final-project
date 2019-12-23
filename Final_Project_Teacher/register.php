<?php

  session_start();
  require('db.php');
if(isset($_POST['auto']))
{ $con= getConnection();
	
	$sql= "select count(*) from users";
	$result= mysqli_query($con,$sql);
	$count= mysqli_fetch_assoc($result);
	$count['count(*)']++ ;
	echo $count['count(*)'];
	
}
if(isset($_POST['uid']))
{$id= $_POST['uid'];
$pass= $_POST['pass'];
$name= $_POST['name'];
$email= $_POST['email'];
$type= $_POST['type'];
$gender= $_POST['gender'];

$con= getConnection();
$sql= "insert into users values ('{$id}', '{$name}','{$email}','{$gender}')";
$sql1 = "insert into login values ('{$id}', '{$pass}','{$type}')";
 
 if($result1= mysqli_query($con,$sql1))
 {
 if($result= mysqli_query($con,$sql))
 {
	$_SESSION['id']=$id;
	$_SESSION['pass']=$pass;
	$_SESSION['type']= $type;
	
	echo "true";
 }}
else
{echo "Registration not done ";} 
}
?>
