<?php
namespace App\Models;

use mysqli;

class Posts {
    private $mysqli;

    public function __construct(mysqli $mysqli) {
        $this->mysqli = $mysqli;
    }

    // Get posts with pagination
    
    public function getPosts($limit, $offset) {
        $sql = "SELECT post.id, post.cat_name, post.location, post.picture, user.name 
                FROM post 
                INNER JOIN user ON post.user_id = user.id 
                WHERE post.approval NOT IN ('approved', 'denied') 
                LIMIT ? OFFSET ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCatDetails($limit, $offset) {
        $sql = "SELECT post.cat_name, post.location, post.picture, user.name 
                FROM post 
                INNER JOIN user ON post.user_id = user.id 
                LIMIT ? OFFSET ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Get total number of posts
    public function getTotalPosts() {
        $sql = "SELECT COUNT(*) AS total FROM post";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['total'];
    }

    public function updateApproval($postId, $status) {
        $sql = "UPDATE post SET approval = ? WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("si", $status, $postId); // "si" stands for string (status) and integer (postId)
        return $stmt->execute(); // Returns true if the update was successful, false otherwise
    }

    public function getUserApprovedPosts() {
        $sql = "SELECT post.id, post.cat_name, post.age, post.location, post.picture 
                FROM post 
                INNER JOIN user ON post.user_id = user.id 
                WHERE post.approval = 'approved'";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($post_id) {
    $stmt = $this->mysqli->prepare('SELECT post.cat_name, post.age, post.location, post.gender, post.color, post.picture FROM post WHERE id = ?');
    $stmt->bind_param("i", $post_id); // Bind the post ID as an integer
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc(); // Fetch the result as an associative array
}


}
