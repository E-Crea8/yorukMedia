<?php 
session_start();
if (!isset($_SESSION['id'])){
header('location:../index');
}
$id_session=$_SESSION['id'];
?>