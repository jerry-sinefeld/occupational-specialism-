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
        $sql = "INSERT INTO doctor (name,lname,doc_password, role,room_numb ) VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);//prepare the sql for data

        $stmt->bindParam(1, $post["name"]);
        //hash the password
        $stmt->bindParam(2, $post["lname"]);
        $hpswd = password_hash($post["doc_password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
        $stmt->bindParam(3, $hpswd);
        $stmt->bindParam(4, $post["role"]);
        $stmt->bindParam(5, $post["room_numb"]);

        $stmt->execute();

        $new_doc_id = $conn->lastInsertId(); //checks the last id that was inserted

        return $new_doc_id;
    }

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
    return $result["doc_id"];
}

function code_request($conn,$doc_id){
    $auth_code = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT); /*this creates the authentication code for the docs to use
    str_pad pads the string to a specific length using another string this makes sure the generated code is always 8 digits long mt_rand is a built in
    php function that returns a randomly generated number between a set amount of numbers I used this over rand as it is typically faster and
    a more truly random generator*/

    $exp = time();
    $exp = $exp + 900;

    $sql2 = "INSERT INTO temp (doc_id,code,time) VALUES(?,?,?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(1, $doc_id);
    $stmt2->bindParam(2, $auth_code);
    $stmt2->bindParam(3, $exp);
    $stmt2->execute();

    $conn = null;
    return $auth_code;

}

function auth($conn, $code){
    $sql = "SELECT * FROM temp WHERE code = ?  ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $code);
    $stmt->execute();

    $token_data = $stmt->fetch(PDO::FETCH_ASSOC);
    //check if a result comes back at all
    //compare the current time hasn't passed the stored time
    //create an active field in doctor that registers as active when the doctor successfully verifies using the auth code and gives them access to the system. Use tinyint 1/0
    if (!$token_data) {
        return false;
    }

    $curr_time = time();
    $exp = (int)$token_data['time'];

    if ($curr_time > $exp) {
        $sql = "DELETE FROM temp WHERE temp_id = ?  ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $token_data['temp_id']);
        $stmt->execute();
        return false;
    }

    $token_id = $token_data["temp_id"];

    $sql_delete = "DELETE  FROM temp WHERE temp_id = ?";
    $del_used = $conn->prepare($sql_delete);
    $del_used->bindParam(1, $token_id);
    $del_used->execute();
    $conn = null;
    return true;
}


function activate_doc($conn,$doc_id)
{
    $sql = "UPDATE doctor SET active = 1 WHERE doc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $doc_id);
    $stmt->execute();
    $conn = null;
    return true;
}

function check_active($conn, $doc_id, $active){
    $sql = "SELECT * FROM doctor WHERE doc_id = ? AND active = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $doc_id);
    $stmt->bindParam(2, $active);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    if ($result) {
        return true;

    } else {
        return false;
    }
}

function change_pass($conn, $post)
{
    $sql = "UPDATE doctor SET doc_password = ? WHERE doc_id = ?";
    $stmt = $conn->prepare($sql);
    $hpswd = password_hash($post["password"], PASSWORD_DEFAULT);
    $stmt->bindParam(1, $hpswd);
    $stmt-> execute();
    $conn = null;
    return true;
}

function change_staff_details($conn, $name, $lname, $active, $role, $room_numb,)
{

    $sql = "UPDATE doctor SET name = ? , lname = ?, active = ?, role = ?, room_numb = ? WHERE doc_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $lname);
    $stmt->bindParam(3, $active);
    $stmt->bindParam(4, $role);
    $stmt->bindParam(5, $room_numb);

    $stmt-> execute();
    $conn = null;
    return true;
}

function change_staff_pass($conn, $post)
{
    $sql = "UPDATE doctor SET doc_password = ? WHERE doc_id = ?";
    $stmt = $conn->prepare($sql);
    $hpswd = password_hash($post["doc_password"], PASSWORD_DEFAULT);
    $stmt->bindParam(1, $hpswd);
    $stmt-> execute();
    $conn = null;
    return true;
}