<?php
session_start();
@include_once "./db.php";
if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
}

$user_name = "";
$user_email = "";

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $query = "select * from user where user_id = '$user_id'";
    $response = mysqli_query($connectdb, $query);
    if ($response) {
        while ($row = mysqli_fetch_assoc($response)) {
            $user_name = $row["user_name"];
            $user_email = $row["user_email"];
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<body>
    <?php @include_once "./view/layout/navbar.php" ?>
    <div class="container">
        <div class="mt-2 p-2 w-100 d-flex justify-content-center flex-column mt-3">
            <h2 class="d-flex justify-content-center align-items-center">Edit Profile</h2>
            <form class="w-100 ">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name" value=<?php echo $user_name ?>>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" value=<?php echo $user_email ?>>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" value="submit" class="form-control mb-3 btn btn-primary">Edit Change</button>
            </form>


        </div>
    </div>

</body>

</html>