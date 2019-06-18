<?php   
session_start(); //to ensure you are using same session

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy(); //dstruction of session.

header("location: index.php"); //to redirect back to "index.php" after logging out
exit();
?>