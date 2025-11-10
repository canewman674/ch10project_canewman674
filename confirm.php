<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Title</title>
    <link rel="stylesheet" href="main.css">
    <script src="script.js" defer></script>
</head>
<body>

<h1>Building a Dynamic Form with PHP</h1>

<p1>Colin Newman</p1>

<p2>11/10/2025</p2>

</body>
</html>

<?php
// Check if the request method is POST (i.e., form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form input values using null coalescing operator to avoid undefined index errors
    $name = $_POST['name'] ?? ''; 
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // --- Input Sanitization Example ---
    // Demonstrate trimming of leading/trailing whitespace
    $inputString = "  PHP Example  ";
    $trimmedString = trim($inputString); // Removes spaces from both ends
    echo $trimmedString;

    // --- Email Sanitization Example ---
    // Remove illegal characters from email input to prevent XSS and malformed data
    $emailInput = "user.name@example.com<script>alert('XSS');</script>"; 
    $sanitizedEmail = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    echo "Original Email: " . $emailInput . "<br>";
    echo "Sanitized Email: " . $sanitizedEmail;

    // Initialize message variables for validation results
    $message = '';
    $message_class = '';

    // --- Input Validation ---
    // Recheck POST request and validate required fields
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Trim all inputs to remove unnecessary spaces
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message_content = isset($_POST['message_content']) ? trim($_POST['message_content']) : '';

        // Check if any required field is empty
        if (empty($name) || empty($email) || empty($message_content)) {
            $message = "Please fill in all required fields.";
            $message_class = "error";
        } else {
            // --- Output Sanitization ---
            // Prevent cross-site scripting by escaping HTML characters before displaying
            $message = "Thank you, " . htmlspecialchars($name) . "! Your message has been received.";
            $message .= "<br>Email: " . htmlspecialchars($email);
            $message .= "<br>Message: " . htmlspecialchars($message_content);
            $message_class = "success";
        }

        // --- Simulated Stored Data Display ---
        // Here is where you'd insert data into a database using a stored procedure
        $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);


        // --- Secure Output Display ---
        // Display a styled confirmation box with sanitized user input
        echo "<div style='border: 1px solid #ccc; padding: 15px; background-color: #f9f9f9; margin-bottom: 20px;'>";
        echo "<h2>Thank you for your submission!</h2>";
        echo "</div>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
        echo "<p><strong>Message:</strong> " . htmlspecialchars($message) . "</p>";
    }
}
?>