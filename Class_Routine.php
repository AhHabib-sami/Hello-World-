

    <!DOCTYPE html>
<html lang="en">

<head>
    <title>Class Schedule</title>

</head>

<body>
    <div class='container' style="width:700px;margin-top:5%">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                   </tr>
                </thead>
                <tbody>
                    <?php include '../Controller/Registration_Logic.php';
                    $users = dataloading();
                    foreach ($users as $user) : ?>
                        <tr>

                            <td><?php echo $user['Day1']?></td>
                            <td><?php echo $user['Time1']?></td>
        
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        
        <a href="User_Dashboard.php" class="btn btn-primary">Dashboard</a>
    </div>
</body>

</html>
