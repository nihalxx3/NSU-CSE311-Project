<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
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
            background-color: #9f4f4f;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Property Details</h1>
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
            // Get the PropertyID from the form input
            $propertyID = intval($_POST['propertyID']); // Ensure it's an integer

            // SQL query to fetch property details
            $sql = "SELECT * FROM properties WHERE PropertyID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $propertyID);

            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Fetch and display the property details
                    while ($row = $result->fetch_assoc()) {
                        echo "<p><strong>Property ID:</strong> " . htmlspecialchars($row['PropertyID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Property Type:</strong> " . htmlspecialchars($row['PropertyType'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Location:</strong> " . htmlspecialchars($row['Location'] ?? 'NULL') . "</p>";
                        echo "<p><strong>City ID:</strong> " . htmlspecialchars($row['CityID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>User ID:</strong> " . htmlspecialchars($row['UserID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Builder ID:</strong> " . htmlspecialchars($row['BuilderID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Agent ID:</strong> " . htmlspecialchars($row['AgentID'] ?? 'NULL') . "</p>";
                    }
                } else {
                    echo "<p class='no-data'>No property found with PropertyID: $propertyID</p>";
                }
            } else {
                echo "<p class='no-data'>Error executing query: " . $stmt->error . "</p>";
            }

            $stmt->close(); // Close the statement
        }

        $conn->close(); // Close the database connection
        ?>
        <p style="text-align: center;"><a href="search_property.html" style="color: cyan; text-decoration: none;">Go Back</a></p>
    </div>
</body>
</html>
