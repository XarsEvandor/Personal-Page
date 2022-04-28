<?php
require_once __DIR__."./../Post.php";
interface PostRepositoryInterface
{
    function getPosts();
    function insertPost(Post $post);
    function deletePost(Post $post);
}