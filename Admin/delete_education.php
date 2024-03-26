<?php
include('../includes/connection.php');

// Check if ID parameter is set
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $deleteSql = "DELETE FROM educatio WHERE id = :id";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $id);

    if($deleteStmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "education deleted successfully."));
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Failed to delete education."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "ID parameter is missing."));
}
?>
