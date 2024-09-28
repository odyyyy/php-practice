<?php
include 'db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("SELECT * FROM authors WHERE author_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $author = $result->fetch_assoc();

        if ($author) {
            echo json_encode($author);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Автор не найден']);
        }
        $stmt->close();
    } else {
        $result = $mysqli->query("SELECT * FROM authors");
        $authors = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($authors);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $mysqli->prepare("INSERT INTO authors (first_name, last_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $data['first_name'], $data['last_name']);
    
    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(['message' => 'Объект автора успешно создан']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Ошибка при создании объекта автора']);
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $mysqli->prepare("UPDATE authors SET first_name = ?, last_name = ? WHERE author_id = ?");
        $stmt->bind_param("ssi", $data['first_name'], $data['last_name'], $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Данные автора успешно обновлены']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Ошибка при обновлении данных автора']);
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("DELETE FROM authors WHERE author_id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Объект автора успешно удален']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Ошибка при удалении объекта автора']);
        }
        $stmt->close();
    }
}
$mysqli->close();
?>
