<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacang Recognizer</title>
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
    <h1>Welcome to Kacang Recognizer</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Upload Gambar:</label>
        <input type="file" name="image">
        <button type="submit">Analyze</button>
    </form>

    <form action="kamera.php" method="post">
        <button type="submit">Gunakan Kamera</button>
    </form>
</body>
</html>
