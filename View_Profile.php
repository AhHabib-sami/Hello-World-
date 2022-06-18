<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class='container' style="width:700px;margin-top:5%">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Dob</th>

                    </tr>
                </thead>
                <tbody>
                    <?php include '../Controller/Registration_Logic.php';
                    $users = dataloading();
                    foreach ($users as $user) : ?>
                        <tr>

                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['e-mail'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['gender'] ?></td>
                            <td><?php echo $user['dob'] ?></td>
                            <td>
                                <a href="update.php?username=<?php echo $user['username'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                                <a href="Delete_User.php?username=<?php echo $user['username'] ?>" class="btn btn-sm btn-outline-secondary">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <a href="Registration.php" class="btn btn-primary">Add User</a>
        <a href="Dashboard.php" class="btn btn-primary">Dashboard</a>
    </div>
</body>

</html>