<?php
require_once __DIR__."./../Model/Forum/Handlers/UserHandler.php";

//NOTES: Ajax cannot work without preventdefault because by the time you leave the page and go to the php page
// the event handler is destroyed.
// When requiring a file ALWAYS use __DIR__, so that when the required code runs, the references are correct.
$json = $_POST['Json'];

$user = json_decode($json);

$userId= uniqid("reg");

$retrievedUser = new User($user->userName,$userId,$user->userPassword,$user->userEmail);

$userHandler = new UserHandler();

$userNameExists = $userHandler->checkUsernameExists($retrievedUser->getUserName());
$emailExists = $userHandler->checkEmailExists($retrievedUser->getEmail());

$credentials = array("userNameExists" => $userNameExists, "emailExists" => $emailExists);


echo json_encode($credentials);

