<?php
require_once __DIR__."./../RegularUser.php";
require_once __DIR__."./../ModeratorUser.php";
require_once __DIR__."./../AdminUser.php";
require_once __DIR__."./../Interfaces/UserHandlerInterface.php";
require_once __DIR__."./../Database/DatabaseCreator.php";

DatabaseCreator::connectToSql();
DatabaseCreator::connectToDB();
class UserHandler implements UserHandlerInterface
{

    //We have to search all user tables.
    function getUserByEmail($userEmail)
    {
        $users = array();

        $sql = "SELECT * FROM RegularUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new regularUser($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM ModeratorUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new ModeratorUser($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM AdminUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new AdminUser($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        if (empty($users)) return null;
        else return $users[0];
    }


    //Returns true if a user with that id exists. We have to search all tables.
    function checkIdExists($userId){
        $users = array();

        $sql = "SELECT * FROM RegularUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM ModeratorUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM AdminUser WHERE USERID = '$userId';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        if (empty($users)){
            return false;
        }
        else return true;

    }

    //Returns true if a user with that id exists.
    function checkEmailExists($userEmail){
        $users = array();

        $sql = "SELECT * FROM RegularUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM ModeratorUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM AdminUser WHERE EMAIL = '$userEmail';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        if (empty($users)){
            return false;
        }
        else return true;
    }

    //Returns true if a user with that id exists.
    function checkUsernameExists($userName){
        $users = array();

        //You are actually reading through this? Impressive!

        $sql = "SELECT * FROM RegularUser WHERE USERNAME = '$userName';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);


        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM ModeratorUser WHERE USERNAME = '$userName';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);


        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        $sql = "SELECT * FROM AdminUser WHERE USERNAME = '$userName';";
        if (DatabaseCreator::$conn->query($sql)) {
            // echo "Successfully retrieved from RegularUser<br>";
        } else {
            echo DatabaseCreator::$conn->error;
        }

        $result = DatabaseCreator::$conn->query($sql);


        while ($row = $result->fetch_assoc()) {
            $user= new User($row['userId'], $row['userName'], $row['pass'], $row['email']);

            //With brackets -> addition to the array. Without brackets -> assignment.
            $users[] = $user;
        }

        if (empty($users)){
            return false;
        }
        else return true;
    }

    function validateUser($email, $password){
        $user = $this->getUserByEmail($email);
        if ($user->getPass() == $password){
            return true;
        }
        else return false;
    }

}