<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Create connection
    $conn = getConnection();

    $contactName = $_POST['contact_name'];
    $contactPhone = $_POST['contact_phone'];
    $contactEmail = $_POST['contact_email'];
    $contactTag = $_POST['contact_tags'];

    $query = "INSERT INTO Contacts (contactName, contactEmail, contactPhone, contactTag) 
    VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $contactName, $contactEmail, $contactPhone, $contactTag);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

header("Location: index.php");
exit();
