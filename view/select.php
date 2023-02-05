<?php




?>

<div class="dropdown">
    <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_GET["display_user"] ?? "SHOW"; ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page + 1; ?>&display_user=5"> 5 </a></li>
        <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page + 1; ?>&display_user=10"> 10 </a></li>
        <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo $page + 1; ?>&display_user=25"> 25 </a></li>
    </ul>
</div>