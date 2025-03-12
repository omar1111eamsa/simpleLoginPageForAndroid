<?php
$host = "localhost:33066";
$user = "root";
$pass = "65708807";
$db_name = "android_login";

$conn = new mysqli($host, $user, $pass, $db_name);

if($conn->connect_error){
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);
$username = $data["username"];
$password = $data["password"];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row["password"])) {
        echo json_encode(["success" => true, "message" => "Login Successful"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid Password"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "User Not Found"]);
}

$conn->close();
?>