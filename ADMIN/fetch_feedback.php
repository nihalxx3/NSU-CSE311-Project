<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Feedback List</h2>
    <table>
        <thead>
            <tr>
                <th>Comment</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get_feedback.php'; ?>
        </tbody>
    </table>
</body>
</html>
