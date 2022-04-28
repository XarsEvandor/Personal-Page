<?php

class PostAssignRepo
{
    function assignPost(User $user, Post $post){
        $userId = $user->getUserId();
        $postId = $post->getPostId();
        $sql = "INSERT INTO PostAssign (userId, postId) VALUES ('$userId', '$postId')";

        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully inserted into RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function getAssignedPosts(User $user){
        $posts = array();

        $userId = $user->getUserId();
        $sql = "SELECT * FROM Post WHERE USERID IN (SELECT USERID FROM POSTASSIGN WHERE USERID = '$userId')";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $post= new Post($row['postId'], $row['likes'], $row['content'], $row['subject'], $row['postDate']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $posts[] = $post;
        }

        return $posts;
    }
}