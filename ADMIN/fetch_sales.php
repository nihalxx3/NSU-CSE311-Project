<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Sales List</h2>
    <table>
        <thead>
            <tr>
                <th>Sale Price</th>
                <th>Property ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_sales.php'; ?>
        </tbody>
    </table>
</body>
</html>
