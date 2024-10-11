<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php';

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch the user ID from the query parameter
    $userId = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;


    if (!$userId) {
        echo "User ID is missing.";
        exit;
    }

    // Fetch user input
    $fullname = $_POST['fullname'] ?? ''; 
    $phone_number = $_POST['phone_number'] ?? '';
    $city = $_POST['city'] ?? '';
    
    // Handle profile picture upload
    $profile_image_path = null;
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $target_dir = "uploads/users/";
        $userDir = $target_dir . $fullname . '/';  // Create a folder for each user

        if (!is_dir($userDir)) {
            mkdir($userDir, 0777, true);  // Make directory for the user
        }

        $target_file = $userDir . basename($_FILES["profile_image"]["name"]);
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            $profile_image_path = $target_file; // Store image path for database insertion
        } else {
            echo "Error uploading the profile image.";
        }
    }

    // Update the user with profile information
    $sqlUpdate = "UPDATE user SET name=?, phone_number=?, city=?, profile_image_path=? WHERE id=?";
    $stmt = $dbConnection->prepare($sqlUpdate);

    if ($stmt === false) {
        die("Error preparing statement: " . $dbConnection->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $fullname, $phone_number, $city, $profile_image_path, $userId);

    if ($stmt->execute()) {
        header("Location: /signup-success");
        exit; // Always use exit after a redirect
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}
?>
