<?php
#common subroutines go here#
function usr_msg()
{
    if (isset($_SESSION["msg"])) {
        if (str_contains($_SESSION["msg"], "error")) {
            $msg = "<div id='error'>USER MESSAGE:".$_SESSION["msg"]."</div>";
        } else {
            $msg = "<div id='umsg'>USER MESSAGE:".$_SESSION["msg"]."</div>";
        }
        $_SESSION["msg"] = "";
        unset($_SESSION["msg"]);
        return $msg;
    }
    else {
        return "";
    }


}

?>