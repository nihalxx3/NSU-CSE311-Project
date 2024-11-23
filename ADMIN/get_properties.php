<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Empty for XAMPP
$dbname = "rems";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SQL query to fetch all data from the properties table
$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);

// Check if records exist
if (mysqli_num_rows($result) > 0) {
    // Fetch data and output each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['PropertyID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['PropertyType']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Location']) . "</td>";
        echo "<td>" . htmlspecialchars($row['CityID'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['BuilderID'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['UserID'] ?: 'N/A') . "</td>";
        echo "<td>" . htmlspecialchars($row['AgentID'] ?: 'N/A') . "</td>";
        echo "</tr>";
    }
} else {
    // If no records exist
    echo "<tr><td colspan='7'>No properties found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
