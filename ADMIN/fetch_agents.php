<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Agents List</h2>
    <table>
        <thead>
            <tr>
                <th>Agent ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Property ID</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_agents.php'; ?>
        </tbody>
    </table>
</body>
</html>
