<?php
if (isset($_POST["create-user"])) {
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    if ($user_email != "" || $user_name != "" || $user_password != "") {
        // Temporary solution I know that's not the right answer;
        $query = "insert into `user`(user_name,user_email,user_password,user_type,user_status) values('$user_name','$user_email','$user_password','user','active')";
        $response = mysqli_query($connectdb, $query);
        $_POST["user_name"] = "";
        $_POST["user_email"] = "";
        $_POST["user_password"] = "";
    }
}




?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Form for creating user -->
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" type="submit" name="create-user">Create User</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>