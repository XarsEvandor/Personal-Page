<?php
require_once "DatabaseCreator.php";

class TableCreator
{

    static function createTables(){
        $sql = "CREATE TABLE  if not exists RegularUser (
            userId VARCHAR(30)  PRIMARY KEY,
            userName VARCHAR(30) NOT NULL,
            pass VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL,    
            age INTEGER UNSIGNED
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//             echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }

        $sql = "CREATE TABLE  if not exists ModeratorUser (
            userId VARCHAR(30)  PRIMARY KEY,
            userName VARCHAR(30) NOT NULL,
            pass VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL,    
            age INTEGER UNSIGNED
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//             echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }

        $sql = "CREATE TABLE  if not exists AdminUser (
            userId VARCHAR(30)  PRIMARY KEY,
            userName VARCHAR(30) NOT NULL,
            pass VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL,    
            age INTEGER UNSIGNED
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//             echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }

        $sql = "CREATE TABLE  if not exists Post (
            postId VARCHAR(30) NOT NULL PRIMARY KEY ,
            likes INTEGER NOT NULL,
            content VARCHAR(800) NOT NULL,
            subject VARCHAR(100) NOT NULL,
            postDate DATE NOT NULL
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//             echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }


        $sql = "CREATE TABLE  if not exists Comment (
            postId VARCHAR(30) NOT NULL PRIMARY KEY ,
            likes INTEGER NOT NULL,
            content VARCHAR(800) NOT NULL,
            subject VARCHAR(100) NOT NULL,
            postDate DATE NOT NULL
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//            echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }

        $sql = "CREATE TABLE  if not exists PostAssign (
            postAssignId VARCHAR(30) NOT NULL PRIMARY KEY ,
            userId VARCHAR(30)  NOT NULL,
            postId VARCHAR(30) NOT NULL,
            FOREIGN KEY(postId) REFERENCES Post(postId)
            );";
        if(DatabaseCreator::$conn->query($sql)==true){
//            echo "table created<br>";
        }else {
            echo "Error creating table: " . DatabaseCreator::$conn->error;
        }
    }

}

//DatabaseCreator::connectToSql();
//DatabaseCreator::connectToDB();
//$tableCreator = new TableCreator();
//$tableCreator->createTables();