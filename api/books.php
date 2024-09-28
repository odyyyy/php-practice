<?php
include 'db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("SELECT * FROM books WHERE book_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $book = $result->fetch_assoc();

        if ($book) {
            echo json_encode($book);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Книга не найдена']);
        }
        $stmt->close();
    } else {
        $result = $mysqli->query("SELECT * FROM books");
        $book = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($book);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $mysqli->prepare("INSERT INTO books (title, publication_year, author_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $data['title'], $data['publication_year'], $data['author_id']);
    
    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(['message' => 'Книга успешно создана']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Ошибка при создании книги']);
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $data = json_decode(file_get_contents('php://input'), true);
        $stmt = $mysqli->prepare("UPDATE books SET title = ?, publication_year = ?, author_id = ? WHERE book_id = ?");
        $stmt->bind_param("siii", $data['title'], $data['publication_year'], $data['author_id'], $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Книга успешно обновлена']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Ошибка при обновлении книги']);
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $mysqli->prepare("DELETE FROM books WHERE book_id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Книга успешно удалена']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Ошибка при удалении книги']);
        }
        $stmt->close();
    }
}

$mysqli->close();
?>
