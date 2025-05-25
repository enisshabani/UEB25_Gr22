<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
    header('location:index.php');
}
else {
    if(isset($_REQUEST['eid'])) {
        $eid=intval($_GET['eid']);
        $status="0";
        $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status',$status, PDO::PARAM_STR);
        $query->bindParam(':eid',$eid, PDO::PARAM_STR);
        $query->execute();
        $msg="Testimonial Successfully Inacrive";
    }

    if(isset($_REQUEST['aeid'])) {
        $aeid=intval($_GET['aeid']);
        $status=1;
        $sql = "UPDATE tbltestimonial SET status=:status WHERE id=:aeid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status',$status, PDO::PARAM_STR);
        $query->bindParam(':aeid',$aeid, PDO::PARAM_STR);
        $query->execute();
        $msg="Testimonial Successfully Active";
    }
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    ...
    <title>Car Rental Portal | Admin Manage testimonials</title>
    ...
</head>
<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
<div class="content-wrapper">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <h2 class="page-title">Manage Testimonials</h2>
        <div class="panel panel-default">
        <div class="panel-heading">User Testimonials</div>
        <div class="panel-body">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>... </thead>
            <tfoot>... </tfoot>
            <tbody>
