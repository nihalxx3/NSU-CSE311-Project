<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Type</th>
                <th>Property ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_users.php'; ?>
        </tbody>
    </table>
</body>
</html>
