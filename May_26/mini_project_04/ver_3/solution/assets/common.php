<?php
//remove ALL try-catch statements from common (TO DO)
function reg_user($conn,$post)
{
    try{
        //prepare and execute the sql query note:do not include primary key as it is auto-incrementing
        $sql = "INSERT INTO user (f_name, last_name, username, password, dob, postcode,nhs_numb ,allergies) VALUES(?,?,?,?,?,?,?,?)";
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

function login($conn,$post){
    try{
        $sql = "SELECT * FROM user WHERE username = ?"; //select everything from the user table where username = the entered username
        $stmt = $conn->prepare($sql);//prepare the sql for data
        $stmt->bindParam(1,$post); /*now that the database is prepped to recieve data you are now binding the data with the previous sql statement.
        This prevents it from ever being modified, increasing security */
        $stmt->execute(); //execute sql
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;//closes the connection so it can't be abused by packet sniffers

        if ($result) { //result= user found
            return $result;
        } else { //if user isn't found send back to login page (resets page)
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

function check_pass_strength($password) {
    $errors = [];
    $_tally = 9; // max score

    // Sanitize the password before validation to prevent manipulation
    $_password = filter_var($password, FILTER_SANITIZE_STRING);
    // All common special characters
    $_spec_char = '/[!@#$"£%^&*()_=+{};:,.<>?]/';

    // Validation Checks
    if (!preg_match('/[A-Z]/', $_password)) { //must contain uppercase
        $_tally--;
        $errors[] = "Your password must contain at least one uppercase character.";
    }
    if (!preg_match('/[a-z]/', $_password)) { //must contain lowercase
        $_tally--;
        $errors[] = "Your password must contain at least one lowercase character.";
    }
    if (!preg_match('/[0-9]/', $_password)) { //// Must contain a number
        $_tally--;
        $errors[] = "Your password must contain at least one number.";
    }
    if (strlen($_password) < 8) { // must be 8 characters or more
        $_tally--;
        $errors[] = "Your password must be at least 8 characters long.";
    }
    if (preg_match('/^[0-9]/', $_password)) { //cannot start with a number
        $_tally--;
        $errors[] = "Your password should not start with a number.";
    }
    // Check if the first character is a special character
    if (preg_match($_spec_char, $_password[0])) { // cannot start with a special character
        $_tally--;
        $errors[] = "Your password should not start with a special character.";
    }
    // Check if the last character is a special character
    if (preg_match($_spec_char, substr($_password, -1))) { //cannot end with a special
        $_tally--;
        $errors[] = "Your password should not end with a special character.";
    }
    if (!preg_match($_spec_char, $_password)) { //must contain a special characters
        $_tally--;
        $errors[] = "Your password must contain at least one special character.";
    }
    if (strtolower($_password) === 'password') { //cannot be the word password
        $_tally--;
        $errors[] = "Your password cannot be 'password'.";
    }

    $message = "Password score: " . $_tally . "/9. ";
    if ($_tally < 9) {
        $message .= "Password validation failed! Criteria not met:";
        $message .= "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>"; // list all errors
    } else {
        $message = "Password validation passed! Score: " . $_tally . "/9."; //success message
    }

    $message .= "Note: If characters were removed from your input, it is due to security sanitization (&lt; or &gt;).";


    return [ //returns the result and the final message
        'success' => $_tally === 9,
        'tally' => $_tally,
        'message' => $message
    ];
}

function auditor($conn, $patientid, $code, $long){
    $sql= "INSERT INTO audit (patientid,date,code,longdesc) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the exact structure the mysql date field accepts only
    $stmt->bindParam(1, $patientid); //bind parameters for security
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $code);
    $stmt->bindParam(4, $long);

    $stmt->execute();
    $conn = null;
    return true;
}

function getnewuserid($conn, $username){
    $sql = "SELECT patient_id FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result["patient_id"];
}

function staff_getter($conn)
{
    $sql = "SELECT doc_id, name, available, role, room_numb FROM doctor WHERE role != ? ORDER BY role DESC";
    //get all staff from database where role does not equal "adm" - this is the admin role - cannot be booked
    $stmt = $conn->prepare($sql);
    $exclude_role = "adm";

    $stmt->bindParam(1, $exclude_role);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //by adding in all for fetchall it will bring back all records throughout the database that match our conditions
    $conn = null;
    return $result;
}