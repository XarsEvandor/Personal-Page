<?php
require_once __DIR__."./../Model/Forum/Handlers/UserHandler.php";

$json = $_POST['Json'];

$user = json_decode($json);

$userHandler = new UserHandler();

$retrievedUser = $userHandler->getUserByEmail($user->userEmail);

if ($retrievedUser == null){
    echo "not_found";
    return;
}

if ($userHandler->validateUser($retrievedUser->getEmail(), $user->userPassword)){
    session_start();
    $_SESSION["user"] = json_encode($retrievedUser->jsonSerialize());
    var_dump($_SESSION["user"]);
    echo "success";
}
else echo "wrong_pass";