<!DOCTYPE html>
<html lang="en">
<head>
      	<title>Share file</title>
        <link rel="stylesheet" href="filestyle.css">
</head>
<body>
<?php
session_start();
//get file name passed from home screen and session username
$filename = (string) $_GET["fileName"];
echo "Sending file: ";
echo htmlentities("$filename");
$action = sprintf("shareactions.php?fileName=%s",$filename);
?>
<form name="input" action=<?php echo "$action";?> method="POST">
Input username to send this file to: <input type="text" name="destination"/>
<input type="submit" value="Submit"/>
</form>
</body>
</html>
