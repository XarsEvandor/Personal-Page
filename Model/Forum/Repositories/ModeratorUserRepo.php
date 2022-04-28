<?php
require_once __DIR__."./../moderatorUser.php";
require_once __DIR__."./../Interfaces/UserRepositoryInterface.php";
require_once __DIR__."./../Database/DatabaseCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class ModeratorUserRepo
{
    function insertUser(User $user)
    {
        $userId = $user->getUserId();
        $userName = $user->getUserName();
        $userPass = $user->getPass();
        $userEmail = $user->getEmail();
        $userAge = $user->getAge();

        $sql="INSERT INTO ModeratorUser (USERID, USERNAME, PASS, EMAIL) 
            VALUES ('$userId', '$userName', '$userPass', '$userEmail')";

        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly inserted into moderatorUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function deleteUser(User $user){
        $userId = $user->getUserId();

        $sql = "DELETE FROM ModeratorUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly deleted from moderatorUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function getUsers()
    {
        $moderatorUsers = array();

        $sql = "SELECT * FROM ModeratorUser";
        if(DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly retrieved from moderatorUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user= new moderatorUser($row['userId'], $row['userName'], $row['pass'], $row['email'], $row['age']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $moderatorUsers[] = $user;
        }

        return $moderatorUsers;
    }

    //Returns true if a user with that id exists.
    function checkIdExists($userId){
        $moderatorUsers = array();

        $sql = "SELECT * FROM moderatorUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from moderatorUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user= new moderatorUser($row['userId'], $row['userName'], $row['pass'], $row['email'], $row['age']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $moderatorUsers[] = $user;
        }

        if ($moderatorUsers[0]==null){
            return true;
        }
        else return false;

    }
}