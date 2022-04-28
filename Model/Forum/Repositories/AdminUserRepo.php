<?php
require_once __DIR__."./../AdminUser.php";
require_once __DIR__."./../Interfaces/UserRepositoryInterface.php";
require_once __DIR__."./../Database/DatabaseCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class AdminUserRepo implements UserRepositoryInterface
{

    function insertUser(User $user)
    {
        $userId = $user->getUserId();
        $userName = $user->getUserName();
        $userPass = $user->getPass();
        $userEmail = $user->getEmail();
        $userAge = $user->getAge();

        $sql="INSERT INTO AdminUser (USERID, USERNAME, PASS, EMAIL) 
            VALUES ('$userId', '$userName', '$userPass', '$userEmail')";

        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly inserted into RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function deleteUser(User $user){
        $userId = $user->getUserId();

        $sql = "DELETE FROM AdminUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly deleted from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function getUsers()
    {
        $adminUsers = array();

        $sql = "SELECT * FROM AdminUser";
        if(DatabaseCreator::$conn->query($sql)) {
            // echo "Successfuly retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user= new adminUser($row['userId'], $row['userName'], $row['pass'], $row['email'], $row['age']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $adminUsers[] = $user;
        }

        return $adminUsers;
    }

    //Returns true if a user with that id exists.
    function checkIdExists($userId){
        $adminUsers = array();

        $sql = "SELECT * FROM AdminUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user= new adminUser($row['userId'], $row['userName'], $row['pass'], $row['email'], $row['age']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $adminUsers[] = $user;
        }

        if ($adminUsers[0]==null){
            return true;
        }
        else return false;

    }
}