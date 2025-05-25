<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
{
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $contactno = $_POST['contactno'];
  $message = $_POST['message'];
  
  $sql = "INSERT INTO tblcontactusquery(name,EmailId,ContactNumber,Message) 
          VALUES(:name, :email, :contactno, :message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
  $query->bindParam(':message', $message, PDO::PARAM_STR);
  $query->execute();

  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId) {
    $msg = "Query Sent. We will contact you shortly";
  } else {
    $error = "Something went wrong. Please try again";
  }
}

