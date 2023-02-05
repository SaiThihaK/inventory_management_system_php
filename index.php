<?php
session_start();
define("ROOT_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR);
@include_once "./db.php";


if (!isset($_SESSION["user_type"])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<body>
    <?php @include_once "./view/layout/navbar.php" ?>
</body>

</html>