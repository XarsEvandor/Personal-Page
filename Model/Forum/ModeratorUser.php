<?php
require_once __DIR__."./User.php";
require_once __DIR__."./Interfaces/ModeratorUserActionsInterface.php";
class ModeratorUser extends User implements ModeratorUserActionsInterface
{
    public function __construct($userName, $userId, $pass, $email)
    {
        parent::__construct($userName,$userId,$pass,$email);
    }

    function sendWarning()
    {
        // TODO: Implement sendWarning() method.
    }

    function timeOut()
    {
        // TODO: Implement timeOut() method.
    }

    function deleteUserPost()
    {
        // TODO: Implement deleteUserPost() method.
    }

    function editUserPost()
    {
        // TODO: Implement editUserPost() method.
    }

    function pinPost()
    {
        // TODO: Implement pinPost() method.
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