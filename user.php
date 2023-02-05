<?php
session_start();
@include_once "./db.php";

if (!isset($_SESSION["user_type"])) {
    header("location:login.php");
}



$query = "select * from user";
$response = mysqli_query($connectdb, $query);
$total_data = mysqli_num_rows($response); //the numbers of data of the table in the database
//the number of users we want to display on the table

if (isset($_GET["display_user"])) {
    $display_user = $_GET["display_user"];
} else {
    $display_user = 10;
}




$total_pages = ceil($total_data / $display_user);




if (isset($_GET["page"])) {
    $page = $_GET["page"] - 1;
    $query = "select * from user LIMIT $page,$display_user";
    $response = mysqli_query($connectdb, $query);
} else {
    $page = 0;
    $query = "select * from user LIMIT $page,$display_user";
    $response = mysqli_query($connectdb, $query);
}


?>

<!DOCTYPE html>
<html lang="en">
<?php @include_once "./view/layout/header.php" ?>

<body>
    <?php @include_once "./view/layout/navbar.php" ?>
    <div class="container">
        <div class="w-100 mt-3">
            <div class=" w-100 d-flex justify-content-end align-items-center">
                <a href="create_user.php">
                    <button type="button" class="btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add
                    </button>
                </a>
            </div>
            <?php @include_once "./view/select.php" ?>
            <!-- Table -->
            <div class="mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <?php
                    if ($response) {
                        while ($row = mysqli_fetch_assoc($response)) {
                            $user_id = $row['user_id'];
                            $user_name = $row["user_name"];
                            $user_email = $row['user_email'];
                            $user_status = $row["user_status"] == "active"
                                ? "<span class='p-1 bg-success rounded-pill text-light'>active</span>"
                                : "<span class='p-1 bg-danger rounded-pill text-light'>inactive</span>";
                            echo "<tbody>
            <tr>
                <th scope='row'>$user_id</th>
                <td scope='row'>$user_name</td>
                <td scope='row'>$user_email</td>
                <td scope='row'>$user_status</td>
                <td scope='row'>
                <a href='update_user.php?user_id=$user_id'>
                <button class='btn btn-warning'>
                <i class='fa-regular fa-pen-to-square'></i>
                Edit
                </button>
                </a>
                </td>
                <td scope='row'>
                <a href='delete_user.php?user_id=$user_id'>
                <button class='btn btn-danger'>
                <i class='fa-solid fa-trash'></i>
                Edit
                </button></a>
                
                </td>
            </tr>
    
        </tbody>";
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
    <?php @include_once "./view/pagination.php" ?>
</body>

</html>