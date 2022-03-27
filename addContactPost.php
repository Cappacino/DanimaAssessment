<?php
    if(isset($_POST['submit'])) {
        $servername = "MYSQL5045.site4now.net";
        $username = "a655c4_danima";
        $password = "danima123";
        $dbname = "db_a655c4_danima";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        $contactName = $_POST['contact_name'];
        $contactPhone = $_POST['contact_phone'];
        $contactEmail = $_POST['contact_email'];
        
        $query = "INSERT INTO Contacts (contactName, contactEmail, contactPhone) 
        VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $contactName, $contactEmail, $contactPhone);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }
    header("Location: index.php");
    exit();     
?>