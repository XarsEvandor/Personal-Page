<?php

interface UserActionsInterface
{
    function comment();
    function upvote();
    function downvote();
    function post();
    function deleteOwnPost();
    function editOwnPost();
}

