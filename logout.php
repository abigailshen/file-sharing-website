<!DOCTYPE html>
<html lang="en">
<head><title>Logging out...</title></head>
<body>
    <?php
    session_destroy();
    header("Location: loginscreen.html");
    exit;
    ?>
</body>
</html>
