<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Search Result</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url('img1.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        .container {
            background-color: rgba(147, 69, 69, 0.8); /* BROWN fixed */
            padding: 20px;
            margin: 50px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        .no-data {
            color: red;
            text-align: center;
        }
        a {
            color: cyan;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agent Information</h1>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

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
            $agentID = $_POST['agentID'];

            // SQL query to fetch agent information by AgentID
            $sql = "SELECT * FROM agents WHERE AgentID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $agentID);

            // Execute the query
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Fetch and display the agent's information
                    while ($row = $result->fetch_assoc()) {
                        echo "<p><strong>Agent ID:</strong> " . htmlspecialchars($row['AgentID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>First Name:</strong> " . htmlspecialchars($row['Fname'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Last Name:</strong> " . htmlspecialchars($row['Lname'] ?? 'NULL') . "</p>";
                        echo "<p><strong>Property ID:</strong> " . htmlspecialchars($row['PropertyID'] ?? 'NULL') . "</p>";
                        echo "<p><strong>User ID:</strong> " . htmlspecialchars($row['UserID'] ?? 'NULL') . "</p>";
                    }
                } else {
                    echo "<p class='no-data'>No agent found with AgentID: $agentID</p>";
                }
            } else {
                echo "<p class='no-data'>Error executing query: " . $stmt->error . "</p>";
            }

            // Close the statement
            $stmt->close();
        }

        // Close the database connection
        $conn->close();
        ?>
        <p><a href="search_agent.html">Go Back to Search</a></p>
    </div>
</body>
</html>
