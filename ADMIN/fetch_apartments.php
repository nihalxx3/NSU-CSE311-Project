<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Apartment List</h2>
    <table>
        <thead>
            <tr>
                <th>Address</th>
                <th>Unit Number</th>
                <th>Property ID</th>
                <th>Size (sq ft)</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_apartments.php'; ?>
        </tbody>
    </table>
</body>
</html>
