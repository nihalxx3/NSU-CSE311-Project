<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Building List</h2>
    <table>
        <thead>
            <tr>
                <th>Building ID</th>
                <th>Address</th>
                <th>Flats</th>
                <th>Floors</th>
                <th>Builder ID</th>
                <th>Property ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_buildings.php'; ?>
        </tbody>
    </table>
</body>
</html>
