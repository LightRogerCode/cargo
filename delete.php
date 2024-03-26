<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: login.php");
}
include 'connection.php';
$id = $_GET['ititle'];
$query = "DELETE FROM `items` WHERE title = '$id'";
$query2 = "DELETE FROM `import` WHERE title = '$id'";
$query3 = "DELETE FROM `export` WHERE title = '$id'";
$run = mysqli_query($conn,$query);
$run1 = mysqli_query($conn,$query2);
$run2 = mysqli_query($conn,$query3);
if($run){
    header("Location: index.php");
}
?>