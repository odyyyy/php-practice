<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="info_admin.php" method="get">
<input type="text" name="command">
<input type="submit" value="Выполнить">

</form>
<br>
<br>
<br>

<?php 
    include 'commands.php';
    if (isset($_GET['command'])) {
        $command = $_GET['command'];
        echo get_command_output($command);
    }

?>
    
</body>
</html>