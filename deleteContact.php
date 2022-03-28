<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Create connection
    $conn = getConnection();

    $query = "DELETE FROM Contacts WHERE contactID = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

header("Location: index.php");
exit();
