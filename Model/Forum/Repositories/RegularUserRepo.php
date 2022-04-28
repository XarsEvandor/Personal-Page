<?php
require_once __DIR__."./../RegularUser.php";
require_once __DIR__."./../Interfaces/UserRepositoryInterface.php";
require_once __DIR__."./../Database/DatabaseCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class RegularUserRepo implements UserRepositoryInterface
{

    function insertUser(User $user)
    {
        $userId = $user->getUserId();
        $userName = $user->getUserName();
        $userPass = $user->getPass();
        $userEmail = $user->getEmail();
        $userAge = $user->getAge();
        
        $sql="INSERT INTO RegularUser (USERID, USERNAME, PASS, EMAIL) 
            VALUES ('$userId', '$userName', '$userPass', '$userEmail')";

        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully inserted into RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function deleteUser(User $user){
        $userId = $user->getUserId();

        $sql = "DELETE FROM RegularUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully deleted from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }
    }

    function getUsers()
    {
        $regularUsers = array();

        $sql = "SELECT * FROM RegularUser";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $user= new regularUser($row['userId'], $row['userName'], $row['pass'], $row['email'], $row['age']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $regularUsers[] = $user;
        }

        return $regularUsers;
    }
}