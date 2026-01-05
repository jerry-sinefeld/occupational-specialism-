<?php
function reg_user($conn,$post)
{
        //prepare and execute the sql query note:do not include primary key as it is auto-incrementing
        $sql = "INSERT INTO user (fname,lname,username,password,address) VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);//prepare the sql for data
        $stmt->bindParam(1, $post["fname"]);
        //hash the password
        $stmt->bindParam(2, $post["lname"]);
        $stmt->bindParam(3, $post["username"]);
        $hpswd = password_hash($post["password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
        $stmt->bindParam(4, $hpswd);
        $stmt->bindParam(5, $post["address"]);

        $stmt->execute();
        $conn = null;//closes the connection so it can't be abused by packet sniffers
        return true;
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

function login($conn,$post){
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
}

function getnewuserid($conn, $username){
    $sql = "SELECT userid FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result["userid"];
}

function commit_booking($conn, $epoch)
{
    $sql = "INSERT INTO bookings (book_time, book_reason, userid, enginid, book_date) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $epoch);
    $stmt->bindParam(2, $_POST['book_reason']);
    $stmt->bindParam(3, $_SESSION['userid']);
    $stmt->bindParam(4, $_POST['staff']);
    $tmp = time();
    $stmt->bindParam(5, $tmp);
    $stmt->execute();
    $conn = null;
    return true;
    }



function staff_getter($conn)
{
    $sql = "SELECT enginid,username,fname,lname,active FROM engineer WHERE active != ? ORDER BY fname DESC";
    //get all staff from database where active = 1
    $stmt = $conn->prepare($sql);
    $exclude_staff = "0";

    $stmt->bindParam(1, $exclude_staff);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //by adding in all for fetchall it will bring back all records throughout the database that match our conditions
    $conn = null;
    return $result;
}

function product_getter($conn)
{
    $sql = "SELECT * FROM product ORDER BY name DESC";
    //get all staff from database where active = 1
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //by adding in all for fetchall it will bring back all records throughout the database that match our conditions
    $conn = null;
    return $result;
}

function book_getter($conn){

    $sql = "SELECT book.book_id, book.book_time,book.book_reason,book.book_date,e.fname,e.lname FROM bookings book JOIN engineer e ON book.enginid = e.enginid WHERE book.userid = ? ORDER BY book.book_time ASC"; // it takes the data from doctor and appointment that we want specifically and joins them together based off the entries id. the app and d are shorthand for the appointment and doctor table respectively
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['userid']);
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
    $sql = "DELETE FROM bookings WHERE book_id = ?"; //deletes the appointment entry from the database
    $stmt = $conn->prepare($sql);//prepares the sql
    $stmt->bindParam(1, $book_id); //binds the parameter to the variable
    $stmt->execute();//executes the sql
    $conn = null; //closes connection
    return true;
}

function book_update($conn, $book_id, $book_time)
{
    $sql = "UPDATE bookings SET book_time = ?, book_reason = ? WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $book_time);
    $stmt->bindParam(2, $_POST['book_reason']);
    $stmt->bindParam(3, $book_id);
    $stmt->execute();
    $conn = null;
    return true;
}

function book_fetch($conn, $book_id)
{
    $sql = "SELECT * FROM bookings WHERE book_id = ?"; //select everything in the appointment where app ID
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $book_id);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function auditor($conn, $userid, $code, $long){
    $sql= "INSERT INTO useraudit (userid,date,code,longdesc) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the exact structure the mysql date field accepts only
    $stmt->bindParam(1, $userid); //bind parameters for security
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $code);
    $stmt->bindParam(4, $long);

    $stmt->execute();
    $conn = null;
    return true;
}
