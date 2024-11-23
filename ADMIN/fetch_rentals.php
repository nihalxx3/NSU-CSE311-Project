<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Rental List</h2>
    <table>
        <thead>
            <tr>
                <th>Rental ID</th>
                <th>Property ID</th>
                <th>Agreement Date</th>
                <th>Rent Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_rentals.php'; ?>
        </tbody>
    </table>
</body>
</html>
