<?php
include('includes/connection.php');

$updateSuccess = false;
$updateError = false;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Get current timestamp
    $timestamp = date('Y-m-d H:i:s');

    // Insert data into the contact database table
    $sql = "INSERT INTO contact (email, phone, message, created_at) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        if ($stmt->execute([$email, $phone, $message, $timestamp])) {
            $updateSuccess = true;
        } else {
            $updateError = true;
        }
    } else {
        $updateError = true;
    }
}

// Fetch contact information from the database
$sql = "SELECT * FROM contact ORDER BY id DESC LIMIT 1"; // Assuming you want to fetch the latest contact entry
$stmt = $conn->query($sql);
$contact_info = $stmt->fetch(PDO::FETCH_ASSOC);

?>
