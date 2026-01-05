<?php
function reg_user($conn,$post)
{
        //prepare and execute the sql query note:do not include primary key as it is auto-incrementing
        $sql = "INSERT INTO user (fname,lname,username,password) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);//prepare the sql for data
        $stmt->bindParam(1, $post["fname"]);
        //hash the password
        $stmt->bindParam(2, $post["lname"]);
        $stmt->bindParam(3, $post["username"]);
        $hpswd = password_hash($post["password"], PASSWORD_DEFAULT); /*hashes password using prebuilt library in php
            I have to use the default encryption because my dev environment doesn't have access to any other libraries.
            If this was a real situation in a real production environment I would use are PASSWORD_BCRYPT OR PASSWORD_ARGON2I/2ID to make encryption even more secure*/
        $stmt->bindParam(4, $hpswd);

        $stmt->execute();
        $conn = null;//closes the connection so it can't be abused by packet sniffers
        return true;
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