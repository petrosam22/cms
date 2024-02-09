<?php


session_start();

if (!isset($_SESSION['user'])) {
    // Redirect or handle the case when the user is not logged in
}

$user = $_SESSION['user'];
