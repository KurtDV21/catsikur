<?php
session_start();

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["otp"] == $_SESSION["otp"]) {
        // OTP is correct, log the user in
        header("Location:/user-homepage");
        exit;
    } else {
        $is_invalid = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Verify OTP</h1>

<?php if ($is_invalid): ?>
    <em>Invalid OTP. Please try again.</em>
<?php endif ?>

<form method="post">
    <label for="otp">Enter OTP</label>
    <input type="text" id="otp" name="otp" required>
    <button onclick="location.href='/user-homepage'">Verify</button>
</form>

</body>
</html>
