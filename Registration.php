<?php
include '../Controller/Registration_Logic.php';
$message = '';

$nameErr = $emailErr = $genderErr = $dateErr = $degreeErr = $BGErr = "";
$name = $email = $gender = $date   = $Degree =  $BG = "";
$usernameErr = $passErr = $conpassErr = "";
$username = $pass = $conpass = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else if (!empty($_POST["name"])) {
        $name = ($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $name = "";
        } else if (strlen($name) < 2) {
            $nameErr = "Contains at least two  words";
            $name = "";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else if (!empty($_POST["email"])) {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }
    if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
    } else if (!empty($_POST["username"])) {
        $username = ($_POST["username"]);
        if (!preg_match("/^[a-zA-Z-'_]*$/", $username)) {
            $usernameErr = "Only letters and underscore allowed";
            $username = "";
        } else if (strlen($username) < 2) {
            $usernameErr = "Contains at least two  words";
            $username = "";
        }
    }
    if (empty($_POST["password"])) {
        $passErr = "password is required";
    } else if (!empty($_POST["password"])) {
        $pass = ($_POST["password"]);
        if (strlen($pass) < 8) {
            $passErr = " must not be less than eight (8) characters";
            $pass = "";
        } else if (!preg_match("/[@, #, $,%]/", $pass)) {
            $passErr = "must contain at least one of the special characters (@, #, $,%)";
            $pass = "";
        }
    }
    if (empty($_POST["confirmpassword"])) {
        $conpassErr = "This field is required";
    } else if (!empty($_POST["confirmpassword"])) {
        if ($_POST["password"] == $_POST["confirmpassword"]) {
            $conpass = $_POST["confirmpassword"];
        } else {

            $conpassErr = "doest not match to the new password";
        }
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else if (!empty($_POST["gender"])) {
        $gender = ($_POST["gender"]);
    }
    if (empty($_POST["dob"])) {
        $dateErr = "cannot be empty";
    } else if (!empty($_POST["dob"])) {
        $date = ($_POST["dob"]);
    }
    if (!empty($name) && !empty($email) && !empty($username) && !empty($gender) && !empty($date)) {
        if ($_SESSION['username'] == 'Admin') {
            session_start();
            header("location:View_Profile.php");
        } else {
            header("location:Login.php");
        }
        if (file_exists('../Data/Data.json')) {

            $new_data = array(
                'name'               =>     $_POST["name"],
                'e-mail'          =>     $_POST["email"],
                'username'     =>     $_POST["username"],
                'gender'     =>     $_POST["gender"],
                'password' =>     $_POST["password"],
                'dob'    =>     $_POST["dob"],
                'day1'=>     $_POST["day1"],
                'time1'=>     $_POST["time1"]
            );
            addData($new_data);
        } else {
            $error = 'JSON File not exits';
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <br />
    <div class="container" style="width:500px;">
        <h3>Add User</h3><br />
        <form method="post">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
            <br />
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" />
            <span class="error">* <?php echo $nameErr; ?></span>
            </br>
            <label>E-mail</label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" />
            <span class="error">* <?php echo $emailErr; ?></span>
            </br>
            <label>User Name</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" />
            <span class="error">* <?php echo $usernameErr; ?></span>
            </br>
            <label>Password</label>
            <input type="password" name="password" class="form-control" />
            <span class="error">* <?php echo $passErr; ?></span>
            </br>
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" />
            <span class="error">* <?php echo $conpassErr; ?></span>
            <br>
                      <label>day1</label>
                        <input type="text" name="day1" />

                        <br><br>
                        <label>time1</label>
                        <input type="text" name="time1" />
            <br>

            <fieldset>
                <legend>Gender</legend>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label>
                <span class="error">* <?php echo $genderErr; ?></span>
                </br>
                <legend>Date of Birth:</legend>
                <input type="date" name="dob">
                <span class="error">* <?php echo $dateErr; ?></span>
                </br>
            </fieldset>

            <input type="submit" name="submit" value="Append" class="btn btn-info" /><br />
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </form>
    </div>
    <br />
</body>

</html>