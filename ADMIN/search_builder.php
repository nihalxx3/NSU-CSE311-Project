<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Builder Details</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #222;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            background-color: #8a2929;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        h1 {
            text-align: center;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        .no-data {
            text-align: center;
            color: red;
        }
        .back-btn {
            text-align: center;
            margin-top: 20px;
        }
        .back-btn a {
            color: cyan;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Builder Details</h1>
        <?php
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "rems";

        // Create a database connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("<p class='no-data'>Connection failed: " . mysqli_connect_error() . "</p>");
        }

        // Check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the BuilderID from the form input
            $builderID = intval($_POST['builderID']); // Ensure it's an integer

            // SQL query to fetch builder details
            $sql = "SELECT * FROM builders WHERE BuilderID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $builderID);

            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Fetch and display the builder details
                    while ($row = $result->fetch_assoc()) {
                        echo "<p><strong>Builder ID:</strong> " . htmlspecialchars($row['BuilderID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>First Name:</strong> " . htmlspecialchars($row['Fname'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Last Name:</strong> " . htmlspecialchars($row['Lname'] ?? 'NULL') . "</p>";
                    }
                } else {
                    echo "<p class='no-data'>No builder found with BuilderID: $builderID</p>";
                }
            } else {
                echo "<p class='no-data'>Error executing query: " . $stmt->error . "</p>";
            }

            $stmt->close(); // Close the statement
        }

        $conn->close(); // Close the database connection
        ?>
        <div class="back-btn">
            <a href="search_builder.html">Go Back</a>
        </div>
    </div>
</body>
</html>
