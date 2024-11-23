<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Properties List</h2>
    <table>
        <thead>
            <tr>
                <th>Property ID</th>
                <th>Property Type</th>
                <th>Location</th>
                <th>City ID</th>
                <th>Builder ID</th>
                <th>User ID</th>
                <th>Agent ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_properties.php'; ?>
        </tbody>
    </table>
</body>
</html>
