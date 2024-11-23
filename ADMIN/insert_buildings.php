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
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs and sanitize them
    $buildingID = intval($_POST['buildingID']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $flats = intval($_POST['flats']);
    $floors = intval($_POST['floors']);
    $builderID = intval($_POST['builderID']);
    $propertyID = intval($_POST['propertyID']);

    // Validate foreign key IDs (BuilderID and PropertyID)
    $builder_check_sql = "SELECT COUNT(*) FROM builders WHERE BuilderID = ?";
    $stmt_builder = $conn->prepare($builder_check_sql);
    $stmt_builder->bind_param("i", $builderID);
    $stmt_builder->execute();
    $stmt_builder->bind_result($builder_exists);
    $stmt_builder->fetch();
    $stmt_builder->close();

    $property_check_sql = "SELECT COUNT(*) FROM properties WHERE PropertyID = ?";
    $stmt_property = $conn->prepare($property_check_sql);
    $stmt_property->bind_param("i", $propertyID);
    $stmt_property->execute();
    $stmt_property->bind_result($property_exists);
    $stmt_property->fetch();
    $stmt_property->close();

    if (!$builder_exists) {
        echo "Error: BuilderID $builderID does not exist.";
    } elseif (!$property_exists) {
        echo "Error: PropertyID $propertyID does not exist.";
    } else {
        // SQL query to insert data
        $sql = "INSERT INTO buildings (BuildingID, Address, Flats, Floors, BuilderID, PropertyID)
                VALUES (?, ?, ?, ?, ?, ?)";

        // Use prepared statements for security
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiiii", $buildingID, $address, $flats, $floors, $builderID, $propertyID);

        // Execute the query
        if ($stmt->execute()) {
            echo "Building details added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    }

    $conn->close(); // Close the database connection
}
?>
