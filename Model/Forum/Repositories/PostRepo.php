<?php
require_once __DIR__."./../Interfaces/PostRepositoryInterface.php";
require_once __DIR__."./../Post.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class PostRepo implements PostRepositoryInterface
{
    function insertPost(Post $post)
    {
        $postId = $post->getPostId();
        $likes = $post->getLikes();
        $content = $post->getContent();
        $subject = $post->getSubject();
        $postDate = $post->getPostDate();

        $sql="INSERT INTO Post (POSTID, LIKES, CONTENT, SUBJECT, POSTDATE) 
            VALUES ('$postId', $likes, '$content', '$subject', '$postId')";

        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully inserted into RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function deletePost(Post $post){
        $postId = $post->getPostId();

        $sql = "DELETE FROM Post WHERE POSTID = '$postId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully deleted from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function getPosts()
    {
        $posts = array();

        $sql = "SELECT * FROM Post";
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