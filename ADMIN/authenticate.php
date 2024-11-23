<?php
// Start a session to track user login state
session_start();

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
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Prepare and execute query to check login credentials
        $stmt = $pdo->prepare("SELECT * FROM login WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Validate credentials
        if ($user && $password === $user['Password']) { // Plain text password match
            // Set session variables
            $_SESSION['user_id'] = $user['LoginID'];
            $_SESSION['user_type'] = $user['UserType'];

            // Redirect based on user type
            if ($user['UserType'] === 'admin') {
                header("Location: admin_front_page.html");
            } else {
                header("Location: user_front_page.html");
            }
            exit;
        } else {
            // Invalid credentials
            //echo "<p>Login failed. <a href='login.html'>Try again</a></p>";
            header("Location: wrong_login_info.html");
        }
    }
} catch (PDOException $e) {
    // Handle database errors
    die("Database error: " . $e->getMessage());
}
?>
