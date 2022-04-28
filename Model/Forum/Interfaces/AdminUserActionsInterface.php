<?php
require_once __DIR__."./ModeratorUserActionsInterface.php";

interface AdminUserActionsInterface extends ModeratorUserActionsInterface
{
    function deletePinnedPost();
    function promoteToModerator();
    function demoteModerator();
    function permaBan();

}