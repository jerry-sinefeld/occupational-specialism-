<?php

function dbconnect_insert()
{
    $servername = "localhost"; //sets servername

    $dbusername = "root"; //sets dbusername we would not usually use root as it gives you global access to the database which is not secure

    $dbpassword = "";//sets password

    $dbname = "[name of database]";//sets name to connect to

    //the items above should not be stored here at all, all it takes is one person to figure out that if they download this file they know how to access your database
    //these credentials should be stored in a file outside the folder structure of the webserver


    try { //attempt block of code or catch and error
        $conn = new PDO("mysql:host=$servername; port=3306; dbname=$dbname", $dbusername, $dbpassword); //we could use mysqli instead of pdo the reason we don't is because my sql is being depreciated aswell as the fact a pdo will connect to any kind of database/source
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//setting two attributes: error mode and error mode exception
        return $conn;
    } catch (PDOException $e) { //catch statement if this fails
        error_log("database error in super_checker:") . $e->getMessage();
        //throw exception
        throw $e; //re-throw the exception //outputs the error
    }

}