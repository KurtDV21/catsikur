<?php
session_start();
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../vendor/autoload.php'; // Adjusted path


$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

$userId = null;

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; 

    // Get cat details from POST request
    $catName = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $location = $_POST['location'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $color = $_POST['color'] ?? '';

    $picturePath = null; // Initialize the variable to store the picture path

    // Handle file upload
if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $target_dir = "uploads/cats/"; // Base directory for cat images
    $userDir = $target_dir . $userId . '/'; // Create a directory for the user

    if (!is_dir($userDir)) {
        mkdir($userDir, 0777, true);  // Make directory for the user if it doesn't exist
    }

    $catDir = $userDir . $catName . '/'; // Create a folder for each cat under the user's folder

    if (!is_dir($catDir)) {
        mkdir($catDir, 0777, true);  // Make directory for the cat if it doesn't exist
    }

    $target_file = $catDir . basename($_FILES["picture"]["name"]); // Target file path
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        $picturePath = $target_file; // Store image path for database insertion
    } else {
        echo "Error uploading the cat picture.";
        exit; // Stop execution if the upload fails
    }
}   

    // Insert the post into the database
    if ($userId) {
        $sqlInsert = "INSERT INTO post (user_id, cat_name, age, location, gender, color, picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbConnection->prepare($sqlInsert);

        $stmt->bind_param("issssss", $userId, $catName, $age, $location, $gender, $color, $picturePath);

        if ($stmt->execute()) {
            // Redirect or show success message
            header("Location: /user-homepage");
            exit;
        } else {
            echo "Error adding post: " . $stmt->error;
        }
    } else {
        echo "User ID is missing.";
    }
} else {
    // Handle the case where the user is not logged in
    echo "You must be logged in to add a post.";
    exit; // Stop execution if the user is not logged in
}
?>
