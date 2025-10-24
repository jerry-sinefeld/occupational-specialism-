<?php

function only_user($conn, $name)
{
    try {
        $sql = "SELECT name FROM doctor WHERE name = ?"; //set up sql statement
        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1, $name);//we are binding the data from our form to a sql statement this makes it more secure from an sql attack and makes it unlikely for people to hijack an sql statement
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

function reg_doc($conn,$post)
{
    try{
        //prepare and execute the sql query note:do not include primary key as it is auto-incrementing
        $sql = "INSERT INTO doctor (name, doc_password, available, role, ) VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);//prepare the sql for data

        $stmt->bindParam(1, $post["f_name"]);
        //hash the password
        $stmt->bindParam(2, $post["last_name"]);
        $stmt->bindParam(3, $post["username"]);
        $hpswd = password_hash($post["password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
        $stmt->bindParam(4, $hpswd);
        $stmt->bindParam(5, $post["dob"]);
        $stmt->bindParam(6, $post["postcode"]);
        $stmt->bindParam(7, $post["nhs_numb"]);
        $stmt->bindParam(8, $post["allergies"]);

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

function user_message()
{
    if (isset($_SESSION['usermessage'])) {
        $message = "<p>" . $_SESSION['usermessage'] . "</p>";
        unset($_SESSION['usermessage']); //clears the message variable to be used for other errors
        return $message;
    } else{
        $message = "";
        return $message; //returns empty string if no message exists
    }
}

function doc_auditor($conn, $doc_id, $code, $long){
    $sql= "INSERT INTO docaudit (doc_id,date,code,longdesc) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the exact structure the mysql date field accepts only
    $stmt->bindParam(1, $doc_id); //bind parameters for security
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $code);
    $stmt->bindParam(4, $long);

    $stmt->execute();
    $conn = null;
    return true;
}

function getnewdocid($conn, $name){
    $sql = "SELECT doc_id FROM doctor WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result["patient_id"];
}

function auth($conn,$doc_id,$code,$time){
    $sql = "DELETE FROM doctor WHERE doc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $doc_id);
    $stmt->execute();

    $auth_code = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT); /*this creates the authentication code for the docs to use
    str_pad pads the string to a specific length using another string this makes sure the generated code is always 8 digits long mt_rand is a built in
    php function that returns a randomly generated number between a set amount of numbers i used this over rand as it is typically faster and
    a more truly random generator*/
    $exp = date("Y-m-d H:i:s" ,strtotime('+15 minutes'));

    $sql2 = "INSERT INTO temp (doc_id,code,time) VALUES(?,?,?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(1, $doc_id);
    $stmt2->bindParam(2, $code);
    $stmt2->bindParam(3, $time);
    $stmt2->execute();

    $conn = null;
    return true;

}