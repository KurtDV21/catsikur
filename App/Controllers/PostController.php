<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Posts;

class PostController {

    private $postsModel;

    public function __construct() {
        $database = new Database();
        $dbConnection = $database->connect();
        $this->postsModel = new Posts($dbConnection);
    }

    public function updateApproval() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['post_id'];  // Get post ID from the form
            $action = $_POST['action'];   // Get action (approve or deny)
            
            // Set approval status based on the action
            $approvalStatus = ($action === 'approve') ? 'approved' : 'denied';

            // Call the updateApproval method to update the approval status
            if ($this->postsModel->updateApproval($postId, $approvalStatus)) {
                // Redirect back to the approval page (or show a success message)
                echo "Successfully updated approval status.";
                exit;
            } else {
                // Handle the error (e.g., display an error message)
                echo "Failed to update approval status.";
            }
        }
    }

    public function showApprovedPosts() { 
    return $this->postsModel->getUserApprovedPosts(); // Correct usage
    }

    public function showSelectedPosts() { 
        $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

        if ($post_id > 0) {
            // Fetch the post details from the Posts model
            $post = $this->postsModel->getPostById($post_id);
        
            if ($post) {
                $cat_name = htmlspecialchars($post['cat_name']);
                $age = htmlspecialchars($post['age']);
                $location = htmlspecialchars($post['location']);
                $picture = htmlspecialchars($post['picture']);
            return $post;
            } else {
                echo 'Post not found!';
                exit;
            }
        } else {
            echo 'Invalid post ID!';
            exit;
        }
    }
}
