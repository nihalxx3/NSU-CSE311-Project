<?php
// Database connection settings
$host = 'localhost';  // Your host
$dbname = 'rems';     // Your database name
$username = 'root';   // Your database username
$password = '';       // Empty password for root user in XAMPP

// Set up connection options
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $username, $password, $options);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $fname = $_POST['fname'] ?? '';
        $lname = $_POST['lname'] ?? '';
        $usertype = $_POST['usertype'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';  // Consider hashing with password_hash() in production

        // Insert into Users table
        $stmt = $pdo->prepare("INSERT INTO Users (Fname, Lname, UserType) VALUES (?, ?, ?)");
        $stmt->execute([$fname, $lname, $usertype]);
        $userId = $pdo->lastInsertId();  // Get the auto-generated UserID

        // Insert into login table
        $stmt = $pdo->prepare("INSERT INTO login (LoginID, Email, Password, UserType) VALUES (?, ?, ?, 'user')");
        $stmt->execute([$userId, $email, $password]);  // Use the same UserID for LoginID for consistency

        // Redirect to success page
        header("Location: correct_reg_done.html");
        exit();
    }
} catch (PDOException $e) {
    // Handle database errors
    die("Database error: " . $e->getMessage());
}
?>
