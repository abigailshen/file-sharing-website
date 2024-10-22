<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="filestyle.css">
</head>
<body>
<?php
session_start();
//get username from user input
$user = (string) $_POST["username"];
//open users.txt to verify that user exists
$h = fopen("/srv/module2users/users.txt", "r") or die("Unable to access users :(");

$loggedin = false;
//loop through users in users.txt until the input matches one
while (!feof($h)&& !$loggedin){
    if (($user == trim(fgets($h), " \n" ))&&$user!=""){
        $loggedin = true;
        $_SESSION['username'] = $user;
    }
}
fclose($h);
//if the input was not a valid username, go to error screen and reprompt
if (!$loggedin){
    header("Location: loginError.php");
    exit;
}
//if it was valid, go to site home screen
header("Location: homescreen.php");
exit;
?>
</body>
</html>
