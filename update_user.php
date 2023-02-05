<?php
session_start();

@include_once "./db.php";


if (!isset($_SESSION["user_type"])) {
    header("location:login.php");
}
$user_id = $_GET['user_id'];
$getQuery = "select * from user where user_id = $user_id ";
$response = mysqli_query($connectdb, $getQuery);

if ($response) {
    $row = mysqli_fetch_assoc($response);
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
}

if (isset($_POST['submit'])) {

    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["password"];


    $query = "update `user` set user_name='$user_name',user_email='$user_email',user_password='$password'  where user_id = '$user_id' ";


    $response = mysqli_query($connectdb, $query);
    if ($response) {
        // echo "data is inserted";
        header("location:user.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<body>
    <?php @include_once "./view/layout/navbar.php" ?>
    <div class="container">
        <h1 class="d-flex justify-content-center mb-10">Update User</h1>
        <div>
            <form class="p-10 w-75" method="POST">
                <div class="mt-4 w-full d-flex flex-column form-group">
                    <label class="mb-1">User name</label>
                    <input placeholder="name" name="user_name" class="p- form-control" value=<?php echo $user_name ?> />
                </div>
                <div class="mt-4 w-full d-flex flex-column form-group">
                    <label class="mb-1">Email</label>
                    <input placeholder="email" name="user_email" class="p-2 form-control " value=<?php echo $user_email ?> />
                </div>
                <div class="mt-4 w-full d-flex flex-column form-group">
                    <label class="mb-1">Password</label>
                    <input placeholder="password" name="user_password" class="p-2 form-control" value=<?php echo $user_password ?> />
                </div>

                <div class="d-flex justify-content-start mt-4">
                    <button type="sumit" class="btn btn-primary form-control" name="submit" value="Submit">Edit Change</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>