<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="path/to/just-validate.min.js"></script> <!-- Make sure to include JustValidate library -->
    <script src="path/to/validation.js"></script> <!-- Include your validation.js file -->
</head>
<body>

<h1>Sign Up</h1>
<form id="signup" method="post" action="/process-signup">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>  
    <input type="password" name="password" id="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>

    <button>Sign Up</button>
</form>

<script src="path/to/just-validate.min.js"></script>
<script src="../../js/validation.js"></script> 
</body>
</html>
