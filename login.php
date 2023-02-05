<?php
session_start();
@include_once "./db.php";

if (isset($_SESSION['user_type'])) {
    header("location:index.php");
    return;
}


$message = null;

if (isset($_POST['submit'])) {
    $user_email = $_POST["user_email"];
    $query = "select * from user where user_email = '$user_email'";
    $response = mysqli_query($connectdb, $query);
    if ($response) {
        while ($row = mysqli_fetch_assoc($response)) {
            if ($_POST["user_password"] == $row["user_password"]) {
                if ($row["user_status"] == "active") {
                    echo "set session";
                    $_SESSION["user_type"] = $row["user_type"];
                    $_SESSION["user_id"]  = $row["user_id"];
                    $_SESSION['user_name'] = $row["user_name"];
                    header("location:index.php");
                    return;
                } else {
                    $message = "Your account is inactive";
                }
            } else {
                $message = "Account Not Found";
            }
        }
    } else {
        $message = "Account not found";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
</style>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <form class="card shadow-2-strong" style="border-radius: 1rem;" method="post">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <input type="email" name="user_email" id="typeEmailX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" name="user_password" id="typePasswordX-2" class="form-control form-control-lg" />
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <p class="text-danger"><?php echo $message ?? null ?></p>
                            <button type="sumit" class="btn btn-primary form-control" name="submit" value="submit">submit</button>

                            <hr class="my-4">



                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>