<?php
use App\Core\Database;
use App\Models\User;
use App\Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php';

session_start();

$database = new Database();
$dbConnection = $database->connect();
$userModel = new User($dbConnection);
$userController = new UserController($userModel);

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $userController->login($_POST["email"], $_POST["password"]);

    if ($user) {
        // User is valid and activated
        $otp = rand(100000, 999999);
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"]; // Store user ID in session
        $_SESSION["user_name"] = $user["name"]; // Store user name in session for display
        $_SESSION["otp"] = $otp; // Store OTP in session

        // Load the mailer and send OTP
        $mail = require __DIR__ . "/../auth/mailer.php";
        $mail->setFrom('noreply@yourdomain.com', 'Your App');
        $mail->addAddress($user["email"]);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: $otp";

        if ($mail->send()) {
            header("Location: /otp-verify");
            exit;
        } else {
            $is_invalid = true;
        }
    } else {
        $is_invalid = true; // Invalid login or account not activated
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Login</h1>

<?php if ($is_invalid): ?>
    <em>Invalid login. Please check your email and password.</em>   
<?php endif ?>

<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <button>Log in</button>
</form>

<a href="/forgot-password">Forgot password?</a>

</body>
</html>
