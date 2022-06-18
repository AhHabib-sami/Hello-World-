<?php
session_start();
include '../Controller/Registration_Logic.php';
$otperr = "";
$emailerr = "";
$otp = "998877";
if (isset($_POST['submit'])) {

    if (empty($_POST["otp"])) {
        $emailerr = "OTP is required";
    } else {

        $otp = ($_POST["otp"]);
        $file_data = dataloading();
        foreach ($file_data as $data) {
            if ($_POST['otp'] == $otp) {
                $_SESSION['username'] = $data['username'];
                header("location:User_Dashboard.php");
            } else {
                $otperr = "OTP doesn't match";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>

</head>

<body>
    <h1>Use otp to enter into your account</h1>


        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <fieldset>
                <legend> OTP </legend>
                Enter OTP: <input type="text" name="otp" >
                <span >* <?php echo $emailerr; ?></span>
                <br><br>
                <input type="submit" name="submit" value="Submit" >

                <h3>Your OTP is <?php echo $otp; ?> </h3>
                <h3> <?php echo $otperr; ?> </h3>
            </fieldset>
        </form>
        <a href="Login.php">Go to Login</a>
    </div>
    <?php require 'footer.php'; ?>
</body>

</html>