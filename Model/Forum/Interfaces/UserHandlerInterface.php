<?php

interface UserHandlerInterface
{
    function getUserByEmail($userEmail);
    function checkIdExists($userId);
    function checkEmailExists($userEmail);
    function checkUsernameExists($userName);
    function validateUser($email, $password);
}