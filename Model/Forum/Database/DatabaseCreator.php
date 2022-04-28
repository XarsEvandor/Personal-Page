<?php
class DatabaseCreator{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password='';
    private static $db="ForumDb";
    public static $conn;

    static function connectToSql(){
        self::$conn = new mysqli(self::$host, self::$user, self::$password);
        if(self::$conn){
//             echo "Successfully connected to Sql<br>";
        }else{
            echo self::$conn->error();
        }
    }

    static function createDB(){
        $sql="Create database if not exists ". self::$db." ";
        if(self::$conn->query($sql)==true){
//             echo "db created<br>";
        }else {
            echo "Error creating db: " . self::$conn->error;
        }
    }

    static function connectToDB(){
        self::$conn = new mysqli(self::$host, self::$user, self::$password,self::$db);
        if(self::$conn){
//             echo "Successfully connected to Db<br>";
        }else{
            echo self::$conn->error();
        }
    }


}
