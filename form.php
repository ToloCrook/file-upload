<?php

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    // Accessing path where file will be uploaded (root)
    $uploadDir = '/' . uniqid();
    // setting file's name
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    // accessing file's extension
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // setting authorized extensions
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    //setting max size authorized
    $maxFileSize = 1000000;

    //error management
    $errors = [];
    if(!in_array($extension, $authorizedExtensions)){
        $errors[] = "Please select an image .jpg, .png, .gif or .webp";
    }
    if (file_exists($_FILES['avatar']['name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Your size must not exceed 1Mo.";
    }
    foreach ($errors as $error) {
        return $error . "<br>";
    }

    //uploading file
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);


}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">

    <div>
    <input type="file" name="avatar" id="upload">

    </div>
    <div>
    <input value="Send" type="submit">

    </div>
  
</form>
</body>
</html>