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
    <body>
        <h1 class="display-6 text-center">Contacts</h1>
        <hr></hr>
        <div class="container">  
                <div class="row justify-content-between">
                    <div class="col-4">
                        <button onclick="document.location='addContact.php'" type="button" class="btn btn-success btn-sm" id="createBtn">Create New</a>
                    </div>
                    <div class="col-5 form-inline">
                        <input class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search" id="searchInput">
                        <button class="btn btn-primary btn-sm" type="submit" id="searchBtn">Search</button>
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
                                    $servername = "MYSQL5045.site4now.net";
                                    $username = "a655c4_danima";
                                    $password = "danima123";
                                    $dbname = "db_a655c4_danima";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);


                                    $sql = "SELECT contactID, contactName, contactEmail, contactPhone FROM Contacts";
                                    $result = $conn->query($sql);

                                    
                                    while($row = $result->fetch_assoc()) {
                                        echo"<tr>
                                                <td>". $row["contactName"]."</td>                                               
                                                <td>". $row["contactPhone"]."</td>
                                                <td>". $row["contactEmail"]."</td> 
                                                <td>TODO TAG</td>
                                                <td>
                                                    <button onclick='document.location=\"editContact.php?id=". $row["contactID"]."\"' type='button' id='editBtn' class='btn btn-primary btn-sm'>Edit</button>
                                                    <button type='button' class='btn btn-danger btn-sm'>Delete</button>
                                                </td>
                                            </tr>";                                                
                                    }                                    
                                    $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>