<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data safely
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Option 1: Send email to your address
    $to = "sachinyallappakuadalikar1234@gmail.com"; // Replace with your email
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

    // Option 2: (Optional) Save to a local file (e.g., feedback.txt)
    /*
    $file = fopen("feedback.txt", "a");
    fwrite($file, "Name: $name\nEmail: $email\nMessage:\n$message\n---\n");
    fclose($file);
    */

    // Option 3: (Optional) Save to a database (requires DB connection)
    /*
    // Connect to MySQL
    $conn = new mysqli("localhost", "username", "password", "database");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    */
}
?>
