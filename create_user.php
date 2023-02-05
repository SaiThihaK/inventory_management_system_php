<?php
session_start();
@include_once "./db.php";
if (isset($_POST["create-user"])) {
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    if ($user_email != "" || $user_name != "" || $user_password != "") {
        // Temporary solution I know that's not the right answer;
        $query = "insert into `user`(user_name,user_email,user_password,user_type,user_status) values('$user_name','$user_email','$user_password','user','active')";
        $response = mysqli_query($connectdb, $query);
        header("location:user.php");
    }
}



if (!isset($_SESSION["user_type"])) {
    header("location:login.php");
}
$query = "select * from user";
$response = mysqli_query($connectdb, $query);

?>

<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<body class="h-100">
    <div class="container mt-5">
        <h1 class="d-flex justify-content-center mb-10">Create User</h1>
        <form class="w-100" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_email">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_password">
            </div>
            <div>

                <button type="submit" class="btn btn-primary form-control" type="submit" name="create-user">Create User</button>
            </div>
        </form>
    </div>



    <!-- Create User Modal -->
</body>


</html>