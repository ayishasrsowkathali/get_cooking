<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}

// Include the database connection file
require_once 'db_connection.php';

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the current password, new password, and confirm password from the form
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the form data
    $errors = array();

    // Check if the current password is correct
    $stmt = $conn->prepare('SELECT password FROM users WHERE id = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!password_verify($current_password, $row['password'])) {
        $errors[] = 'The current password is incorrect.';
    }

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        $errors[] = 'The new password and confirm password do not match.';
    }

    // Check if the new password meets the minimum requirements
    if (strlen($new_password) < 8) {
        $errors[] = 'The new password must be at least 8 characters long.';
    }

    // If there are no errors, update the password in the database
    if (count($errors) === 0) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
        $stmt->bind_param('si', $hashed_password, $user_id);
        $stmt->execute();

        // Redirect to the profile page with a success message
        header('Location: profile.php?success=1');
        exit();
    }
}

// Render the change password form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <?php if (isset($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password"><br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password"><br>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password"><br>
        <input type="submit" value="Change Password">
    </form>
</body>
</html>
