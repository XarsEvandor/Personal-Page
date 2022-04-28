<?php
require_once __DIR__."./../User.php";
interface UserRepositoryInterface
{
    function getUsers();
    function insertUser(User $user);
    function deleteUser(User $user);
}