<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Forgot Password</h1>
<form method="post" action="/send-password-reset">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <button>Send Password Reset Link</button>
</form>

</body>
</html>
