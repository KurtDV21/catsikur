<?php

use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $role = 'user';
    // Register the user and get the activation hash
    $activation_hash = $userController->register($role, $_POST["name"], $_POST["email"], $_POST["password"]);
    
    // Retrieve the newly registered user's ID
    $newUserId = $dbConnection->insert_id;

    // Send activation email with the activation link
    $activation_link = "http://localhost/activate-account.php?token=" . $activation_hash; // Update your domain
    // Use PHPMailer or similar library to send the email here

    // Redirect to profile creation page, passing user ID
    header("Location: /profile2?user_id=" . $newUserId);
    exit;
}
?>
