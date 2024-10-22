<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<?php
session_start();
//get file name passed from home screen and session username
$filename = (string) $_GET["fileName"];
$username = $_SESSION['username'];
//store the path of the file to delete
$path = sprintf('/srv/module2users/%s/%s', $username, $filename);
//if the file exists, delete and return to home screen, if not just return to home screen
if(file_exists($path)){
        echo "hello";
        if(unlink($path)){
            header("Location: homescreen.php");
                exit;
        } else {
            echo "Did not delete $filename.";
        }
} else {
        header("Location: homescreen.php");
        exit;
}
?>
</body>
</html>
