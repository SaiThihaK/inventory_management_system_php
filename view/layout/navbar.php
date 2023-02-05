<div class="container">
    <h2 class="d-flex justify-content-center align-items-center">Inventory Management System</h2>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-full">
        <div class="container-fluid w-100">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php
                    if ($_SESSION['user_type'] == 'master') {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Brand</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Product</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Order</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo ucfirst($_SESSION["user_name"]) ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION['user_type'] == 'master') {
                ?>
                    <li><a href="user.php">User</a></li>
                    <li><a href="category.php">Category</a></li>
                    <li><a href="brand.php">Brand</a></li>
                    <li><a href="product.php">Product</a></li>
                <?php
                }
                ?>
                <li><a href="order.php">Order</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["user_name"]; ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav> -->
</div>