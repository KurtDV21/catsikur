<?php
use App\Core\Database;
use App\Models\User;

require_once __DIR__ . '/../../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $userModel->findByEmail($_POST["email"]);
    if ($user) {
        // Generate password reset token and send email
    }
    header("Location: /process-reset-password");
    exit;
}
