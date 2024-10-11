<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Welcome to the App</h1>
    <?php if (isset($_SESSION["user_id"])): ?>
        <p>Hi <?= htmlspecialchars($_SESSION["user_name"] ?? 'User') ?>, You are logged in.</p>
        <a href="/logout">Log out</a>
    <?php else: ?>
        <p>You are not logged in.</p>
        <a href="/login">Log in</a> | <a href="/signup">Sign up</a>
    <?php endif; ?>
</body>
</html>
