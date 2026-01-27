<?php

function reg_staff($conn,$post)
{
        //prepare and execute the sql query note:do not include primary key as it is auto-incrementing
        $sql = "INSERT INTO [staff table name] (username,fname,lname,password) VALUES(?,?,?,?)";// TODO: POTENTIAL CHANGE NEEDED
        $stmt = $conn->prepare($sql);//prepare the sql for data

        $stmt->bindParam(1, $post["username"]);// TODO: POTENTIAL CHANGE NEEDED
        $stmt->bindParam(2, $post["fname"]);// TODO: POTENTIAL CHANGE NEEDED
        //hash the password
        $stmt->bindParam(3, $post["lname"]);// TODO: POTENTIAL CHANGE NEEDED
        $hpswd = password_hash($post["password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
        $stmt->bindParam(4, $hpswd);

        $stmt->execute();

        $new_staff_id = $conn->lastInsertId(); //checks the last id that was inserted

        return $new_staff_id;
}

function staff_login ($conn, $post){

        $sql = "SELECT * FROM [staff table name] WHERE username = ?"; //select everything from the user table where username = the entered username// TODO: POTENTIAL CHANGE NEEDED
        $stmt = $conn->prepare($sql);//prepare the sql for data
        $stmt->bindParam(1,$post); /*now that the database is prepped to receive data you are now binding the data with the previous sql statement.
        This prevents it from ever being modified, increasing security */
        $stmt->execute(); //execute sql
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;//closes the connection so it can't be abused by packet sniffers

        if ($result) { //result= user found
            $_SESSION['active'] = 1;
            return $result;
        } else { //if user isn't found send back to login page (resets page)
            $_SESSION['ERROR'] = "Staff not found";
            header("location: staff_login.php");
            exit;
        }
    }

function only_staff($conn, $name)
{
    $sql = "SELECT username FROM [staff table name] WHERE username = ?"; //set up sql statement// TODO: POTENTIAL CHANGE NEEDED
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1, $name);// TODO: POTENTIAL CHANGE NEEDED//we are binding the data from our form to a sql statement this makes it more secure from an sql attack and makes it unlikely for people to hijack an sql statement
    $stmt->execute();//run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetches results
    $conn = null; //closes the connection so it can't be abused by packet sniffers
    if ($result) {//if there is a result
        return true; //print 1 to the screen meaning that username is in use
    } else {
        return false;//print nothing meaning that username is not in user
    }
}

function usermessage()
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

function code_request($conn,$[STAFF ID]){// TODO: POTENTIAL CHANGE NEEDED
    $auth_code = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT); /*this creates the authentication code for the docs to use
    str_pad pads the string to a specific length using another string this makes sure the generated code is always 8 digits long mt_rand is a built in
    php function that returns a randomly generated number between a set amount of numbers I used this over rand as it is typically faster and
    a more truly random generator*/

    $exp = time();
    $exp = $exp + 900;

    $sql = "INSERT INTO temp ([staff session name],code,time) VALUES(?,?,?)";// TODO: POTENTIAL CHANGE NEEDED
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $[STAFF ID]);// TODO: POTENTIAL CHANGE NEEDED
    $stmt->bindParam(2, $auth_code);
    $stmt->bindParam(3, $exp);
    $stmt->execute();

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
        $sql = "DELETE FROM temp WHERE tempid = ?  ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $token_data['tempid']);
        $stmt->execute();
        return false;
    }

    $token_id = $token_data["tempid"];

    $sql_delete = "DELETE  FROM temp WHERE tempid = ?";
    $del_used = $conn->prepare($sql_delete);
    $del_used->bindParam(1, $token_id);
    $del_used->execute();
    $conn = null;
    return true;
}

function activate_staff($conn,$[STAFF ID])// TODO: POTENTIAL CHANGE NEEDED
{
    $sql = "UPDATE [staff table name] SET active = 1 WHERE [STAFF ID] = ?";// TODO: POTENTIAL CHANGE NEEDED
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$[STAFF ID]);// TODO: POTENTIAL CHANGE NEEDED
    $stmt->execute();
    $conn = null;
    $_SESSION['active'] = 1;
    return true;
}

function book_getter($conn){
    // TODO: POTENTIAL CHANGE NEEDED BELOW
    $sql = "SELECT book.book_id, book.book_time,book.book_reason,book.book_date,e.fname,e.lname FROM bookings book JOIN [STAFF ID] [ABBREV OF STAFF ID] ON book.[STAFF ID] = e.[STAFF ID] WHERE book.[STAFF ID] = ? ORDER BY book.book_time ASC"; // it takes the data from doctor and appointment that we want specifically and joins them together based off the entries id. the app and d are shorthand for the appointment and doctor table respectively
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['[STAFF ID]']);// TODO: POTENTIAL CHANGE NEEDED
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    if ($result){
        return $result;
    } else{
        return false;
    }
}
function cancel_book($conn, $book_id){
    $sql = "DELETE FROM bookings WHERE book_id = ?"; //deletes the appointment entry from the database// TODO: POTENTIAL CHANGE NEEDED
    $stmt = $conn->prepare($sql);//prepares the sql
    $stmt->bindParam(1, $book_id); //binds the parameter to the variable// TODO: POTENTIAL CHANGE NEEDED
    $stmt->execute();//executes the sql
    $conn = null; //closes connection
    return true;
}

function auditor($conn, $[STAFF ID], $code, $long){
    $sql= "INSERT INTO enginaudit ([STAFF ID],date,code,longdesc) VALUES(?,?,?,?)";// TODO: POTENTIAL CHANGE NEEDED
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the exact structure the mysql date field accepts only
    $stmt->bindParam(1, $[STAFF ID]); //bind parameters for security// TODO: POTENTIAL CHANGE NEEDED
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $code);
    $stmt->bindParam(4, $long);

    $stmt->execute();
    $conn = null;
    return true;
}
