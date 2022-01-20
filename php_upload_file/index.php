<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP upload file to db and store db</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload: <br>
        <input type="text" name="UserID" value="hung"> <br>
        <input type="file" name="myFile" multiple> <br>
        <input type="submit" name="sbmUpload" value="Upload"> <br>
    </form>
</body>

</html>