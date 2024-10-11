<?php

use App\Core\Database;
use App\Models\User;

require_once __DIR__ . '/../../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);

header('Content-Type: application/json');

if (isset($_GET["email"])) {
    $email = $_GET["email"];
    $user = $userModel->findByEmail($email);
    $available = $user === null; // If user is not found, the email is available
    echo json_encode(["available" => $available]);
} else {
    echo json_encode(["available" => false]);
}
?>
    