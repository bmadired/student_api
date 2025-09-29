<?php
header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "student_db";

// Connect to DB
$conn = new mysqli($host, $user, $pwd, $db);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Determine HTTP method
$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($method === 'GET') {
    if ($id) {
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode(["message" => "Student not found"]);
        }
    } else {
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        echo json_encode($students);
    }
}

elseif ($method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $conn->real_escape_string($data['name']);
    $dob  = $conn->real_escape_string($data['date_of_birth']);
    $intake = $conn->real_escape_string($data['intake_class']);
    $dept = intval($data['department_id']);

    $sql = "INSERT INTO students (name, date_of_birth, intake_class, department_id)
            VALUES ('$name', '$dob', '$intake', $dept)";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Student created", "id" => $conn->insert_id]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

elseif ($method === 'PUT') {
    if (!$id) { echo json_encode(["error" => "id required for update"]); exit; }

    $data = json_decode(file_get_contents("php://input"), true);
    $updates = [];
    foreach ($data as $key => $value) {
        $updates[] = "$key='" . $conn->real_escape_string($value) . "'";
    }

    $sql = "UPDATE students SET " . implode(",", $updates) . " WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Student updated"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

elseif ($method === 'DELETE') {
    if (!$id) { echo json_encode(["error" => "id required for delete"]); exit; }

    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql)) {
        echo json_encode(["message" => "Student deleted"]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }
}

else {
    echo json_encode(["error" => "Method not allowed"]);
}

$conn->close();
?>
