<?php
include "../classes/User.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include "nav.php";
    $user = new User;
    $user_data = $user->getUser($_SESSION['user_id']);
    ?> 

    <form action="../actions/upload-photo.php" method="post" class="card w-50 my-5 mx-auto" enctype="multipart/form-data">
        <div class="card-header">
            <img src="../images/<?= $user_data['photo'] ?>" class="img-thumbnail" alt="icon for '<?= $user_data['username'] ?>'">
        </div>    
        <div class="card-body">
            <label for="photo" class="form-label">Chose Photo</label>
            <input type="file" name="photo" id="photo" class="form-control mb-1">

            <button type="submit" class="btn btn-outline-secondary">Upload Photo</button>
        </div>
        <div class="card-footer border-0">
            <h2 class="h4"><?= $user_data['first_name']." ".$user_data['last_name'] ?></h2>
            <h3 class="h5"><?= $user_data['username'] ?></h3>
        </div>    
    </form>
</body>
</html>