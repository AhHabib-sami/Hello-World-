<?php
include '../Controller/Registration_Logic.php';
$nameErr = $emailErr = $usernameErr = $genderErr = $dateErr = "";
$name = $email = $username = $gender = $date = "";
if (!isset($_GET['username'])) {
    include "not_found.php";
    exit;
}

$username = $_GET['username'];
$user = GetUserInfo($username);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = updateINFO($_POST, $username);
    session_start();
    header("location:View_Profile.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update User</title>

    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container" style="width:700px;">
        <h3>Update User</h3><br />
        <form method="post">

            <br />
            <label>Name</label>
            <input type="text" name="name"  value="<?php echo $user['name']; ?>" />

            </br>
            <label>E-mail</label>
            <input type="text" name="e-mail"  value="<?php echo $user['e-mail']; ?>" />

            </br>
            <label>User Name</label>
            <input type="text" name="username"  value="<?php echo $user['username']; ?>" />

            </br>


            <fieldset>

                <legend>Date of Birth:</legend>
                <input type="date" name="dob" value="<?php echo $user['dob']; ?>">

                </br>
            </fieldset>

            <input type="submit" value="Append" class="btn btn-info" /><br />

        </form>
    </div>
</body>

</html>