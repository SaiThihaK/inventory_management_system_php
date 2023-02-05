<?php
if (!isset($_SESSION["user_type"])) {
    header("location:login.php");
}
include "db.php";
$id = $_GET["user_id"];

$query = "delete from user where user_id=$id";

$result = mysqli_query($connectdb, $query);

if ($result) {
    header('location:user.php');
} else {
    die(mysqli_errno($connectdb));
}
