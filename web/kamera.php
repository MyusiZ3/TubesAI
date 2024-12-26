<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamera Kacang Recognizer</title>
</head>
<body>
    <h1>Gunakan Kamera</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture">Ambil Gambar</button>
    <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
    <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="image" id="imageData">
        <button type="submit">Analyze</button>
    </form>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureButton = document.getElementById('capture');
        const imageData = document.getElementById('imageData');

        // Akses kamera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => video.srcObject = stream)
            .catch(err => console.error("Kamera tidak dapat diakses:", err));

        // Tangkap gambar dari video
        captureButton.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            canvas.style.display = 'block';
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            imageData.value = canvas.toDataURL('image/png');
        });
    </script>
</body>
</html>
