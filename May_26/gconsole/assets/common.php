<?php

function new_console($conn, $post)
{
    try {//we are doing a prepared statement where we send the statement and the data separately to prevent sql injections
        $sql = "INSERT INTO console (manufacturer, c_name, release_date, controller_no, bit) VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);//prepare the sql for data

        $stmt->bindParam(1, $post['manufacturer']);
        $stmt->bindParam(2, $post['c_name']);
        $stmt->bindParam(3, $post['release_date']); //we are binding the data from our form to an sql statment this makes it more secure from an sql attack and makes it unlikely for people to hijack an sql statement
        $stmt->bindParam(4, $post['controller_no']);
        $stmt->bindParam(5, $post['bit']);

        $stmt->execute(); // runs the insert and inserts the data from the form into the database
        $conn = null; //closes the connection so it can't be abused by packet sniffers

    } catch (PDOException $e) {
        //handle database errors
        error_log("Audit databse error: " . $e->getMessage());
        throw new Exception("Audit databse error:". $e);
    }catch (Exception $e) {
        // handle validation or other errors
        error_log("Auditing error: " . $e->getMessage());
        throw new Exception("Audit database error" . $e->getMessage());
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