<?php
// Periksa apakah ada file yang diunggah
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $targetDir = "assets/uploads/"; // Folder untuk menyimpan gambar
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    // Periksa apakah file adalah gambar
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Simpan file gambar
    if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Kirim gambar ke model untuk prediksi
        $output = shell_exec("python ../scripts/predict.py $targetFile");
        echo "<h2>Hasil Prediksi:</h2>";
        echo "<p>Jenis Biji Kacang: $output</p>";
        echo "<a href='index.php'>Kembali ke halaman utama</a>";
    } else {
        echo "Maaf, file gagal diunggah.";
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
