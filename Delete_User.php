<?php
include '../Controller/Registration_Logic.php';

if (!isset($_GET['username'])) {
    include "Not_found.php";
    exit;
}
$username = $_GET['username'];
deleteUser($username);

header("Location: View_Profile.php");
