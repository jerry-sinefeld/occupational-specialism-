<?php

function reg_user($conn,$post)
{
        try{
            //prepare and execute the sql query
            $sql = "INSERT INTO user (username, password, sign_up_date, dob, country) VALUES(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);//prepare the sql for data

            $stmt->bindParam(1, $post["username"]);
            //hash the password
            $hpswd = password_hash($post["password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
            $stmt->bindParam(2, $hpswd);
            $stmt->bindParam(3, $post["sign_up_date"]);
            $stmt->bindParam(4, $post["dob"]);
            $stmt->bindParam(5, $post["country"]);

            $stmt->execute();
            $conn = null;//closes the connection so it can't be abused by packet sniffers
            return true;}

            catch (PDOException $e){
                //handle database errors
                error_log("User reg database error: ".$e->getMessage());
                throw new PDOException("User reg database error". $e);
            }catch (Exception $e){
            //catch any other errors
            error_log("User registration error: ".$e->getMessage());
            throw new Exception("User registration error". $e);
        }
}

function login($conn,$post){
    try{
        $sql = "SELECT user_id, password FROM user WHERE username = ?"; //select everything from the user table where username = the entered username
        $stmt = $conn->prepare($sql);//prepare the sql for data
        $stmt->bindParam(1,$post["username"]); /*now that the databse is prepped to recieve data you are now binding the data with the previous sql statement.
        This prevents it from ever being modified, increasing security */
        $stmt->execute(); //execute sql
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;//closes the connection so it can't be abused by packet sniffers

        if ($result) {
            return $result;
        } else {
            $_SESSION['ERROR'] = "User not found";
            header("location: login.php");
            exit;
        }
    } catch (Exception $e){
        $_SESSION['ERROR'] ="User login" . $e->getMessage();
        header("location: login.php");
        exit;
    }
}



function new_console($conn, $post)
{
    try {//we are doing a prepared statement where we send the statement and the data separately to prevent sql injections
        $sql = "INSERT INTO console (manufacturer, c_name, release_date, controller_no, bit) VALUES(?, ?, ?, ?, ?)"; // inserts items into the specified fields, we leave them as question marks to allow data to be entered separately at a later date
        $stmt = $conn->prepare($sql);//prepare the sql for data

        $stmt->bindParam(1, $post['manufacturer']);
        $stmt->bindParam(2, $post['c_name']);
        $stmt->bindParam(3, $post['release_date']); //we are binding the data from our form to an sql statment this makes it more secure from an sql attack and makes it unlikely for people to hijack an sql statement
        $stmt->bindParam(4, $post['controller_no']);
        $stmt->bindParam(5, $post['bit']);

        $stmt->execute(); // runs the insert and inserts the data from the form into the database
        $conn = null; //closes the connection so it can't be abused by packet sniffers

    } catch (PDOException $e) { //catches the database error and contains it in $e
        //handle database errors
        error_log("Audit database error: " . $e->getMessage()); //creates an error message to be displayed when encountering a database error
        throw new Exception("Audit database error:". $e); //throws that error message to the screen
    }catch (Exception $e) { //catches all other errors
        // handle validation or other errors
        error_log("Auditing error: " . $e->getMessage());//creates an error message to be displayed when encountering a database error
        throw new Exception("Audit database error" . $e->getMessage()); //throws that error message to the screen
    }
}

function user_message()
{
    if (isset($_SESSION['usermessage'])) {
        $message = "<p>" . $_SESSION['usermessage'] . "</p>";
        unset($_SESSION['usermessage']);
        return $message;
    } else{
        $message = "";
        return $message;
    }
}

function only_user($conn, $username)
{
    try {
        $sql = "SELECT username FROM user WHERE username = ?"; //set up sql statement
        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1, $username);//we are binding the data from our form to a sql statement this makes it more secure from an sql attack and makes it unlikely for people to hijack an sql statement
        $stmt->execute();//run the sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetches results
        $conn = null; //closes the connection so it can't be abused by packet sniffers
        if ($result) {//if there is a result
            return true; //print 1 to the screen meaning that username is in use
        } else {
            return false;//print nothing meaning that username is not in user
        }
    } catch (PDOException $e) { //catch error
        // log the error (important)
        error_log("database error in only_user: " . $e->getMessage());
        //throw the exception
        throw $e; //re-throw the exception
    }
}