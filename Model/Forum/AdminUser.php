<?php
require_once __DIR__."./User.php";
require_once __DIR__."./Interfaces/AdminUserActionsInterface.php";
class AdminUser extends User implements AdminUserActionsInterface
{


    public function __construct($userName, $userId, $pass, $email)
    {
        parent::__construct($userName,$userId,$pass,$email);
    }


    function deletePinnedPost()
    {
        // TODO: Implement deletePinnedPost() method.
    }

    function promoteToModerator()
    {
        // TODO: Implement promoteToModderator() method.
    }

    function demoteModerator()
    {
        // TODO: Implement demoteModderator() method.
    }

    function permaBan()
    {
        // TODO: Implement permaBan() method.
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