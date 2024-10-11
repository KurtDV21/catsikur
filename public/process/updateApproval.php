<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Adjust the path if necessary

use App\Controllers\PostController;

$postController = new PostController();
$postController->updateApproval();
