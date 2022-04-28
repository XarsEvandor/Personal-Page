<?php
require_once __DIR__."./../Model/Forum/Repositories/AdminUserRepo.php";
require_once __DIR__."./../Model/Forum/Handlers/UserHandler.php";
require_once __DIR__."./../Model/Forum/Database/DatabaseCreator.php";
require_once __DIR__."./../Model/Forum/Database/TableCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::createDB();
DatabaseCreator::connectToDB();
TableCreator::createTables();

$userId= uniqid("adm");

$admin = new User($userId, "root","toor","giorgos_katsonis@hotmail.com");

$userHandler= new UserHandler();
$admUserRepo = new AdminUserRepo();

//In the rare case that the generated id already exists in the database, make a new one and try again.
$done = false;

for ($i=0; $i<10; $i++){
    if (!$userHandler->checkIdExists($admin->getUserId())){
        $admUserRepo->insertUser($admin);
        $done = true;
        break;
    }
    else{
        $userId= uniqid("reg");
        $admin->setUserId($userId);
    }
}

if ($done==false){
    echo "\nYou are the single most unlucky person in this universe";
}

else{
    echo "Signup_Success";
}