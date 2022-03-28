<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Contacts - Home</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<body>
    <h1 class="display-6 text-center">Contacts</h1>
    <hr>
    </hr>
    <div class="justify-content-center row">
        <div class="col-8">
            <div class="row justify-content-between">
                <div class="col-4">
                    <button onclick="document.location='addContact.php'" type="button" class="btn btn-success btn-sm" id="createBtn">Create New</a>
                </div>

                <div class="col-5 form-inline">
                    <form action="index.php" method="get" class="form-inline">
                        <input class="form-control form-control-sm" type="search" placeholder="Search by Name or Tag..." aria-label="Search" name="search" value="<?= $_GET["search"] ?? "" ?>" id="searchInput">
                        <button class="btn btn-primary btn-sm" type="submit" id="searchBtn">Search</button>
                    </form>
                </div>
            </div>
            <div>
                <div class="row justify-content-between align-items-center">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tag</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Create connection
                            $conn = getConnection();

                            $sql = "SELECT contactID, contactName, contactEmail, contactPhone, contactTag FROM Contacts";

                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $sql = $sql . " WHERE contactName LIKE ? OR contactTag LIKE ?";
                            }

                            $stmt = $conn->prepare($sql);

                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $searchsql = "%" . $search . "%";
                                $stmt->bind_param("ss", $searchsql, $searchsql);
                            }

                            $stmt->execute();

                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["contactName"] . "</td>                                               
                                    <td>" . $row["contactPhone"] . "</td>
                                    <td>" . $row["contactEmail"] . "</td> ";

                                echo "<td>";
                                $tagArray = explode(',', $row["contactTag"]);
                                foreach ($tagArray as $value) {
                                    echo "<span class='badge badge-pill badge-primary'>$value</span>";
                                }
                                echo  "</td>";

                                echo "<td>
                                <form class='form-inline' method='post' action='deleteContact.php'>
                                        <input type='hidden' value='" . $row["contactID"] . "' name='id'>
                                        <button onclick='document.location=\"editContact.php?id=" . $row["contactID"] . "\"' type='button' class='btn btn-primary btn-sm form-group mr-1'>Edit</button>                                       
                                        <button type ='submit' class='btn btn-danger btn-sm form-group'>Delete</button>
                                </form>
                                </td>
                                 </tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <button onclick='document.location="index.php"' class="btn btn-primary btn-sm" type="submit" id="viewBtn">View full list of Contacts</button>
        </div>

    </div>

    </div>
</body>

</html>