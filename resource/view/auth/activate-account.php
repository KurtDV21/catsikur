<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

// Check if the token is present in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = $userController->activate($token);
    
    if ($user) {
        // Activate the account
        $userController->confirmAccount($user['id']);
        echo "Your account has been activated successfully.";
        header("Location: /loginto");
    } else {
        echo "Invalid or expired activation token.";
    }
} else {
    echo "No activation token provided.";
}
