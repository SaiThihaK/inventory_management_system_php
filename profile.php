<?php
session_start();
@include_once "./db.php";
if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
}

$user_name = "";
$user_email = "";
$user_id = $_SESSION["user_id"];
// Fetch Profile data
if (isset($_SESSION["user_id"])) {

    $query = "select * from user where user_id = '$user_id'";
    $response = mysqli_query($connectdb, $query);
    if ($response) {
        while ($row = mysqli_fetch_assoc($response)) {
            $user_name = $row["user_name"];
            $user_email = $row["user_email"];
        }
    }
}
// Edit Profile
if (isset($_POST["submit"])) {
    $change_user_name = $_POST["user_name"];
    $change_user_email = $_POST["user_email"];


    $query =  $query = "update `user` set user_name = '$change_user_name', user_email = '$change_user_email' where user_id = '$user_id' ";
    var_dump($query);
    $response = mysqli_query($connectdb, $query);
    if ($response) {
        $query = "select * from user where user_id = '$user_id'";
        $result = mysqli_query($connectdb, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["user_type"] = $row["user_type"];
                $_SESSION["user_id"]  = $row["user_id"];
                $_SESSION['user_name'] = $row["user_name"];
                header("location:index.php");
                return;
            }
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
            <form class="w-100 " method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name" value=<?php echo $user_name ?>>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email" value=<?php echo $user_email ?>>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="sumit" class="btn btn-primary form-control" name="submit" value="Submit">Edit Profile</button>
            </form>


        </div>
    </div>

</body>

</html>