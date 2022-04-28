<?php
require_once __DIR__."./User.php";
require_once __DIR__."./Interfaces/UserActionsInterface.php";
class RegularUser extends User implements  UserActionsInterface
{


    public function __construct($userName, $userId, $pass, $email)
    {
        parent::__construct($userName,$userId,$pass,$email);
    }

    function comment()
    {
        // TODO: Implement comment() method.
    }

    function upvote()
    {
        // TODO: Implement upvote() method.
    }

    function downvote()
    {
        // TODO: Implement downvote() method.
    }

    function post()
    {
        // TODO: Implement post() method.
    }

    function deleteOwnPost()
    {
        // TODO: Implement deleteOwnPost() method.
    }

    function editOwnPost()
    {
        // TODO: Implement editOwnPost() method.
    }
}