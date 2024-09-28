<html lang="en">
<head>
<title>Books</title>
</head>
<body>
<h1>Книги</h1>
<table>
    <tr><th>ID</th><th>Название</th><th>Год публикации</th><th>ID Автора</th></tr>
<?php

$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM books");
foreach ($result as $row){
    echo "<tr><td>" . $row['book_id'] . 
    "</td><td>" . $row['title'] . 
    "</td><td>" . $row['publication_year'] . 
    "</td> <td>" . $row['author_id'] . "</td></tr>";
}
?>
</table>
</body>
</html>