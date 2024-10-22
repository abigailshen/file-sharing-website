<!DOCTYPE html>
<html lang="en">
<head>
<title>Sharing Page</title>
<link rel="stylesheet" href="filestyle.css">
</head>
<body>
<?php
session_start();
//get session username, the username they entered to send the file to, and the file name
$username = $_SESSION['username'];
$destination = (string) $_POST["destination"];
$filename = (string) $_GET["fileName"];

$valid = false;
//open user.txt to check entered username against valid usernames
$h = fopen("/srv/module2users/users.txt", "r") or die("Unable to access users :(");

while (!feof($h)&& !$valid){
    if (($destination == trim(fgets($h), " \n" ))&&$destination!=""){
        $valid = true;
    }
}
fclose($h);
if (!$valid){
    echo "Not a valid destination username. Please try again.";
} else {
        $dest_path = sprintf("/srv/module2users/%s/%s", $destination, $filename);
        $org_path = sprintf("/srv/module2users/%s/%s", $username, $filename);
        if(copy($org_path, $dest_path) ){
                header("Location: homescreen.php");
                exit;
        }else{
	echo "ERROR";
}

}
?>
</body>
</html>

