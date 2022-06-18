<?php
include 'User_Dashboard.php';
include '../Controller/Registration_Logic.php';
include '../Controller/Validation.php';
if (!isset($_SESSION['username'])) {
    include "not_found.php";
    exit;
}

$username = $_SESSION['username'];
$user = GetUserInfo($username);
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = updateINFO($_POST, $username);
    $msg = "Value updated successfully";
    validation();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile editing</title>

</head>

<body>

        <form method="post">
            Name:
            <input type="text" name="name"  value="<?php echo $user['name']; ?>">
            <br><br>
            E-mail:
            <input type="text" name="e-mail"  value="<?php echo $user['e-mail']; ?>">
            <br><br>

                        <label>Password</label>
            <input type="password" name="password"  value="<?php echo $user['password']; if (isset($_COOKIE['pass'])) {
                                                                                                    echo $_COOKIE['pass'];
                                                                                                }  ?>" />
            <br><br>


            <fieldset>

                <legend>Date of Birth:</legend>
                <input type="date" name="dob"  value="<?php echo $user['dob']; ?>">
                <br><br>
            </fieldset>
            <br><br>
            <input type="submit" value="Update" class="btn btn-info" /><br />
            <?php
            echo $msg;
            ?>
        </form>
    </div>
</body>

</html>