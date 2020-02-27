<?php

    include 'includes/myfirebase.php';

    $username_admin_url = $_GET['username_url'];

    $reference = 'Admin/'.$username_admin_url;

    $pushData = $database->getReference($reference)->remove();
    header('location: includes/user_destroy.php');

?>