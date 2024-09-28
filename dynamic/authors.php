<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
</head>
<body>
    <h1>Авторы</h1>
    <table>
        <tr><th>ID</th><th>Имя</th><th>Фамилия</th></tr>
        <?php

        $mysqli = new mysqli("db", "user", "password", "appDB");
        $result = $mysqli->query("SELECT * FROM authors");
        foreach ($result as $row){
            echo "<tr><td>" . $row['author_id'] .
            "</td><td>" . $row['first_name'] .
            "</td><td>" . $row['last_name'] . "</td></tr>";
        }
        ?>
    </table>
    
    
</body>
</html>