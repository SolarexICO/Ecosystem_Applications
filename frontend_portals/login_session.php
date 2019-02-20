<?php 
 session_start();
     
$_SESSION["email"]=$_POST["email"];
$_SESSION["name"]=$_POST["name"];
$_SESSION["userType"]=$_POST["userType"];
$_SESSION["userPic"]=$_POST["userPic"];



 ?>