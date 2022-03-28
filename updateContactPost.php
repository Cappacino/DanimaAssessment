<?php
include "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create connection
    $conn = getConnection();

    $contactID = $_POST['edit_contact_id'];
    $contactName = $_POST['edit_contact_name'];
    $contactPhone = $_POST['edit_contact_phone'];
    $contactEmail = $_POST['edit_contact_email'];
    $contactTag = $_POST['edit_contact_tags'];

    $query = "UPDATE Contacts SET contactName=?, contactPhone=?, contactEmail=?, contactTag=? WHERE contactID=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $contactName, $contactPhone, $contactEmail, $contactTag, $contactID);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
header("Location: index.php");
exit();
