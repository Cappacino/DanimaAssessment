<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Contacts - Add Contact</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <body>
        <h1 class="display-6 text-center">Edit Contact</h1>
        <hr></hr>
            <div class="container">
                <form class="bgForm"> 
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Contact Name">
                        </div>

                        <div class="form-group">
                            <label for="inputPhone">Phone</label>
                            <input type="phone" class="form-control" id="inputPhone" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>  

                        <div class="form-group">
                            <label for="selectTag">Tag</label>
                            <select class="form-control">
                                <option>Friend</option>
                                <option>Family</option>
                                <option>Co-Worker</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <button onclick="document.location='index.php'" type="button" class="btn btn-success btn-sm float-right">Edit Contact</button>
                        <button onclick="document.location='index.php'" type="button" class="btn btn-danger btn-sm float-left">Go Back</button>

                </form>
            </div>
    </body>
</html>