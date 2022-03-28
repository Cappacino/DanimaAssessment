<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Contacts - Edit Contact</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css" integrity="sha512-MMojOrCQrqLg4Iarid2YMYyZ7pzjPeXKRvhW9nZqLo6kPBBTuvNET9DBVWptAo/Q20Fy11EIHM5ig4WlIrJfQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.js" integrity="sha512-pF+DNRwavWMukUv/LyzDyDMn8U2uvqYQdJN0Zvilr6DDo/56xPDZdDoyPDYZRSL4aOKO/FGKXTpzDyQJ8je8Qw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>
    <?php
    // Create connection
    $conn = getConnection();

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $query = "SELECT contactName, contactPhone, contactEmail, contactTag FROM Contacts WHERE contactID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $query_run = $stmt->get_result();
        $row = $query_run->fetch_assoc();

        $stmt->close();
        $conn->close();
    }
    ?>
    <h1 class="display-6 text-center">Edit Contact</h1>
    <hr>
    </hr>
    <div class="container">
        <form action="updateContactPost.php" method="post">

            <input type="hidden" value="<?= $id ?>" name="edit_contact_id">

            <div class=" form-group">
                <label for="inputName">Name</label>
                <input type="text" value="<?= $row['contactName']; ?>" class="form-control" id="inputName" name="edit_contact_name" placeholder="Contact Name">
            </div>

            <div class="form-group">
                <label for="inputPhone">Phone</label>
                <input type="phone" value="<?= $row['contactPhone']; ?>" class="form-control" id="inputPhone" name="edit_contact_phone" placeholder="Phone Number">
            </div>

            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" value="<?= $row['contactEmail']; ?>" class="form-control" id="inputEmail" name="edit_contact_email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="inputTags">Tag(s)</label>
                <input type="text" value="<?= $row['contactTag']; ?>" name="edit_contact_tags" id="inputTags">
            </div>

            <button type="submit" name="submit" class='btn btn-primary btn-sm float-right'>Edit Contact</button>
            <button onclick="document.location='index.php'" type="button" class="btn btn-danger btn-sm float-left">Go Back</button>

        </form>
    </div>

</body>
<script>
    $('document').ready(function() {
        $("#inputTags").selectize({
            delimiter: ",",
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input,
                };
            },
        });
    });
</script>

</html>