<?php


$connectdb = new mysqli("localhost", "root", "sai2002dec24", "inventory_management_system");

if ($connectdb) {
    echo "";
} else {
    die(mysqli_error($connectdb));
}
