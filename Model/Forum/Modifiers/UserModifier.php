<?php
require_once __DIR__."./../RegularUser.php";
require_once __DIR__."./../ModeratorUser.php";
require_once __DIR__."./../AdminUser.php";
require_once __DIR__."./../Interfaces/UserHandlerInterface.php";
require_once __DIR__."./../Database/DatabaseCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class UserModifier
{
    function setUserAge(User $user, $age){
        $table = get_class($user);
        $userId = $user->getUserId();

        $sql = "UPDATE $table SET AGE = $age WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
            echo $sql;
        } else {
            echo DatabaseCreator::$conn->error;
        }

    }
}