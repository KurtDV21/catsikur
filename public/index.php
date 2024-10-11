<?php
$routes = [];

// Define the route function
function route(string $path, callable $callback) {
    global $routes;
    $routes[$path] = $callback;
}

// Define the run function to match routes
function run() {
    global $routes;

    // Normalize the request URI
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = rtrim($uri, '/');
    $uri = $uri === '' ? '/' : $uri;

    foreach ($routes as $path => $callback) {
        if ($path !== $uri) continue;

        // Call the matching callback
        $callback();
        return;
    }

    http_response_code(404);
    echo "404 Not Found";
}

// Define routes
route('/', function () {
    include __DIR__ . '/../resource/view/home.php';
});

route('/loginto', function () {
    include __DIR__ . '/../resource/view/loginto.php';
});

route('/register-form', function () {
    include __DIR__ . '/../resource/view/register-form.php';
});

route('/post-adoption', function () {
    include __DIR__ . '/../resource/view/post-adoption.php';
});

route('/add-post', function () {
    include __DIR__ . '/../resource/view/Add_post.php';
});

route('/process-addpost', function () {
    include __DIR__ . '/../public/process/add_post.php';
});
route('/inquiry-form', function () {
    include __DIR__ . '/../resource/view/inquiry-form.php';
});

route('/user-homepage', function () {
    include __DIR__ . '/../resource/view/user-homepage.php';
});

route('/admin', function () {
    include __DIR__ . '/../resource/view/admin.php';
});

route('/process-signup', function () {
    include __DIR__ . '/../resource/view/auth/process-signup.php';
});

route('/signup-success', function () {
    include __DIR__ . '/../resource/view/layout/signup-success.php';
});

route('/activate-account', function () {
    include __DIR__ . '/../resource/view/auth/activate-account.php';    
});

route('/otp-verify', function () {
    include __DIR__ . '/../resource/view/layout/otp-verify.php';
});

route('/otp-admin', function () {
    include __DIR__ . '/../resource/view/layout/otp-admin.php';
});

route('/logout', function () {
    include __DIR__ . '/../resource/view/auth/logout.php';
});

route('/forgot-password', function () {
    include __DIR__ . '/../resource/view/layout/forgot-password.php';
});

route('/process-reset-password', function () {
    include __DIR__ . '/../resource/view/auth/process-reset-password.php';
});

route('/cat-details', function () {
    include __DIR__ . '/../resource/view/catdeets.php';
});

route('/profile2', function () {
    include __DIR__ . '/../resource/view/profile2.php';
});

route('/process-profile2', function () {
    include __DIR__ . '/../resource/view/auth/process-profile2.php';
});

route('/send-password-reset', function () {
    include __DIR__ . '/../resource/view/auth/send-password-reset.php';
});

route('/updateApproval', function () {
    include __DIR__ . '/../public/process/updateApproval.php';
});

// Run the routing logic
run();
