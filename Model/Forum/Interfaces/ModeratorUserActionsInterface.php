<?php
require_once __DIR__."./UserActionsInterface.php";

interface ModeratorUserActionsInterface extends UserActionsInterface
{
    function sendWarning();
    function timeOut();
    function deleteUserPost();
    function editUserPost();
    function pinPost();
}