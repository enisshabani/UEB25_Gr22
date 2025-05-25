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
