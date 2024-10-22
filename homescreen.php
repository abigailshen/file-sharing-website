<!DOCTYPE html>
<html lang="en">
<head>
      	<title>File website home</title>
        <link rel="stylesheet" href="filestyle.css">
</head>
<body>
<div class="logout">
    <form action="logout.php" method="POST">
        <input type="submit" value="Log out"/>
    </form>
</div>
<form enctype="multipart/form-data" action="uploader.php" method="POST">
        <p>
           	<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input">
        </p>
	<p>
           	<input type="submit" value="Upload File" />
        </p>
</form>
<?php
session_start();
//get session username, display username and files associated with that user
$username = $_SESSION['username'];
echo htmlentities("Files for $username:");
$dir = sprintf("/srv/module2users/%s", $username);
echo "<br>";
$files = scandir($dir);
for ($i=2; $i<count($files); $i++){
        $filename = trim($files[$i]);
        echo htmlentities("$filename");
        echo " ";
        echo '<a href="sending.php?fileName=' . $filename .'">View</a>';
        echo " ";
        echo '<a href="delete.php?fileName=' . $filename . '">Delete</a>';
        echo "  ";
        echo '<a href="share.php?fileName=' . $filename . '">Share</a>';
        echo '<br>';
}
?>
</body>
</html>